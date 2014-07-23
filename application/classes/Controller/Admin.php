<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_User {

	/**
	 * List messages
	 */
	public function action_messages()
	{
		$messages = $this->oams->get_messages();

		$this->view->content = View::factory('admin/messages')
			->bind('messages', $messages);
		$this->response->body($this->view->render());
	}

} // End Admin
