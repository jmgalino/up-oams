<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Faculty_Accom extends Controller_Faculty {

	/**
	 * Faculty's Accomplishment Reports
	 */
	public function action_index()
	{
		$accom = new Model_Accom;

		$this->action_delete_session();
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$error = $this->session->get_once('error');
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('error', $error)
			->bind('accom_reports', $accom_reports);
		$this->response->body($this->view->render());
	}

	/**
	 * Faculty's Accomplishments
	 */
	public function action_all()
	{
		$accom = new Model_Accom;

		$name = $this->session->get('fullname2');
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'));

		if ($accom_reports)
		{
			$reports = array();
			$accom_IDs = array();
			foreach ($accom_reports as $report)
			{
				if (($report['status'] == 'Approved') OR ($report['status'] == 'Pending') OR ($report['status'] == 'Saved'))
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

		$this->view->content = View::factory('faculty/accom/list/faculty_all')
			->bind('accom_reports', $reports)
			->bind('name', $name)
			->bind('accom_pub', $pub)
			->bind('accom_awd', $awd)
			->bind('accom_rch', $rch)
			->bind('accom_ppr', $ppr)
			->bind('accom_ctv', $ctv)
			->bind('accom_par', $par)
			->bind('accom_mat', $mat)
			->bind('accom_oth', $oth);
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
			$this->show_draft();
		}
		else
		{
			$this->show_consolidate();
		}
	}

	/**
	 * View Accomplishment Report (PDF)
	 */
	public function action_preview()
	{
		$accom = new Model_Accom;

		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner

		if ($accom_details['document'])
		{
			// Show PDF
			$this->show_pdf($accom_details);
		}
		else
		{
			// Create from draft
		}
	}

	/**
	 * View Accomplishment Report (Draft)
	 */
	public function action_update()
	{
		$accom = new Model_Accom;
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		if (($accom_details['status'] == 'Approved') OR ($accom_details['status'] == 'Pending'))
		{
			$this->session->set('error', 'Accomplishment Report is locked for editing.');
			$this->redirect('faculty/accom'); //401
		}
		else
		{
			$this->session->set('accom_details', $accom_details);
			$this->show_draft();
		}
	}

	/**
	 * Delete Accomplishment Report
	 */
	public function action_delete()
	{
		$accom = new Model_Accom;
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		if (($accom_details['status'] == 'Approved') OR ($accom_details['status'] == 'Pending'))
		{
			$this->session->set('error', 'Accomplishment Report is locked for editing.');
			$this->redirect('faculty/accom'); //401
		}
		else
		{
			$delete_success = $accom->delete($accom_ID);
			$this->session->set('delete', $delete_success);
			$this->redirect('faculty/accom', 303);
		}
	}

	/**
	 * Submit Accomplishment Report
	 */
	public function action_submit()
	{
		$accom = new Model_Accom;

		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		$this->redirect('faculty/mpdf/submit/accom/'.$accom_ID);
	}

	/**
	 * Download Accomplishment Report
	 */
	public function action_download()
	{
		// generate pdf from draft and force download
		// $this->redirect('faculty/mpdf/download/accom/'.$accom_ID);
	}

	/**
	 * Consolidate Accomplishment Reports
	 */
	private function show_consolidate()
	{
		// Faculty, Department & College Level
		// Open PDF in new tab
	}

	/**
	 * Accomplishment Report - PDF
	 */
	private function show_pdf($accom_details)
	{
		$this->view->content = View::factory('faculty/accom/view/faculty')
			->bind('accom_details', $accom_details);
		$this->response->body($this->view->render());
	}

	/**
	 * Accomplishment Report - Draft
	 */
	private function show_draft()
	{
		$accom = new Model_Accom;

		$label = date('F Y', strtotime($this->session->get('accom_details')['yearmonth']));
		$warning = $this->session->get_once('warning');
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
			->bind('warning', $warning)
			->bind('session', $this->session)
			->bind('accom', $accoms);
		$this->response->body($this->view->render());	
	}

} // End Accom
