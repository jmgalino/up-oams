<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_University extends Controller_Admin {

	/**
	 * University Settings
	 */
	public function action_index()
	{
		$univ = new Model_Univ;

		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		
		$mission = $univ->get_mission();
		$vision = $univ->get_vision();
		$colleges = $univ->get_colleges();
		$programs = $univ->get_programs();
		$departments = $univ->get_departments();

		$this->view->content = View::factory('admin/university')
			->bind('success', $success)
			->bind('error', $error)
			->bind('mission', $mission)
			->bind('vision', $vision)
			->bind('colleges', $colleges)
			->bind('departments', $departments)
			->bind('programs', $programs);
		$this->response->body($this->view->render());
	}

	/**
	 * List colleges
	 */
	public function action_colleges()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$colleges = $univ->get_colleges();
		$users = $user->get_users();

		$this->view->content = View::factory('admin/university/college')
			->bind('success', $success)
			->bind('colleges', $colleges)
			->bind('users', $users);
		$this->response->body($this->view->render());
	}

	/**
	 * List departments
	 */
	public function action_departments()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$colleges = $univ->get_colleges();
		$departments = $univ->get_departments();
		$users = $user->get_users();

		$this->view->content = View::factory('admin/university/department')
			->bind('success', $success)
			->bind('colleges', $colleges)
			->bind('departments', $departments)
			->bind('users', $users);
		$this->response->body($this->view->render());
	}

	/**
	 * List degree programs
	 */
	public function action_programs()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$colleges = $univ->get_colleges();
		$departments = $univ->get_departments();

		$this->view->content = View::factory('admin/university/program')
			->bind('success', $success)
			->bind('colleges', $colleges)
			->bind('departments', $departments);
		$this->response->body($this->view->render());
	}

	/**
	 * Create college/department/program
	 */
	public function action_new()
	{
		switch ($this->request->param('id'))
		{
			case 'college':
				$this->new_college();
				break;

			case 'department':
				$this->new_department();
				break;

			case 'program':
				$this->new_program();
				break;
		}
	}

	/**
	 * Add college
	 */
	private function new_college()
	{
		$univ = new Model_Univ;

		$add_success = $univ->add_college($this->request->post());
		$this->session->set('success', $add_success);
		$this->redirect('admin/university/colleges', 303);
	}

	/**
	 * Add department
	 */
	private function new_department()
	{
		$univ = new Model_Univ;

		$add_success = $univ->add_department($this->request->post());
		$this->session->set('success', $add_success);
		$this->redirect('admin/university/departments', 303);
	}

	/**
	 * Add program
	 */
	private function new_program()
	{
		$univ = new Model_Univ;

		$post = $this->request->post();
		$post['date_instituted'] = date('Y-m-d', strtotime($post['date_instituted']));
		$add_success = $univ->add_program($post);
		$this->session->set('success', $add_success);
		$this->redirect('admin/university/programs', 303);
	}

	/**
	 * Save changes in University Settings
	 */
	public function action_update()
	{
		switch ($this->request->param('id'))
		{
			case 'mission':
				$this->update_mission();
				break;

			case 'vision':
				$this->update_vision();
				break;
			
			case 'college':
				$this->update_college();
				break;

			case 'department':
				$this->update_department();
				break;

			case 'program':
				$this->update_program();
				break;
		}
	}

	/**
	 * Update university mission
	 */
	private function update_mission()
	{
		$univ = new Model_Univ;

		$update_success = $univ->update_mission($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/university', 303);
	}

	/**
	 * Update university vision
	 */
	private function update_vision()
	{
		$univ = new Model_Univ;

		$update_success = $univ->update_vision($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/university', 303);
	}
	
	/**
	 * Update college
	 */
	private function update_college()
	{
		$univ = new Model_Univ;
		$user_updated = TRUE;
		$update_details = $this->request->post();

		if (array_key_exists('user_ID', $update_details))
 		{
 			if ($update_details['user_ID'] === '') // try == ''
 				$update_details['user_ID'] = NULL;
 			else
			{
 				$college_details = $univ->get_college_details($update_details['college_ID'], NULL);

	 			if ($college_details['user_ID'] != $update_details['user_ID'])
	 				$user_updated = $this->update_user($college_details['user_ID'], $update_details['user_ID'], 'dean');
 			}
 		}

		$update_success = ($user_updated ? $univ->update_college($update_details) : FALSE);
		$this->session->set('success', $update_success);
		$this->redirect('admin/university/colleges', 303);
	}

	/**
	 * Update department
	 */
	private function update_department()
	{
		$univ = new Model_Univ;
		$user_updated = TRUE;
		$update_details = $this->request->post();

		if (array_key_exists('user_ID', $update_details))
 		{
 			if ($update_details['user_ID'] === '') // try == ''
 				$update_details['user_ID'] = NULL;
 			else
			{
 				$department_details = $univ->get_department_details($update_details['department_ID'], NULL);

	 			if ($department_details['user_ID'] != $update_details['user_ID'])
	 				$user_updated = $this->update_user($department_details['user_ID'], $update_details['user_ID'], 'chair');
	 		}
 		}

		$update_success = ($user_updated ? $univ->update_department($update_details) : FALSE);
		$this->session->set('success', $update_success);
		$this->redirect('admin/university/departments', 303);
	}

	/**
	 * Update program
	 */
	private function update_program()
	{
		$univ = new Model_Univ;

		$post = $this->request->post();
		$post['date_instituted'] = date('Y-m-d', strtotime($post['date_instituted']));
		$update_success = $univ->update_program($post);
		$this->session->set('success', $update_success);
		$this->redirect('admin/university/programs', 303);
	}

 	/**
	 * Update user positions
	 */
	private function update_user($old_user_ID, $new_user_ID, $new_position)
	{
 		$user = new Model_User;
 		$old_user_updated = 'TRUE';
 		$new_user_updated = 'TRUE';
 		
 		if ($old_user_ID)
 		{
 			$user_details = $user->get_details($old_user_ID, NULL);
 			$old_user_updated = $user->update_details(array(
	 			'user_ID' => $old_user_ID,
	 			'program_ID' => $user_details['program_ID'],
	 			'position' => 'none'));
 		}

 		if ($new_user_ID)
 		{
 			$user_details = $user->get_details($new_user_ID, NULL);
 			$new_user_updated = $user->update_details(array(
	 			'user_ID' => $new_user_ID,
	 			'program_ID' => $user_details['program_ID'],
	 			'position' => $new_position));
 		}

 		return ($old_user_updated AND $new_user_updated);
 	}

} // End University
