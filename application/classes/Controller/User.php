<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller {

	protected $oams;
	protected $session;
	protected $view;
	
	/**
	 * Check if logged in
	 * Sets appropriate navigation
	 */
	public function before()
    {
		$this->oams = new Model_Oams;
    	$this->session = Session::instance();

    	$identifier = Session::instance()->get('identifier');
    	$page_title = $this->oams->get_page_title();
		$label = $this->oams->get_initials();

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
				$this->view->navbar = View::factory('templates/fragments/admin')
					->bind('label', $label)
					->bind('fname', $fname);
			}
			else
			{
				$fcode = $this->session->get('fcode');

				switch ($identifier)
				{
					// Faculte
					case 'faculty':
						$this->view->navbar = View::factory('templates/fragments/faculty')
							->bind('label', $label)
							->bind('fcode', $fcode);
						break;
					
					// Dept. Chair
					case 'dept_chair':
						$this->view->navbar = View::factory('templates/fragments/dept_chair')
							->bind('label', $label)
							->bind('fcode', $fcode);
						break;
					
					// Dean
					case 'dean':
						$this->view->navbar = View::factory('templates/fragments/dean')
							->bind('label', $label)
							->bind('fcode', $fcode);
						break;
				}
			}
		}		
    }

	/**
	 * Homepage
	 */
	protected function action_index()
	{
		$title = $this->oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	/**
	 * Error Page
	 */
	protected function action_error()
	{
		$error = $this->session->get_once('error');
		if (is_null($error)) $error = 'Error.';

		$this->view->content = View::factory('profile/error')
			->bind('error', $error);
		$this->response->body($this->view->render());
	}

	/**
	 * Show profile
	 */
	protected function action_myprofile()
	{
		$accom = new Model_Accom;
		$user = new Model_User;

		$reset = $this->session->get_once('reset');
		$update = $this->session->get_once('update');

		$user_details = $user->get_details($this->session->get('user_ID'), NULL);
		if ($user_details['user_type'] == 'Faculty')
		{
			$univ = new Model_Univ;
			$program_details = $univ->get_program_details($user_details['program_ID']);
			$user_details['program_short'] = $program_details['program_short'];
		}
		// $accom_rows = $accom->get_faculty_accom($this->session->get('user_ID'));
		// $ipcr_rows = NULL;
		// $opcr_rows = NULL;
		// $cuma_rows = NULL;
		
		$this->view->content = View::factory('profile/myprofile/template')
			->bind('user', $user_details)
			// ->bind('accom_rows', $accom_rows)
			// ->bind('ipcr_rows', $ipcr_rows)
			// ->bind('opcr_rows', $opcr_rows)
			// ->bind('cuma_rows', $cuma_rows)
			->bind('reset', $reset)
			->bind('update', $update);
		$this->response->body($this->view->render());
	}

	/**
	 * Change password
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
	 * Show "About"
	 */
	protected function action_about()
	{
		$about = $this->oams->get_about();

		$this->view->content = View::factory('profile/about')
			->bind('about', $about);
		$this->response->body($this->view->render());
	}

	/**
	 * Show OAMS Manual
	 */
	protected function action_manual()
	{
		// Open PDF in new tab
		$this->view->content = View::factory('profile/manual');
		$this->response->body($this->view->render());
	}

	/**
	 * Delete previously set details
	 */
	protected function action_delete_session()
	{
		$this->session->delete('accom_pub');
		$this->session->delete('accom_awd');
		$this->session->delete('accom_rch');
		$this->session->delete('accom_ppr');
		$this->session->delete('accom_ctv');
		$this->session->delete('accom_par');
		$this->session->delete('accom_mat');
		$this->session->delete('accom_oth');
		$this->session->delete('attachment');
		$this->session->delete('accom_details');
		$this->session->delete('ipcr_details');
		$this->session->delete('department');
		$this->session->delete('title');
		$this->session->delete('opcr_details');
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
		$this->redirect($identifier.'/password', 303);
	}

} // End User
