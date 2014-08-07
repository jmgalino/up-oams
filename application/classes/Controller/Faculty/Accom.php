<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Faculty_Accom extends Controller_Faculty {

	/**
	 * Faculty's Accomplishment Reports
	 */
	public function action_index()
	{
		$accom = new Model_Accom;

		$this->session->delete('accom_details');
		$this->session->delete('ipcr_details');
		$this->session->delete('opcr_details');
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$employee_code = $this->session->get('employee_code');
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('accom_reports', $accom_reports)
			->bind('employee_code', $employee_code);
		$this->response->body($this->view->render());
	}

	/**
	 * New Accomplishment Report
	 */
	public function action_new()
	{
		if (($this->request->post('document_type') == 'new') OR ($this->request->post('yearmonth')))
		{
			$accom = new Model_Accom;

			$details['user_ID'] = $this->session->get('user_ID');
			$details['yearmonth'] = date_format(date_create('01 '.$this->request->post('yearmonth')), 'Y-m-d');
			$details['accom_ID'] = $accom->initialize($details);
			$this->session->set('accom_details', $details);
			$this->action_draft();
		}
		else
		{
			$this->action_consolidate();
		}
	}

	/**
	 * View Accomplishment Report (PDF)
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
			$label = date_format(date_create($accom_details['yearmonth']), 'F Y');
			$this->action_pdf($label, $accom_details['document']);
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
		$this->action_draft();
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
		$this->redirect('mpdf/accom');
	}

	/**
	 * Download Accomplishment Report
	 */
	public function action_download()
	{
		$this->redirect('mpdf/download_accom');
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
	 * Accomplishment Report - PDF
	 */
	private function action_pdf($label, $filepath)
	{
		$this->view->content = View::factory('faculty/accom/view/faculty')
			->bind('label', $label)
			->bind('filepath', $filepath);
		$this->response->body($this->view->render());
	}

	/**
	 * Accomplishment Report - Draft
	 */
	private function action_draft()
	{
		$accom = new Model_Accom;

		$label = date_format(date_create($this->session->get('accom_details')['yearmonth']), 'F Y');
		$accom_ID = $this->session->get('accom_details')['accom_ID'];

		$pub = $accom->get_accoms($accom_ID, 'pub'); $this->session->set('accom_pub', $pub);
		$awd = $accom->get_accoms($accom_ID, 'awd'); $this->session->set('accom_awd', $awd);
		$rch = $accom->get_accoms($accom_ID, 'rch'); $this->session->set('accom_rch', $rch);
		$ppr = $accom->get_accoms($accom_ID, 'ppr'); $this->session->set('accom_ppr', $ppr);
		$ctv = $accom->get_accoms($accom_ID, 'ctv'); $this->session->set('accom_ctv', $ctv);
		$par = $accom->get_accoms($accom_ID, 'par'); $this->session->set('accom_par', $par);
		$mat = $accom->get_accoms($accom_ID, 'mat'); $this->session->set('accom_mat', $mat);
		$oth = $accom->get_accoms($accom_ID, 'oth'); $this->session->set('accom_oth', $oth);
		$accoms = array_merge($pub, $awd, $rch, $ctv, $par, $mat, $oth);

		$this->view->content = View::factory('faculty/accom/form/template')
			->bind('label', $label)
			->bind('session', $this->session)
			->bind('accom', $accoms);
		$this->response->body($this->view->render());	
	}

	/**
	 * Check ownership
	 */
	private function action_check($user_ID)
	{
		if ($this->session->get('user_ID') !== $user_ID)
		{
			$this->session->set('error', 'This report is not available.');
			$this->redirect('faculty/error');
		}
	}

} // End Accom