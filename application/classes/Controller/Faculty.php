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
	 * Preview documents from profile
	 */
	// protected function action_preview()
	// {
		// $accom = new Model_Accom;

		// $accom_ID = $this->request->param('id');
		// $accom_details = $accom->get_details($accom_ID);
		// $label = 'Accomplishment Report - '.date('F \'y', strtotime($accom_details['yearmonth']));

		// $this->view->content = View::factory('profile/myprofile/pdfviewer')
		// 	->bind('label', $label)
		// 	->bind('filename', $accom_details['document']);
		// $this->response->body($this->view->render());
	// }

	/**
	 * Contact admin form
	 */
	protected function action_contact()
	{
		if ($this->request->post())
			$this->send_message($this->request->post());
		else
		{
			$success = $this->session->get_once('success');
			$error = $this->session->get_once('error');
			$details = $this->session->get_once('details');
			$fullname = $this->session->get('fullname');

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
	private function send_message($details)
	{
		$message_details['name'] = $this->session->get('fullname');
	    $message_details['contact'] = $this->session->get('employee_code');
		$message_details['subject'] = $details['subject'];
		$message_details['message'] = $details['message'];
		$message_details['date'] = date('Y-m-d', strtotime("now"));

		$insert_success = $this->oams->new_message($message_details);
		$this->session->set('success', $insert_success);
			
		$this->redirect('faculty/contact', 303);
	}

} // End Faculty
