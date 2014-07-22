<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Profile extends Controller_Admin {

	/**
	 * List user profiles
	 */
	public function action_index()
	{
		$filter = $this->request->post();
		$users = $this->user->get_users($filter);
		$programs = $this->univ->get_programs();
		$departments = $this->univ->get_departments();
		$colleges = $this->univ->get_colleges();
		$emp_code = $this->session->get('emp_code');

		$reset = $this->session->get('reset', null);
		if (isset($reset)) $this->session->delete('reset');
		$delete = $this->session->get('delete', null);
		if (isset($delete)) $this->session->delete('delete');

		$this->view->content = View::factory('admin/profile')
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('departments', $departments)
			->bind('colleges', $colleges)
			->bind('emp_code', $emp_code)
			->bind('reset', $reset)
			->bind('delete', $delete);
		$this->response->body($this->view->render());
	}

	/**
	 * Create new user profile
	 */
	public function action_add()
	{
		$details = $this->request->post();

		if ($details['user_type'] == 'admin')
		{
			$details['position'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
		}

		$this->user->add_user($details);
		$this->redirect('admin/profile/view/'.$details['employee_code']);
	}

	/**
	 * Preview user profile
	 */
	public function action_view()
	{
		$employee_code = $this->request->param('id');
		$user = $this->user->get_details($employee_code);

		$programs = $this->univ->get_programs();

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
		$employee_code = $this->request->param('id');
		$details = $this->request->post();
		
		$success = $this->user->update_details($employee_code, $details);
		$this->session->set('update', $success);

		$this->redirect('admin/profile/view/'.$employee_code);
	}

	/**
	 * Reset user password
	 */
	public function action_reset()
	{
		$employee_code = $this->request->param('id');
		$success = $this->user->reset_password($employee_code); echo $success, gettype($success);
		$this->session->set('reset', $success);

		$this->redirect('admin/profile');
	}

	/**
	 * Delete user profile
	 */
	public function action_delete()
	{
		$employee_code = $this->request->param('id');
		$success = $this->user->delete_profile($employee_code);
		$this->session->set('delete', $success);

		$this->redirect('admin/profile');
	}

} // End User
