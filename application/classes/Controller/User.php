<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller {

	protected $oams;
	protected $session;
	protected $view;
	
	public function before()
    {
		$this->oams = new Model_Oams;
    	$this->session = Session::instance();

    	$identifier = Session::instance()->get('identifier');
		
        // Not logged in
        if ((is_null($identifier)) AND ($this->request->action() !== 'login'))
        	$this->redirect();
		
        // Logged in
		else
		{
			$this->view = View::factory('templates/template');
			$this->view->page_title = null;
			
			// Admin
			if ($identifier == 'admin')
			{
				$fname = $this->session->get('fname');
				$this->view->navbar = View::factory('templates/fragments/admin')
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
							->bind('fcode', $fcode);
						break;
					
					// Dept. Chair
					case 'dept_chair':
						$this->view->navbar = View::factory('templates/fragments/dept_chair')
							->bind('fcode', $fcode);
						break;
					
					// Dean
					case 'dean':
						$this->view->navbar = View::factory('templates/fragments/dean')
							->bind('fcode', $fcode);
						break;
				}
			}
		}		
    }

	/**
	 * Homepage
	 */
	public function action_index()
	{
		$title = $this->oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	/**
	 * Error Page
	 */
	public function action_error()
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
	public function action_myprofile()
	{
		$accom = new Model_Accom;
		$user = new Model_User;

		$reset = $this->session->get_once('reset');
		$update = $this->session->get_once('update');

		$user = $user->get_details($this->session->get('user_ID'), NULL)[0];
		if ($user['user_type'] == 'Faculty')
		{
			$univ = new Model_Univ;

			$programs = $univ->get_programs();
			$program = $univ->get_program_details($user['program_ID'])[0];
			$user['program_short'] = $program['program_short'];
		}
		$accom_rows = $accom->get_faculty_accom($this->session->get('user_ID'));
		$ipcr_rows = NULL;
		$opcr_rows = NULL;
		$cuma_rows = NULL;
		$pub_rows = NULL;
		$rch_rows = NULL;
		
		$this->view->content = View::factory('profile/myprofile/template')
			->bind('user', $user)
			->bind('accom_rows', $accom_rows)
			->bind('ipcr_rows', $ipcr_rows)
			->bind('opcr_rows', $opcr_rows)
			->bind('cuma_rows', $cuma_rows)
			->bind('pub_rows', $pub_rows)
			->bind('rch_rows', $rch_rows)
			->bind('reset', $reset)
			->bind('update', $update);
		$this->response->body($this->view->render());
	}

	/**
	 * Change password
	 */
	public function action_password()
	{
		if ($this->request->post()) echo "change password";
		
		$change = $this->session->get_once('change');

		$this->view->content = View::factory('profile/myprofile/form/password')
			->bind('change', $change);
		$this->response->body($this->view->render());
	}

	/**
	 * Show "About"
	 */
	public function action_about()
	{
		$about = $this->oams->get_about();

		$this->view->content = View::factory('profile/about')
			->bind('about', $about);
		$this->response->body($this->view->render());
	}

	/**
	 * Show OAMS Manual
	 */
	public function action_manual()
	{
		// Open PDF in new tab
		$this->view->content = null;
		$this->response->body($this->view->render());
	}

} // End User
