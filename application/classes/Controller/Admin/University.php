<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_University extends Controller_Admin {

	/**
	 * University Settings
	 */
	public function action_index()
	{
		$programs = $this->univ->get_programs();
		$departments = $this->univ->get_departments();
		$colleges = $this->univ->get_colleges();

		$this->view->content = View::factory('admin/university')
			->bind('programs', $programs)
			->bind('departments', $departments)
			->bind('colleges', $colleges);
		$this->response->body($this->view->render());
	}

	

} // End University
