<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_University extends Controller_Admin {

	/**
	 * University Settings
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		$user = new Model_User;
		
		$colleges = $univ->get_colleges();
		$programs = $univ->get_programs();
		$departments = $univ->get_departments();
		$users = $user->get_users();

		$this->view->content = View::factory('admin/university')
			->bind('colleges', $colleges)
			->bind('departments', $departments)
			->bind('programs', $programs)
			->bind('users', $users);
		$this->response->body($this->view->render());
	}	

} // End University
