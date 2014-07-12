<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller {

	private $oams;
	private $univ;
	private $user;
	private $session;
	private $view;

	public function before()
    {
        $this->oams = new Model_Oams;
		$this->user = new Model_User;
		$this->univ = new Model_Univ;
    	$this->session = Session::instance();

		$fname = $this->session->get('fname');

		$this->view = View::factory('templates/template');
		$this->view->page_title = null;
		$this->view->navbar = View::factory('templates/fragments/admin')
			->bind('fname', $fname);
    }

	public function action_index()
	{
		$title = $this->oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	// User Accounts
	public function action_user()
	{
		$function = $this->request->param('function');
		
		if (is_null($function))
		{
			$reset = null;
			$users = $this->user->get_users();
			$programs = $this->univ->get_programs();

			$this->view->content = View::factory('admin/user')
				->bind('reset', $reset)
				->bind('users', $users)
				->bind('programs', $programs);
			$this->response->body($this->view->render());
		}
		else
		{
			$details = $this->request->post();
			switch ($function) {
				case 'add':
					$this->action_user_add($details);
					break;
				case 'view':
					$this->action_user_view();
					break;
				default:
					$this->action_user_update($details);
					break;
			}
			$function = 'add' ? $this->action_user_add($details) : $this->action_user_update($details);
		}
	}

	private function action_user_add($details)
	{
		if ($details['user_type'] == 'admin')
		{
			$details['position'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
		}
	}

	private function action_user_view()
	{
	}

	private function action_user_update($details)
	{
		$id = $this->request->param('id');
	}

	// University
	public function action_university()
	{
		$programs = $this->univ->get_programs();
		$departments = $this->univ->get_departments();
		$colleges = $this->univ->get_colleges();

		$this->view->content = View::factory('admin/univ')
			->bind('programs', $programs)
			->bind('departments', $departments)
			->bind('colleges', $colleges);
		$this->response->body($this->view->render());
	}

	// Oams
	public function action_oams()
	{
		$title = $this->oams->get_title();
		$about = $this->oams->get_about();
		// $types = array("0" => array("type" => "sample type 1"), "1" => array("type" => "sample type 2"));
		//$types = $this->oams->get_types();
		$categories = $this->oams->get_categories();

		$this->view->content = View::factory('admin/oams')
			->bind('title', $title)
			->bind('about', $about)
			// ->bind('types', $types)
			->bind('categories', $categories);
		$this->response->body($this->view->render());
	}

	// Profile
	public function action_profile()
	{

	}

	public function action_password()
	{
		
	}

	public function action_message()
	{
		
	}

	public function action_about()
	{
		
	}

	public function action_manual()
	{
		
	}

} // End Admin
