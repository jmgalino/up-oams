<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller {

	/**
	 * Homepage
	 */
	public function action_index()
	{
		$title = $this->oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	/**
	 * Show profile
	 */
	public function action_myprofile()
	{}

	/**
	 * Change password
	 */
	public function action_password()
	{}

	/**
	 * Show "About"
	 */
	public function action_about()
	{
		$this->view->content = View::factory('profile/about');
		$this->response->body($this->view->render());
	}

	/**
	 * Show OAMS Manual
	 */
	public function action_manual()
	{} // Open PDF in new tab

} // End User
