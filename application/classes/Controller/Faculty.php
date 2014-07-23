<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller_User {

	/**
	 * Contact admin form
	 */
	public function action_contact()
	{
		$details = $this->request->post();
		$error = NULL;
		$sucess = NULL;

		if ((isset($details)) AND (count($details) > 0))
		{
			$this->action_send($details);
		}
		else
		{
			$fullname_2 = $this->session->get('fullname_2');

			$this->view->content = View::factory('profile/contact')
				->bind('fullname', $fullname_2)
				->bind('error', $error)
				->bind('sucess', $sucess);
			$this->response->body($this->view->render());
		}
	}

	/**
	 * Send the message
	 */
	private function action_send()
	{}

} // End Faculty
