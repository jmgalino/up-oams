<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Accom extends Controller_Faculty {

	/**
	 * Faculty's Accomplishment Reports
	 */
	public function action_index()
	{
		$accom = new Model_Accom;

		$delete = $this->session->get_once('delete');
		$employee_code = $this->session->get('employee_code');
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('employee_code', $employee_code)
			->bind('accom_reports', $accom_reports)
			->bind('delete', $delete);
		$this->response->body($this->view->render());
	}

	/**
	 * New Accomplishment Report
	 */
	public function action_new()
	{
		if ($this->request->post('month_year'))
		{
			$date = DateTime::createFromFormat('F Y d', $this->request->post('month_year')."01");
			$accom = new Model_Accom;

			$details['user_ID'] = $this->session->get('user_ID');
			$details['yearmonth'] = $date->format('Y-m-d');
			$details['accom_ID'] = $accom->initialize($details);
			$this->session->set('accom_details', $details);
			$this->action_draft(NULL);
		}
		else
		{
			$this->action_consolidate();
		}
	}

	/**
	 * View Accomplishment Report
	 */
	public function action_preview()
	{
		$accom = new Model_Accom;
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID)[0];
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner

		if ($accom_details['document'])
		{
			// Show PDF
			$this->action_pdf($accom_details['document']);
		}
		else
		{
			// Show draft
			$this->action_edit();
		}
	}

	/**
	 * View Accomplishment Report (Draft)
	 */
	public function action_update()
	{
		$accom = new Model_Accom;
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID)[0];
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		$this->session->set('accom_details', $accom_details);
		$this->action_draft(NULL);
	}

	/**
	 * Delete Accomplishment Report
	 */
	public function action_delete()
	{
		$accom = new Model_Accom;
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID)[0];
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		$delete_success = $accom->delete($accom_ID);
		$this->session->set('delete', $delete_success);

		$this->redirect('faculty/accom');
	}

	/**
	 * Submit Accomplishment Report
	 */
	public function action_submit()
	{
		$accom = new Model_Accom;
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID)[0];
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		$details['status'] = 'Pending';
		$details['document'] = NULL;
		$details['date'] = date_format(date_create(), 'Y-m-d');

		$submit_success = $accom->submit($accom_ID, $details);
		$this->session->set('submit', $submit_success);

		$this->redirect('faculty/accom');
	}

	/**
	 * Download Accomplishment Report
	 */
	public function action_download()
	{
		// force save pdf
	}

	/**
	 * Consolidate Accomplishment Reports
	 */
	private function action_consolidate()
	{
		// Faculty, Department & College Level
		// Open PDF in new tab
	}

	/**
	 * View Accomplishment Report (PDF)
	 */
	private function action_pdf($filename)
	{
		// open with viewer
	}

	/**
	 * View Accomplishment Report (Draft)
	 */
	private function action_draft($label)
	{
		$accom = new Model_Accom;

		$label = date_format(date_create($this->session->get('accom_details')['yearmonth']), 'F Y');
		$accom_ID = $this->session->get('accom_details')['accom_ID'];
		
		$this->session->set('accom_pub', $accom->find_accom($accom_ID, 'pub'));
		$this->session->set('accom_awd', $accom->find_accom($accom_ID, 'awd'));
		$this->session->set('accom_rch', $accom->find_accom($accom_ID, 'rch'));
		$this->session->set('accom_ppr', $accom->find_accom($accom_ID, 'ppr'));
		$this->session->set('accom_ctv', $accom->find_accom($accom_ID, 'ctv'));
		$this->session->set('accom_par', $accom->find_accom($accom_ID, 'par'));
		$this->session->set('accom_mat', $accom->find_accom($accom_ID, 'mat'));
		$this->session->set('accom_oth', $accom->find_accom($accom_ID, 'oth'));

		$this->view->content = View::factory('faculty/accom/form/template')
			->bind('label', $label)
			->bind('session', $this->session);
		$this->response->body($this->view->render());	
	}

	private function action_check($user_ID)
	{
		if ($this->session->get('user_ID') !== $user_ID)
		{
			$this->session->set('error', 'This report is not available.');
			$this->redirect('faculty/error');
		}
	}

} // End Accom
