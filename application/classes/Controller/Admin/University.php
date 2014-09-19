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
	public function action_college()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$colleges = $univ->get_colleges();
		$users = $user->get_users();

		$this->view->content = View::factory('admin/university/college')
			->bind('success', $success)
			->bind('error', $error)
			->bind('colleges', $colleges)
			->bind('users', $users);
		$this->response->body($this->view->render());
	}

	/**
	 * Save changes in University Settings
	 */
	public function action_new()
	{
		switch ($this->request->param('id'))
		{
			case 'college':
				$this->new_college();
				break;

			case 'department':
				// $this->new_department();
				break;

			case 'program':
				// $this->new_program();
				break;
		}
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

			case 'departments':
				$this->update_department();
				break;

			case 'programs':
				// $this->update_program();
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
	 * Add college
	 */
	private function new_college()
	{
		$univ = new Model_Univ;

		$post = $this->request->post();
		$add_success = $univ->add_college($this->request->post());
		$this->session->set('success', $add_success);
		$this->redirect('admin/university/college', 303);
	}

	/**
	 * Update college
	 */
	private function update_college()
	{
		$univ = new Model_Univ;

		$update_success = $univ->update_college($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/university/college', 303);
	}

	/**
	 * Update university departments
	 */
	private function update_department()
	{
		$univ = new Model_Univ;

		$update_success = $univ->update_department($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/university', 303);
	}

} // End University
