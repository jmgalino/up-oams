<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Profile extends Controller_Admin {

	/**
	 * User Profiles
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$users = $user->get_users();
		$programs = $univ->get_programs();
		$departments = $univ->get_departments();
		$colleges = $univ->get_colleges();
		$employee_code = $this->session->get('employee_code');

		$reset = $this->session->get('reset', NULL);
		if (isset($reset)) $this->session->delete('reset');
		$delete = $this->session->get('delete', NULL);
		if (isset($delete)) $this->session->delete('delete');

		$this->view->content = View::factory('admin/profile')
			->bind('reset', $reset)
			->bind('delete', $delete)
			->bind('users', $users)
			->bind('employee_code', $employee_code)
			->bind('programs', $programs);
		$this->response->body($this->view->render());
	}

	/**
	 * Create new user profile
	 */
	public function action_new()
	{
		$details = $this->request->post();

		if ($details['user_type'] == 'Admin')
		{
			$details['faculty_code'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
			$details['department_ID'] = NULL;
			$details['position'] = NULL;
		}
		else
		{
			if (!isset($details['program_ID']) AND !isset($details['department_ID']))
				$details['program_ID'] = '1';
			elseif (!isset($details['position']))
				$details['position'] = 'none';
		}

		$user = new Model_User;
		$user->add_user($details);
		$this->redirect('admin/profile/view/'.$details['employee_code']);
	}

	/**
	 * View user profile
	 */
	public function action_view()
	{
		$accom = new Model_Accom;
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
		$accom_rows = $accom->get_faculty_accom($user[0]['user_ID'], NULL);
		$ipcr_rows = NULL;
		$opcr_rows = NULL;
		$cuma_rows = NULL;
		$pub_rows = NULL;
		$rch_rows = NULL;

		$this->view->page_title = ' - '.$user[0]['first_name'].'\'s Profile';
		$this->view->content = View::factory('admin/profile/template')
			->bind('user', $user[0])
			->bind('accom_rows', $accom_rows)
			->bind('ipcr_rows', $ipcr_rows)
			->bind('opcr_rows', $opcr_rows)
			->bind('cuma_rows', $cuma_rows)
			->bind('pub_rows', $pub_rows)
			->bind('rch_rows', $rch_rows)
			->bind('programs', $programs)
			->bind('reset', $reset)
			->bind('update', $update);
		$this->response->body($this->view->render());
	}

	/**
	 * Update user profile
	 */
	public function action_update()
	{
		$user = new Model_User;

		$details = $this->request->post();
		$birthday = DateTime::createFromFormat('F d, Y', $details['birthday']);
		$details['birthday'] = $birthday->format('Y-m-d');

		if ($details['user_type'] == 'Admin')
		{
			$details['faculty_code'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
			$details['department_ID'] = NULL;
			$details['position'] = NULL;
		}
		else
		{
			if (!isset($details['program_ID']) AND !isset($details['department_ID']))
				$details['program_ID'] = '1';
			elseif (!isset($details['position']))
				$details['position'] = 'none';
		}
 
		$employee_code = $this->request->param('id');
		$success = $user->update_details($employee_code, $details);
		$this->session->set('update', $success);

		$this->redirect('admin/profile/view/'.$details['employee_code']);
	}

	/**
	 * Reset user password
	 */
	public function action_reset()
	{
		$user = new Model_User;

		$success = $user->reset_password($this->request->param('id'));
		$this->session->set('reset', $success);

		$referrer = $this->request->referrer();
		$view = strstr($referrer, 'view');
		if ($view) 
			$this->redirect('admin/profile/view/'.$this->request->param('id'));
		else
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
