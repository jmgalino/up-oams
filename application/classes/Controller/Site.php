<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Site extends Controller {

	private $view;

	public function before()
    {
    	$oams = new Model_Oams;
    	$page_title = $oams->get_page_title();
    	$label = $oams->get_initials();
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
	 * Home Page
	 */
	public function action_index()
	{
        $oams = new Model_Oams;
		$title = $oams->get_title();

		$this->view->content = View::factory('site/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	/**
	 * About Page
	 */
	public function action_about()
	{
        $oams = new Model_Oams;
		$about = $oams->get_about();

		$this->view->content = View::factory('site/about')
			->bind('about', $about);
		$this->response->body($this->view->render());
	}

	/**
	 * Contact Page
	 */
	public function action_contact()
	{
		$session = Session::instance();

		if ($this->request->post())
		{
			$this->send_message($this->request->post());
		}
		else
		{
			$error = $session->get_once('error');
			$success = $session->get_once('success');
			$details = NULL;

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

	// Send message to admin
	private function send_message($details)
	{
		require_once(APPPATH.'assets/lib/recaptchalib.php');
		$privatekey = '6Lc2pPYSAAAAAGH3Y2jaZt_QBBHVFt0buIL2FEZ8';
		$resp = recaptcha_check_answer ($privatekey,
			$_SERVER['REMOTE_ADDR'],
			$details['recaptcha_challenge_field'],
			$details['recaptcha_response_field']);

		if (!$resp->is_valid)
		{
		    $error = $resp->error;
		}
		else
		{
			$oams = new Model_Oams;

			$message_details['name'] = $details['name'];
		    $message_details['contact'] = $details['email'];
			$message_details['subject'] = $details['subject'];
			$message_details['message'] = $details['message'];
			$insert_success = $oams->new_message($message_details);
			$details = NULL;
		}

		$this->view->content = View::factory('site/contact')
			->bind('error', $error)
			->bind('success', $insert_success)
			->bind('details', $details);
		$this->response->body($this->view->render());
	}

	// Error login
	private function show_error()
	{
        $oams = new Model_Oams;
		$title = $oams->get_title();
		$error = 'Error. Please try again.';
			
		$this->view->content = View::factory('site/index')
			->bind('title', $title)
			->bind('error', $error);
		$this->response->body($this->view->render());
	}

	// Successful login
	private function start_session($employee_code)
	{
		$user = new Model_User;
		$session = Session::instance();
		
		$user_details = $user->get_details(NULL, $employee_code);
		$session->set('employee_code', $employee_code);
    	$session->set('user_ID', $user_details['user_ID']);
		$session->set('fname', $user_details['first_name']);
		$session->set('fullname', $user_details['first_name'].' '.$user_details['middle_name'].'. '.$user_details['last_name']);
		$session->set('fullname2', $user_details['last_name'].', '.$user_details['first_name'].' '.$user_details['middle_name'].'.');
		
		// Admin
		if ($user_details['user_type'] == 'Admin')
		{
			$session->set('identifier', 'admin');
			$this->response = Request::factory('admin')->execute();
		}

		//	Faculty
		else
		{
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
