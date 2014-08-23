<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller_User {

	/**
	 * Check ownership
	 */
	protected function action_check($user_ID)
	{
		if ($this->session->get('user_ID') !== $user_ID)
		{
			$this->session->set('error', 'Error 401: Unauthorized access.');
			$this->redirect('faculty/error');
		}
	}

	/**
	 * Preview documents
	 */
	protected function action_preview()
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
	protected function action_contact()
	{
		if ($this->request->post())
			$this->action_send($this->request->post());
		else
		{
			$error = $this->session->get_once('error');
			$success = $this->session->get_once('success');
			$fullname = $this->session->get('fullname');
			$details = NULL;

			$this->view->content = View::factory('profile/form/contact')
				->bind('error', $error)
				->bind('success', $success)
				->bind('fullname', $fullname)
				->bind('details', $details);
			$this->response->body($this->view->render());
		}
	}

	/**
	 * Send the message
	 */
	private function action_send($details)
	{
		$message_details['name'] = $this->session->get('fullname');
	    $message_details['contact'] = $this->session->get('employee_code');
		$message_details['subject'] = $details['subject'];
		$message_details['message'] = $details['message'];
		$insert_success = $this->oams->new_message($message_details);
		$details = NULL;

		$fullname = $this->session->get('fullname');
		$this->view->content = View::factory('profile/form/contact')
			->bind('error', $error)
			->bind('success', $insert_success)
			->bind('fullname', $fullname)
			->bind('details', $details);
		$this->response->body($this->view->render());
	}

} // End Faculty
