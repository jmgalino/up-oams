<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Site extends Controller {

	public $session;
	protected $univ;
	protected $user;

	public function action_index()
	{
		$view = View::factory('templates/template');
		$view->navbar = View::factory('templates/fragments/site');
		$view->content = View::factory('site/index');
		$index_page = $view->render();
		$this->response->body($index_page);
	}

	public function action_about()
	{
		$view = View::factory('templates/template');
		$view->navbar = View::factory('templates/fragments/site');
		$view->content = View::factory('site/about');
		$about_page = $view->render();
		$this->response->body($about_page);
	}

	public function action_contact()
	{
		// $captcha = new Captcha;
		// $error = NULL;
		// $sucess = NULL;

		// if ($this->uri->segment(3) == 'send')
		// {
		// 	$this->send();
		// }
		// else {
		// 	$view = View::factory('templates/template');
		// 	$view->navbar = View::factory('templates/fragments/site');
		// 	$view->content = View::factory('site/contact');
		// 	$view->content->bind('captcha', $captcha);
		// 	$view->content->bind('error', $error);
		// 	$view->content->bind('sucess', $sucess);
		// 	$contact_page = $view->render();
		// 	$this->response->body($contact_page);
		// }

	}
	
	public function action_login()
	{
		$employee_code = $this->input->post('employee_code');
		$password = $this->input->post('password');
		$row = $this->user->check_user($employee_code, $password);

		// User exists
		if (count($row) == 1)
		{
			$user_ID = $row[0]->user_ID;
			$this->start_session($user_ID);echo $this->site->session_id();
		}

		// User doesn't exist
		else
		{
			$this->error();
		}
	}

	public function action_logout()
	{
		$this->session->destroy();
		$this->index();
	}

	private function action_error()
	{
		$error = 'Incorrect employee code/password combination. Please try again.';
			
		$view = View::factory('templates/template');
		$view->navbar = View::factory('templates/fragments/site');
		$view->content = View::factory('site/index');
		$view->content->bind('error', $error);
		$error_page = $view->render();
		$this->response->body($error_page);

	}

	private function action_send()
	{
		$captcha = new Captcha;
		$error = NULL;
		$sucess = NULL;

		if ($captcha->invalid_count() > 49)
			$error = 'bot';

		elseif (Captcha::valid($this->input->post('captcha')))
		{
			$details['sender'] = $this->input->post('name').' ['.$this->input->post('email').']';
			$details['subject'] = $this->input->post('subject');
			$details['message'] = $this->input->post('message');
			$sucess = $this->univ->send_message($details);
		}
		
		else
			echo "<script type='text/javascript'>alert('Oops, wrong captcha!');</script>";

		$view = View::factory('templates/template');
		$view->navbar = View::factory('templates/fragments/site');
		$view->content = View::factory('site/contact');
		$view->content->bind('captcha', $captcha);
		$view->content->bind('error', $error);
		$view->content->bind('sucess', $sucess);
		$send_page = $view->render();
		$this->response->body($send_page);
	}

	private function action_start($user_ID)
	{
		$row = $this->user->get_details($user_ID);

		foreach ($row as $r)
		{
			$details['emp_code']	= $r->employee_code;
			$details['fname']		= $r->first_name;
			$details['minit']		= $r->middle_initial;
			$details['lname']		= $r->last_name;
			$details['user_type']	= $r->user_type;
			$details['fcode']		= $r->faculty_code;
			$details['program_ID']	= $r->program_ID;
			$details['rank']		= $r->rank;
			$details['position']	= $r->position;
		}
		
		$this->session->create();
		$this->session->set('user_ID', $user_ID);
		$this->session->set('emp_code', $details['emp_code']);
		$this->session->set('fullname', $details['fname'].' '.$details['minit'].'. '.$details['lname']);
		$this->session->set('namefull', $details['lname'].', '.$details['fname'].' '.$details['minit'].'.');
		$this->session->set('fname', $details['fname']);
		$this->session->set('user_type', $details['user_type']);

		// Admin
		if ($details['user_type'] == 'admin')
		{
			$this->session->set('identifier', 'admin');

			$view = View::factory('templates/template');
			$view->navbar = View::factory('templates/fragments/admin');
			$view->navbar->bind('fname', $this->session->get('fname'));
			$view->content = View::factory('admin/index');
			$index_page = $view->render();
			$this->response->body($index_page);
		}

		//	Faculty
		else {
			$dept = $this->univ->get_department($details['program_ID']);
			$college = $this->univ->get_college($details['program_ID']);

			$this->session->set('fcode', $details['fcode']);
			$this->session->set('program_ID', $details['program_ID']);
			$this->session->set('department', $dept[0]);
			$this->session->set('college', $college[0]);
			$this->session->set('rank', $details['rank']);
			$this->session->set('position', $details['position']);

			if ($details['position'] == 'none')
			{
				$this->session->set('identifier', 'faculty');

				$view = View::factory('templates/template');
				$view->navbar = View::factory('templates/fragments/faculty');
				$view->navbar->bind('fcode', $this->session->get('fcode'));
				$view->content = View::factory('faculty/index');
				$index_page = $view->render();
				$this->response->body($index_page);
			}

			else
			{
				$this->session->set('identifier', $details['position']);

				$view = View::factory('templates/template');
				$view->navbar = View::factory('templates/fragments/'.$details['position']);
				$view->navbar->bind('fcode', $this->session->get('fcode'));
				$view->content = View::factory('faculty/index');
				$index_page = $view->render();
				$this->response->body($index_page);
			}
		}
	}
	
} // End Site
