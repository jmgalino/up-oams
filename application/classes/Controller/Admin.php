<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller {

	private $oams;
	private $univ;
	private $user;
	private $session;
	private $view;

	public function before()
    {
        $identifier = Session::instance()->get('identifier');
		
        if (is_null($identifier))
        	$this->redirect();
		
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

	/**
	 * User Homepage
	 */
	public function action_index()
	{
		$title = $this->oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	/**
	 * User Profiles
	 */
	public function action_user()
	{
		$function = $this->request->param('function');
		
		if (is_null($function))
		{
			$users = $this->user->get_users();
			$programs = $this->univ->get_programs();
			$departments = $this->univ->get_departments();
			$colleges = $this->univ->get_colleges();
			$emp_code = $this->session->get('emp_code');

			$reset = $this->session->get('reset', null);
			if (isset($reset)) $this->session->delete('reset');
			$delete = $this->session->get('delete', null);
			if (isset($delete)) $this->session->delete('delete');

			$this->view->content = View::factory('admin/user')
				->bind('users', $users)
				->bind('programs', $programs)
				->bind('departments', $departments)
				->bind('colleges', $colleges)
				->bind('emp_code', $emp_code)
				->bind('reset', $reset)
				->bind('delete', $delete);
			$this->response->body($this->view->render());
		}
		else
		{
			$details = $this->request->post();
			switch ($function)
			{
				case 'new':
					$this->action_user_add($details);
					break;
				case 'view':
					$this->action_user_view();
					break;
				case 'edit':
					$this->action_user_update();
					break;
				case 'reset':
					$this->action_user_reset();
					break;
				case 'delete':
					$this->action_user_delete();
					break;
			}
		}
	}

	// Add new user
	private function action_user_add($details)
	{
		if ($details['user_type'] == 'admin')
		{
			$details['position'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
		}

		$this->user->add_user($details);
		$this->redirect('admin/user/view/'.$details['employee_code']);
	}

	// View user profile
	private function action_user_view()
	{
		$employee_code = $this->request->param('id');
		$user = $this->user->get_details($employee_code);

		$reset = $this->session->get('reset', null);
		if (isset($reset)) $this->session->delete('reset');
		$update = $this->session->get('update', null);
		if (isset($update)) $this->session->delete('update');

		if ($user[0]['user_type'] == 'Faculty')
		{
			$program = $this->univ->get_program_details($user[0]['program_ID']);
			$user[0]['program_short'] = $program[0]['program_short'];
		}
		$ar_rows = null;
		$ipcr_rows = null;
		$opcr_rows = null;
		$cuma_rows = null;
		$pub_rows = null;
		$rch_rows = null;

		$this->view->content = View::factory('admin/user/template')
			->bind('user', $user[0])
			->bind('ar_rows', $ar_rows)
			->bind('ipcr_rows', $ipcr_rows)
			->bind('opcr_rows', $opcr_rows)
			->bind('cuma_rows', $cuma_rows)
			->bind('pub_rows', $pub_rows)
			->bind('rch_rows', $rch_rows);
		$this->response->body($this->view->render());
	}

	// Update user profile
	private function action_user_update($details)
	{
		$employee_code = $this->request->param('id');
		$success = $this->user->update_profile($employee_code, $details);
		$this->session->set('update', $success);

		$this->redirect('admin/user/view'.$employee_code);
	}

	// Reset user password
	private function action_user_reset()
	{
		$employee_code = $this->request->param('id');
		$success = $this->user->reset_password($employee_code); echo $success, gettype($success);
		$this->session->set('reset', $success);

		$this->redirect('admin/user');
	}

	// Delete user profile
	private function action_user_delete()
	{
		$employee_code = $this->request->param('id');
		$success = $this->user->delete_profile($employee_code);
		$this->session->set('delete', $success);

		$this->redirect('admin/user');
	}

	/**
	 * University Settings
	 */
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

	/**
	 * OAMS Settings
	 */
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

	/**
	 * Show Profile
	 */
	public function action_profile()
	{}

	// Change password
	public function action_password()
	{}

	// Show messages
	public function action_messages()
	{
		$messages = $this->oams->get_messages();

		$this->view->content = View::factory('admin/messages')
			->bind('messages', $messages);
		$this->response->body($this->view->render());
	}

	// Show "About"
	public function action_about()
	{
		$this->view->content = View::factory('profile/about');
		$this->response->body($this->view->render());
	}

	// Show manual
	public function action_manual()
	{} // Open PDF in new tab

} // End Admin
