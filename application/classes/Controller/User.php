<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_User extends Controller {

	protected $app;
	protected $session;
	protected $view;
	
	/**
	 * Check if logged in
	 * Set template
	 */
	public function before()
    {
		$this->app = new Model_App;
    	$this->session = Session::instance();

    	$identifier = $this->session->get('identifier');
    	$page_title = $this->app->get_page_title();
		$label = $this->app->get_initials();

        // Not logged in
        if ((is_null($identifier)) AND ($this->request->action() !== 'login'))
        	$this->redirect();
		
        // Logged in
		else
		{
			$this->view = View::factory('templates/template');
			$this->view->page_title = $page_title;
			
			// Admin
			if ($identifier == 'admin')
			{
				$fname = $this->session->get('fname');
				$messages = $this->app->get_messages_count();

				$this->view->navbar = View::factory('templates/fragments/admin')
					->bind('label', $label)
					->bind('messages', $messages['messages'])
					->bind('fname', $fname);
			}
			// Faculty
			else
			{
				$fcode = $this->session->get('fcode');

				$this->view->navbar = View::factory('templates/fragments/'.$identifier)
					->bind('label', $label)
					->bind('fcode', $fcode);
			}
		}		
    }

	/**
	 * Show homepage
	 */
	abstract function action_index();

	/**
	 * Show error
	 */
	protected function action_error()
	{
		$error = $this->session->get_once('error');
		
		if (is_null($error))
			$this->redirect();

		$this->view->content = View::factory('profile/error')
			->bind('error', $error);
		$this->response->body($this->view->render());
	}

	/**
	 * Show announcements
	 */
	abstract function action_announcements();

	/**
	 * Show profile
	 */
	abstract function action_myprofile();

	/**
	 * Show change password form
	 */
	protected function action_password()
	{
		if ($this->request->post())
			$this->change_password($this->request->post());
		
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		$identifier = $this->session->get('identifier');

		$this->view->content = View::factory('profile/form/password')
			->bind('success', $success)
			->bind('error', $error)
			->bind('identifier', $identifier);
		$this->response->body($this->view->render());
	}

	/**
	 * Show about
	 */
	protected function action_about()
	{
		$about = $this->app->get_about();

		$this->view->content = View::factory('profile/about')
			->bind('about', $about);
		$this->response->body($this->view->render());
	}

	/**
	 * Show UP-OAMS Manual
	 */
	protected function action_manual()
	{
		$this->view->content = View::factory('profile/manual');
		$this->response->body($this->view->render());
	}

	/**
	 * Save new password
	 */
	private function change_password($details)
	{
		$user = new Model_User;

		$validation = Validation::factory($details)
            ->rule('current_password', array($user, 'check_password'))
            ->rule('confirm_password',  'matches', array(':validation', ':field', 'new_password'));
 
        if ($validation->check())
		{
			$employee_code = $this->session->get('employee_code');
			$change_success = $user->change_password($employee_code, $details['new_password']);
			$this->session->set('success', $change_success);
		}
		else
		{
			$this->session->set('error', 'Incorrect password.');
		}

		$identifier = $this->session->get('identifier');
		$url = ($identifier == 'admin' ? 'admin/password' : 'faculty/password');
		$this->redirect($url, 303);
	}

} // End User
