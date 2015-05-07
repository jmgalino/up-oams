<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller_User {

	/**
	 * Check authorization
	 */
	public function before()
	{
		// do checks
		parent::before();
	}

	/**
	 * Show profile
	 */
	public function action_myprofile()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$reset = $this->session->get_once('reset');
		$update = $this->session->get_once('update');
		$fullname = $this->session->get('fullname2');

		$user_details = $user->get_details($this->session->get('user_ID'), NULL);		
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, TRUE);
		
		$education = $user->get_education($user_details['user_ID'], NULL);
		$program_details = $univ->get_program_details($user_details['program_ID']);
		$user_details['program_short'] = $program_details['program_short'];

		if ($accom_reports)
		{
			$reports = array();
			$accom_IDs = array();
			foreach ($accom_reports as $report)
			{
				if (in_array($report['status'], array('Accepted', 'Pending', 'Saved')))
				{
					$reports[] = $report;
					$accom_IDs[] = $report['accom_ID'];
				}
			}

			if ($accom_IDs)
			{
				$pub = $accom->get_accoms($accom_IDs, 'pub');
				$awd = $accom->get_accoms($accom_IDs, 'awd');
				$rch = $accom->get_accoms($accom_IDs, 'rch');
				$ppr = $accom->get_accoms($accom_IDs, 'ppr');
				$ctv = $accom->get_accoms($accom_IDs, 'ctv');
				$par = $accom->get_accoms($accom_IDs, 'par');
				$mat = $accom->get_accoms($accom_IDs, 'mat');
				$oth = $accom->get_accoms($accom_IDs, 'oth');
			}
		}
		
		$this->view->content = View::factory('profile/myprofile/faculty')
			->bind('user', $user_details)
			->bind('education', $education)
			->bind('accom_reports', $reports)
			->bind('fullname', $fullname)
			->bind('accom_pub', $pub)
			->bind('accom_awd', $awd)
			->bind('accom_rch', $rch)
			->bind('accom_ppr', $ppr)
			->bind('accom_ctv', $ctv)
			->bind('accom_par', $par)
			->bind('accom_mat', $mat)
			->bind('accom_oth', $oth)
			->bind('reset', $reset)
			->bind('update', $update);
		$this->response->body($this->view->render());
	}

	/**
	 * Contact admin form
	 */
	public function action_contact()
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
