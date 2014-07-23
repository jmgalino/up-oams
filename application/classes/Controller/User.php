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
	 * Show profile
	 */
	public function action_myprofile()
	{}

	/**
	 * Change password
	 */
	public function action_password()
	{}

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
