<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller_User {

	/**
	 * Preview documents
	 */
	public function action_preview()
	{
		$accom = new Model_Accom;

		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID)[0];
		$label = 'Accomplishment Report - '.date_format(date_create($accom_details['yearmonth']), 'F \'y');

		$this->view->content = View::factory('profile/myprofile/pdfviewer')
			->bind('label', $label)
			->bind('filename', $accom_details['document']);
		$this->response->body($this->view->render());
	}

	/**
	 * Contact admin form
	 */
	public function action_contact()
	{
		$error = NULL;
		$sucess = NULL;

		if ($this->request->post())
		{
			$this->action_send($this->request->post()); echo "hello";
		}
		else
		{
			$fullname2 = $this->session->get('fullname2');

			$this->view->content = View::factory('profile/contact')
				->bind('fullname', $fullname2)
				->bind('error', $error)
				->bind('sucess', $sucess);
			$this->response->body($this->view->render());
		}
	}

	/**
	 * Send the message
	 */
	private function action_send($details)
	{}

} // End Faculty
