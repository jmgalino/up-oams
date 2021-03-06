<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Site extends Controller {

	private $view;

	/**
	 * Check if logged in
	 */
	public function before()
    {
    	$app = new Model_App;
    	$page_title = $app->get_page_title();
    	$label = $app->get_initials();
    	$identifier = Session::instance()->get('identifier');

    	if ((isset($identifier)) AND $this->request->action() !== 'logout')
        {
	    	if ($identifier == 'admin')
        		$this->redirect('admin');
        	else
        		$this->redirect('faculty');
        }

        $this->view = View::factory('templates/template');
		$this->view->page_title = $page_title;
		$this->view->navbar = View::factory('templates/fragments/site');    	
		$this->view->navbar->label = $label;
    }

	/**
	 * Show UP-OAMS homepage
	 */
	public function action_index()
	{
        $app = new Model_App;
		$title = $app->get_title();

		$this->view->content = View::factory('site/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	/**
	 * Show about
	 */
	public function action_about()
	{
        $app = new Model_App;
		$about = $app->get_about();

		$this->view->content = View::factory('site/about')
			->bind('about', $about);
		$this->response->body($this->view->render());
	}

	/**
	 * Show contact form
	 */
	public function action_contact()
	{
		$session = Session::instance();

		if ($this->request->post())
			$this->send_message($this->request->post());
		else
		{
			$success = $session->get_once('success');
			$error = $session->get_once('error');
			$details = $session->get_once('details');

			$this->view->content = View::factory('site/contact')
				->bind('error', $error)
				->bind('success', $success)
				->bind('details', $details);
			$this->response->body($this->view->render());
		}
	}
	
	/**
	 * Login
	 */
	public function action_login()
	{
		$user = new Model_User;
		$user = $user->check_user($this->request->post('employee_code'), $this->request->post('password'));

		// User exists
		if ($user)
		{
			// Delete existing tmp files
			foreach(glob(DOCROOT.'files/tmp/{,.}*', GLOB_BRACE) as $file)
			{
				if(is_file($file))
					unlink($file);
			}
			
			$this->start_session($this->request->post('employee_code'));
		}

		// User doesn't exist
		else
		{
			$this->show_error();
		}
	}

	/**
	 * Logout
	 */
	public function action_logout()
	{
		$session = Session::instance();
		$success = $session->destroy();
		if ($success)
			$this->action_index();
		else
			echo 'Error';
	}

	/**
	 * Send message to admin
	 */
	private function send_message($details)
	{
		$app = new Model_App;
		$session = Session::instance();

		if (array_key_exists('g-recaptcha-response', $details) AND $details['g-recaptcha-response'] != NULL)
		{
			unset($details['g-recaptcha-response']);
			$details['date'] = date('Y-m-d', strtotime("now"));
			$insert_success = $app->new_message($details);
			$session->set('success', $insert_success);
		}
		else
		{
		    $session->set('error', 'The system thinks you\'re a bot. Please try again.');
		    $session->set('details', $details);
		}

		$this->redirect('site/contact', 303);
	}

	/**
	 * Show login error
	 */
	private function show_error()
	{
        $app = new Model_App;
		$title = $app->get_title();
		$error = 'Invalid username/password combination. Please try again.';
			
		$this->view->content = View::factory('site/index')
			->bind('title', $title)
			->bind('error', $error);
		$this->response->body($this->view->render());
	}

	/**
	 * Start session (logged in)
	 */
	private function start_session($employee_code)
	{
		$user = new Model_User;
		$session = Session::instance();
		
		$user_details = $user->get_details(NULL, $employee_code);
		$session->set('employee_code', $employee_code);
    	$session->set('user_ID', $user_details['user_ID']);
		$session->set('fname', $user_details['first_name']);
		$session->set('fullname', $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name']);
		$session->set('fullname2', $user_details['last_name'].', '.$user_details['first_name'].' '.$user_details['middle_name'][0].'.');
		
		// Admin
		if ($user_details['user_type'] == 'Admin')
		{
			$session->set('identifier', 'admin');
			$this->response = Request::factory('admin')->execute();
		}

		//	Faculty
		else
		{
			$session->set('title', $user_details['title']);
			$session->set('suffix', $user_details['suffix']);
			$session->set('fcode', $user_details['faculty_code']);
			$session->set('program_ID', $user_details['program_ID']);
			$session->set('rank', $user_details['rank']);
			$session->set('position', $user_details['position']);

			if ($user_details['position'] == 'none')
				$session->set('identifier', 'faculty');
			else
				$session->set('identifier', $user_details['position']);
			
			$this->response = Request::factory('faculty')->execute();
		}
	}

} // End Site
