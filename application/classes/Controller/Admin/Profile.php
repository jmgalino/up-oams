<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Profile extends Controller_Admin {

	/**
	 * User Profiles
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$reset = $this->session->get_once('reset');
		$delete = $this->session->get_once('delete');
		$users = $user->get_users();	
		$employee_code = $this->session->get('employee_code');
		$programs = $univ->get_programs();

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
		// $birthday = DateTime::createFromFormat('F d, Y', $details['birthday']);
		$birthday = DateTime::createFromFormat('m/d/Y', $details['birthday']);
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
			if (is_numeric($details['program_ID']))
			{
				$univ = new Model_Univ;
				$department = $univ->get_program_details($details['program_ID']);
				$details['department_ID'] = $department['department_ID'];
			}
			else
			{
				$details['program_ID'] = NULL;
				$details['department_ID'] = 3;
			}
		}

		$user = new Model_User;
		$user->add_user($details);
		$this->redirect('admin/profile/view/'.$details['employee_code'], 303);
	}

	/**
	 * View user profile
	 */
	public function action_view()
	{
		// if ($this->request->param('document'))
		// 	$this->action_pdfviewer();

		$univ = new Model_Univ;
		$user = new Model_User;

		$upload = $this->session->get_once('upload');
		$update = $this->session->get_once('update');
		$reset = $this->session->get_once('reset');
		$error = $this->session->get_once('error');

		$user_details = $user->get_details(NULL, $this->request->param('id'));
		$programs = $univ->get_programs();

		if ($user_details['user_type'] == 'Faculty')
		{
			if (isset($user_details['program_ID']))
			{
				$program = $univ->get_program_details($user_details['program_ID']);
				$user_details['program_short'] = $program['program_short'];
			}
			else
			{
				$department = $univ->get_department_details($user_details['department_ID'], NULL);
				$user_details['program_short'] = 'Other: '.$department['department'];
			}	
		}
		// $accom_rows = $accom->get_faculty_accom($user['user_ID']);
		// $ipcr_rows = NULL;
		// $opcr_rows = NULL;
		// $cuma_rows = NULL;
		$pub_rows = NULL;
		$rch_rows = NULL;

		$this->view->content = View::factory('admin/profile/template')
			->bind('user', $user_details)
			// ->bind('accom_rows', $accom_rows)
			// ->bind('ipcr_rows', $ipcr_rows)
			// ->bind('opcr_rows', $opcr_rows)
			// ->bind('cuma_rows', $cuma_rows)
			->bind('upload', $upload)
			->bind('reset', $reset)
			->bind('update', $update)
			->bind('error', $error)
			->bind('programs', $programs)
			->bind('pub_rows', $pub_rows)
			->bind('rch_rows', $rch_rows);
		$this->response->body($this->view->render());
	}

	/**
	 * Update user profile
	 */
	public function action_update()
	{
		$user = new Model_User;

		$details = $this->request->post();
		// $birthday = DateTime::createFromFormat('F d, Y', $details['birthday']);
		$birthday = DateTime::createFromFormat('m/d/Y', $details['birthday']);
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
			if (is_numeric($details['program_ID']))
			{
				$univ = new Model_Univ;
				$department = $univ->get_program_details($details['program_ID']);
				$details['department_ID'] = $department['department_ID'];
			}
			else
			{
				$details['program_ID'] = NULL;
				$details['department_ID'] = 3;
			}
		}
 
		$employee_code = $this->request->param('id');
		$update_success = $user->update_details($employee_code, $details);
		$this->session->set('update', $update_success);

		$this->redirect('admin/profile/view/'.$details['employee_code'], 303);
	}

	/**
	 * Reset user password
	 */
	public function action_reset()
	{
		$user = new Model_User;

		$reset_success = $user->reset_password($this->request->param('id'));
		$this->session->set('reset', $reset_success);

		$referrer = $this->request->referrer();
		$view = strpos($referrer, 'view');
		if ($view) 
			$this->redirect('admin/profile/view/'.$this->request->param('id'), 303);
		else
			$this->redirect('admin/profile', 303);
	}

	/**
	 * Delete user profile
	 */
	public function action_delete()
	{
		$user = new Model_User;
		
		$delete_success = $user->delete_profile($this->request->param('id'));
		$this->session->set('delete', $delete_success);

		$this->redirect('admin/profile', 303);
	}

	// private function action_pdfviewer()
	// {
	// 	$user = new Model_User;

	// 	$document = $this->request->param('document');
	// 	$document_ID = $this->request->param('document_ID');
	// 	$user = $user->get_details(NULL, $this->request->param('id'));

	// 	switch ($document)
	// 	{
	// 		case 'accom':
	// 			# code...
	// 			break;

	// 		case 'ipcr':
	// 			# code...
	// 			break;

	// 		case 'opcr':
	// 			# code...
	// 			break;

	// 		case 'value':
	// 			# code...
	// 			break;
	// 	}
		
	// 	$this->view->content = View::factory('admin/profile/pdfviewer')
	// 		->bind('first_name', $user['first_name'])
	// 		->bind('label', $label)
	// 		->bind('filename', $filename);
	// 	$this->response->body($this->view->render());
	// }
	
} // End User
