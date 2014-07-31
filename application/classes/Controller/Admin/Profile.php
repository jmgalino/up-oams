<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Profile extends Controller_Admin {

	/**
	 * User Profiles
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$filter = $this->request->post();
		$users = $user->get_users($filter);
		$programs = $univ->get_programs();
		$departments = $univ->get_departments();
		$colleges = $univ->get_colleges();
		$emp_code = $this->session->get('emp_code');

		$reset = $this->session->get('reset', NULL);
		if (isset($reset)) $this->session->delete('reset');
		$delete = $this->session->get('delete', NULL);
		if (isset($delete)) $this->session->delete('delete');

		$this->view->content = View::factory('admin/profile')
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('departments', $departments)
			->bind('colleges', $colleges)
			->bind('emp_code', $emp_code)
			// ->bind('filter', $filter)
			->bind('reset', $reset)
			->bind('delete', $delete);
		$this->response->body($this->view->render());
	}

	/**
	 * Create new user profile
	 */
	public function action_new()
	{
		$details = $this->request->post();

		if ($details['user_type'] == 'admin')
		{
			$details['position'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
		}

		$user = new Model_User;
		$user->add_user($details);
		$this->redirect('admin/profile/view/'.$details['employee_code']);
	}

	/**
	 * Preview user profile
	 */
	public function action_view()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$user = $user->get_details($this->request->param('id'));
		$programs = $univ->get_programs();

		$reset = $this->session->get('reset', NULL);
		if (isset($reset)) $this->session->delete('reset');
		$update = $this->session->get('update', NULL);
		if (isset($update)) $this->session->delete('update');

		if ($user[0]['user_type'] == 'Faculty')
		{
			$program = $univ->get_program_details($user[0]['program_ID']);
			$user[0]['program_short'] = $program[0]['program_short'];
		}
		$ar_rows = NULL;
		$ipcr_rows = NULL;
		$opcr_rows = NULL;
		$cuma_rows = NULL;
		$pub_rows = NULL;
		$rch_rows = NULL;

		$this->view->content = View::factory('admin/profile/template')
			->bind('user', $user[0])
			->bind('ar_rows', $ar_rows)
			->bind('ipcr_rows', $ipcr_rows)
			->bind('opcr_rows', $opcr_rows)
			->bind('cuma_rows', $cuma_rows)
			->bind('pub_rows', $pub_rows)
			->bind('rch_rows', $rch_rows)
			->bind('programs', $programs);
		$this->response->body($this->view->render());
	}

	/**
	 * Update user profile
	 */
	public function action_update()
	{
		$user = new Model_User;

		$success = $user->update_details($this->request->param('id'), $this->request->post());
		$this->session->set('update', $success);

		$this->redirect('admin/profile/view/'.$employee_code);
	}

	/**
	 * Reset user password
	 */
	public function action_reset()
	{
		$user = new Model_User;

		$success = $user->reset_password($this->request->param('id')); echo $success, gettype($success);
		$this->session->set('reset', $success);

		$this->redirect('admin/profile');
	}

	/**
	 * Delete user profile
	 */
	public function action_delete()
	{
		$user = new Model_User;
		
		$success = $user->delete_profile($this->request->param('id'));
		$this->session->set('delete', $success);

		$this->redirect('admin/profile');
	}

} // End User
