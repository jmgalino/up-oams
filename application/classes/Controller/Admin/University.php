<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_University extends Controller_Admin {

	/**
	 * University Settings
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		$user = new Model_User;
		
		$mission = $univ->get_mission();
		$vision = $univ->get_vision();
		$colleges = $univ->get_colleges();
		$programs = $univ->get_programs();
		$departments = $univ->get_departments();
		$users = $user->get_users();

		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');

		$this->view->content = View::factory('admin/university')
			->bind('success', $success)
			->bind('error', $error)
			->bind('mission', $mission)
			->bind('vision', $vision)
			->bind('colleges', $colleges)
			->bind('departments', $departments)
			->bind('programs', $programs)
			->bind('users', $users);
		$this->response->body($this->view->render());
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
			
			case 'colleges':
				// $this->update_colleges();
				break;

			case 'departments':
				// $this->update_department();
				break;

			case 'programs':
				// $this->update_programs();
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

} // End University
