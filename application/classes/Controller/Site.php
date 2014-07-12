<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Site extends Controller {

	private $view;

	public function before()
    {
    	$this->view = View::factory('templates/template');
		$this->view->page_title = null;
		$this->view->navbar = View::factory('templates/fragments/site');
    }

	public function action_index()
	{
    	$session = Session::instance();
    	$identifier = $session->get('identifier');
		
        if (is_null($identifier))
        {
	        $oams = new Model_Oams;
			$title = $oams->get_title();

			$this->view->content = View::factory('site/index')
				->bind('title', $title);
			$this->response->body($this->view->render());
        }
        else
        {
        	switch ($identifier) {
        		case 'admin':
        			$this->response = Request::factory('admin/index')->execute();
        			break;
        		case 'faculty':
        		case 'dept_chair':
        		case 'dean':
        			$this->response = Request::factory('faculty/index')->execute();
        			break;
        	}
        }
	}

	public function action_about()
	{
        $oams = new Model_Oams;
		$about = $oams->get_about();

		$this->view->content = View::factory('site/about')
			->bind('about', $about);
		$this->response->body($this->view->render());
	}

	public function action_contact()
	{
		$details = $this->request->post();
		$error = NULL;
		$sucess = NULL;

		if (isset($details))
		{
			$this->action_send($details);
		}
		else {
			$this->view->content = View::factory('site/contact')
				->bind('error', $error)
				->bind('sucess', $sucess);
			$this->response->body($this->view->render());
		}
	}
	
	public function action_login()
	{
		$details = $this->request->post();

        $user = new Model_User;
		$user = $user->check_user($details['employee_code'], $details['password']);

		// User exists
		if (count($user) == 1)
		{
			$user_ID = $user[0]['user_ID'];
			$this->action_start_session($user_ID);
		}

		// User doesn't exist
		else
		{
			$this->action_error();
		}
	}

	private function action_send($details)
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

	private function action_start_session($user_ID)
	{
		$user = new Model_User;
		$user = $user->get_details($user_ID);

		foreach ($user as $detail)
		{
			$session_details['emp_code']	= $detail['employee_code'];
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
		$session->set('user_ID', $user_ID);
		$session->set('emp_code', $session_details['emp_code']);
		$session->set('fname', $session_details['fname']);
		$session->set('fullname', $session_details['fname'].' '
			.$session_details['minit'].'. '
			.$session_details['lname']);
		$session->set('fullname_2', $session_details['lname'].', '
			.$session_details['fname'].' '
			.$session_details['minit'].'.');
		// $session->set('user_type', $session_details['user_type']);

		// Admin
		if ($session_details['user_type'] == 'admin')
		{
			$session->set('identifier', 'admin');
			$this->response = Request::factory('admin/index')->execute();
		}

		//	Faculty
		else {
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
			{
				$session->set('identifier', 'faculty');
				$this->response = Request::factory('faculty/index')->execute();
			}

			else
			{
				$session->set('identifier', $session_details['position']);
				$this->response = Request::factory('faculty/index')->execute();
			}
		}
	}

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
