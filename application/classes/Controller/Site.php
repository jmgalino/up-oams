<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Site extends Controller {

	private $view;

	public function before()
    {
    	$identifier = Session::instance()->get('identifier');

    	if ((isset($identifier)) AND $this->request->action() !== 'logout')
        {
	    	if ($identifier == 'admin')
        		$this->redirect('admin');
        	else
        		$this->redirect('faculty');
        }

        $this->view = View::factory('templates/template');
		$this->view->page_title = null;
		$this->view->navbar = View::factory('templates/fragments/site');    	
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
		$error = NULL;
		$sucess = NULL;

		if ($this->request->post())
		{
			$this->action_send(); echo "hello";
		}
		else
		{
			$this->view->content = View::factory('site/contact')
				->bind('error', $error)
				->bind('sucess', $sucess);
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
			$this->action_start_session($this->request->post('employee_code'));
		}

		// User doesn't exist
		else
		{
			$this->action_error();
		}
	}

	// Send message to admin
	private function action_send()
	{
		// require_once('application/assets/lib/recaptchalib.php');
		// $privatekey = '6Lc2pPYSAAAAAGH3Y2jaZt_QBBHVFt0buIL2FEZ8';
		// $resp = recaptcha_check_answer ($privatekey,
		// 	$_SERVER['REMOTE_ADDR'],
		// 	$_POST['recaptcha_challenge_field'],
		// 	$_POST['recaptcha_response_field']);

		$error = NULL;
		$sucess = NULL;

		// if ($resp->is_valid)
		// {
		// 	$session_details['sender'] = $details['name'].' - '.$details['email'];
		// 	$session_details['subject'] = $details['subject'];
		// 	$session_details['message'] = $details['message'];
		// 	$sucess = $this->univ->send_message($session);
		// }
		
		// else
		// {
		// 	die ('The reCAPTCHA wasn\'t entered correctly. Go back and try it again.' .
		// 		 '(reCAPTCHA said: ' . $resp->error . ')');
		// }

		$this->view->content = View::factory('site/contact')
			->bind('captcha', $captcha)
			->bind('error', $error)
			->bind('sucess', $sucess);
		$this->response->body($this->view->render());
	}

	// Error login
	private function action_error()
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
	private function action_start_session($employee_code)
	{
		$user = new Model_User;
		$user_details = $user->get_details($employee_code);

		foreach ($user_details as $detail)
		{
			$session_details['user_ID']		= $detail['user_ID'];
			$session_details['fname']		= $detail['first_name'];
			$session_details['minit']		= $detail['middle_initial'];
			$session_details['lname']		= $detail['last_name'];
			$session_details['user_type']	= $detail['user_type'];
			$session_details['fcode']		= $detail['faculty_code'];
			$session_details['program_ID']	= $detail['program_ID'];
			$session_details['rank']		= $detail['rank'];
			$session_details['position']	= $detail['position'];
		}
		
    	$session = Session::instance();
		$session->set('employee_code', $employee_code);
    	$session->set('user_ID', $detail['user_ID']);
		$session->set('fname', $session_details['fname']);
		$session->set('fullname', $session_details['fname'].' '
			.$session_details['minit'].'. '
			.$session_details['lname']);
		$session->set('fullname2', $session_details['lname'].', '
			.$session_details['fname'].' '
			.$session_details['minit'].'.');
		// $session->set('user_type', $session_details['user_type']);

		// Admin
		if ($session_details['user_type'] == 'Admin')
		{
			$session->set('identifier', 'admin');
			$this->response = Request::factory('admin')->execute();
		}

		//	Faculty
		else
		{
			// $univ = new Model_Univ;
			// $dept = $this->univ->get_department($session_details['program_ID']);
			// $college = $this->univ->get_college($session_details['program_ID']);

			$session->set('fcode', $session_details['fcode']);
			$session->set('program_ID', $session_details['program_ID']);
			// $session->set('department', $dept[0]);
			// $session->set('college', $college[0]);
			$session->set('rank', $session_details['rank']);
			$session->set('position', $session_details['position']);

			if ($session_details['position'] == 'none')
				$session->set('identifier', 'faculty');
			else
				$session->set('identifier', $session_details['position']);
			
			$this->response = Request::factory('faculty')->execute();
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

} // End Site
