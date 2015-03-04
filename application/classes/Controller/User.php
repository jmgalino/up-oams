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
				$messages = $this->oams->get_messages_count();
				$this->view->navbar = View::factory('templates/fragments/admin')
					->bind('label', $label)
					->bind('messages', $messages['messages'])
					->bind('fname', $fname);
			}
			else
			{
				$fcode = $this->session->get('fcode');

				switch ($identifier)
				{
					// Faculty
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
		$announcements = $this->oams->get_announcements();
		$identifier = Session::instance()->get('identifier');
		$general = ($identifier == 'admin' ? $identifier : 'faculty');

		$this->view->content = View::factory('profile/index')
			->bind('title', $title)
			->bind('announcements', $announcements)
			->bind('identifier', $general);
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
	 * Announcement Page
	 */
	protected function action_announcements()
	{
		$announcements = $this->oams->get_announcements();

		$this->view->content = View::factory('profile/announcements')
			->bind('announcements', $announcements);
		$this->response->body($this->view->render());
	}

	/**
	 * Show profile
	 */
	protected function action_myprofile()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$reset = $this->session->get_once('reset');
		$update = $this->session->get_once('update');
		$name = $this->session->get('fullname2');

		$user_details = $user->get_details($this->session->get('user_ID'), NULL);		
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, TRUE);
		
		if ($user_details['user_type'] == 'Faculty')
		{
			$education = $user->get_education($user_details['user_ID']);
			$program_details = $univ->get_program_details($user_details['program_ID']);
			$user_details['program_short'] = $program_details['program_short'];

			if ($accom_reports)
			{
				$reports = array();
				$accom_IDs = array();
				foreach ($accom_reports as $report)
				{
					if (($report['status'] == 'Approved') OR ($report['status'] == 'Pending') OR ($report['status'] == 'Saved'))
					{
						$reports[] = $report;
						$accom_IDs[] = $report['accom_ID'];
					}
				}

				if ($accom_IDs)
				{
					$pub = $accom->get_accoms($accom_IDs, 'pub');
					$awd = $accom->get_accoms($accom_IDs, 'awd');
					$rch = $accom->get_accoms($accom_IDs, 'rch');
					$ppr = $accom->get_accoms($accom_IDs, 'ppr');
					$ctv = $accom->get_accoms($accom_IDs, 'ctv');
					$par = $accom->get_accoms($accom_IDs, 'par');
					$mat = $accom->get_accoms($accom_IDs, 'mat');
					$oth = $accom->get_accoms($accom_IDs, 'oth');
				}
			}
		}
			else
			{
				$education = NULL;
				$reports = NULL;
				$pub = NULL;
				$awd = NULL;
				$rch = NULL;
				$ppr = NULL;
				$ctv = NULL;
				$par = NULL;
				$mat = NULL;
				$oth = NULL;
			}
		
		$this->view->content = View::factory('profile/myprofile/template')
			->bind('user', $user_details)
			->bind('education', $education)
			->bind('accom_reports', $reports)
			->bind('name', $name)
			->bind('accom_pub', $pub)
			->bind('accom_awd', $awd)
			->bind('accom_rch', $rch)
			->bind('accom_ppr', $ppr)
			->bind('accom_ctv', $ctv)
			->bind('accom_par', $par)
			->bind('accom_mat', $mat)
			->bind('accom_oth', $oth)
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
		// $this->session->delete('accom_pub');
		// $this->session->delete('accom_awd');
		// $this->session->delete('accom_rch');
		// $this->session->delete('accom_ppr');
		// $this->session->delete('accom_ctv');
		// $this->session->delete('accom_par');
		// $this->session->delete('accom_mat');
		// $this->session->delete('accom_oth');
		// $this->session->delete('attachment');
		// $this->session->delete('accom_details');
		// $this->session->delete('ipcr_details');
		// $this->session->delete('department');
		// $this->session->delete('title');
		// $this->session->delete('opcr_details');
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
