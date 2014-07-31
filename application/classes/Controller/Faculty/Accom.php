<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Accom extends Controller_Faculty {

	/**
	 * Faculty's Accomplishment Reports
	 */
	public function action_index()
	{
		$accom = new Model_Accom;

		$filter = $this->request->post();
		$this->session->set('filter', $filter);
		$user_ID = $this->session->get('user_ID');
		$employee_code = $this->session->get('employee_code');
		$accom_reports = $accom->get_all_accom($user_ID, $filter);

		$delete = $this->session->get('delete', NULL);
		if (isset($delete)) $this->session->delete('delete');

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('employee_code', $employee_code)
			->bind('accom_reports', $accom_reports)
			->bind('delete', $delete)
			->bind('filter', $filter);
		$this->response->body($this->view->render());
	}

	/**
	 * Department's Accomplishment Report
	 */
	public function action_accom_dept()
	{}

	/**
	 * College's Accomplishment Report
	 */
	public function action_accom_coll()
	{}

	/**
	 * New Accomplishment Report
	 */
	public function action_new()
	{
		$date = DateTime::createFromFormat('F Y', $this->request->post('month_year'));
		$accom = new Model_Accom;

		$details['user_ID'] = $this->session->get('user_ID');
		$details['yearmonth'] = $date->format('Y-m-d');
		$details['accom_ID'] = $accom->initialize($details);
		$this->session->set('accom_details', $details);
		$this->action_preview(NULL);
	}

	/**
	 * View Accomplishment Report
	 */
	public function action_view()
	{
		$accom = new Model_Accom;
		
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);

		if (($accom_details['status'] == 'Approved') OR ($accom_details['status'] == 'Pending'))
		{
			// Show PDF
			$this->action_pdf($accom_details[0]['document']);
		}
		else
		{
			// Show draft
			$this->session->set('accom_details', $accom_details[0]);
			$this->action_preview(NULL);
		}
	}

	/**
	 * Edit Accomplishment Report
	 */
	public function action_edit()
	{
		$accom = new Model_Accom;
		
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$this->session->set('accom_details', $accom_details[0]);
		$this->action_preview(NULL);
	}

	/**
	 * Delete Accomplishment Report
	 */
	public function action_delete()
	{
		$accom = new Model_Accom;
		
		$accom_ID = $this->request->param('id');
		$delete = $accom->delete($accom_ID);

		$filter = $this->session->get('filter', NULL);
		$user_ID = $this->session->get('user_ID');
		$employee_code = $this->session->get('employee_code');
		$accom_reports = $accom->get_all_accom($user_ID, $filter);

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('employee_code', $employee_code)
			->bind('accom_reports', $accom_reports)
			->bind('delete', $delete)
			->bind('filter', $filter);
		$this->response->body($this->view->render());
	}

	/**
	 * View Accomplishment Report (PDF)
	 */
	private function action_pdf($filename)
	{}

	/**
	 * View Accomplishment Report (Draft)
	 */
	private function action_preview($label)
	{
		// $this->session->set('pub_rows', NULL);
		// $this->session->set('awd_rows', NULL);
		// $this->session->set('rch_rows', NULL);
		// $this->session->set('ppr_rows', NULL);
		// $this->session->set('par_rows', NULL);
		// $this->session->set('mat_rows', NULL);
		// $this->session->set('oth_rows', NULL);
		$label = date_format(date_create($this->session->get('accom_details')['yearmonth']), 'F Y');

		$this->view->content = View::factory('faculty/accom/form/template')
			->bind('label', $label)
			->bind('session', $this->session);
		$this->response->body($this->view->render());		
	}

	/**
	 * New Accomplishment
	 */
	public function action_add()
	{
		$key = $this->request->param('id');

		switch ($key) {
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
			
			case 'pub':
				# code...
				break;
		}
	}

} // End Accom
