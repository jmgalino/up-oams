<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Accom extends Controller_Faculty {

	/**
	 * Faculty's Accomplishment Reports
	 */
	public function action_index()
	{
		$accom = new Model_Accom;

		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$error = $this->session->get_once('error');
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, FALSE);

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
		$identifier = $this->session->get('identifier');
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, TRUE);

		if ($accom_reports)
		{
			$reports = array();
			$accom_IDs = array();
			foreach ($accom_reports as $report)
			{
				if (in_array($report['status'], array('Approved', 'Pending', 'Saved')))
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
			->bind('accom_oth', $oth)
			->bind('identifier', $identifier);
		$this->response->body($this->view->render());
	}

	/**
	 * New Accomplishment Report
	 */
	public function action_new()
	{
		$accom = new Model_Accom;

		if (($this->request->post('report_type') == 'new') AND ($this->request->post('yearmonth')))
		{
			$details['user_ID'] = $this->session->get('user_ID');
			$details['yearmonth'] = date('Y-m-d', strtotime('01 '.$this->request->post('yearmonth')));
			
			$insert_success = $accom->initialize($details);

			if (is_numeric($insert_success))
			{
				$accom_details = $accom->get_details($insert_success);
				$this->session->set('accom_details', $accom_details);
				$this->show_draft();
			}
			elseif (is_array($insert_success))
			{
				$accom_details = $accom->get_details($insert_success['accom_ID']);
				$this->session->set('accom_details', $accom_details);
				$this->session->set('warning', $insert_success['message']);
				$this->show_draft();
			}
			else // Error
			{
				$this->session->set('error', $insert_success);
				$this->redirect('faculty/accom', 303);
			}
		}
		else
		{
			$this->consolidate_accoms();
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

		if (!$accom_details['document'] OR $accom_details['status'] == 'Rejected')
		{
			$draft = $this->session->get_once('pdf_draft');

			if ($draft)
			{
				$accom_details['draft'] = $draft;
				$this->view->content = View::factory('faculty/accom/view/faculty')
					->bind('accom_details', $accom_details);
				$this->response->body($this->view->render());
			}
			else
				$this->redirect('extras/mpdf/preview/accom/'.$accom_details['accom_ID']);

			$accom_details['draft'] = $draft;
		}
		else
			$accom_details['draft'] = NULL;

		$this->view->content = View::factory('faculty/accom/view/faculty')
			->bind('accom_details', $accom_details);
		$this->response->body($this->view->render());
	}

	/**
	 * Edit Accomplishment Report
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
		$this->session->set('accom_type', 'faculty');
		$this->redirect('extras/mpdf/submit/accom/'.$accom_ID);
	}

	/**
	 * View Accomplishment Report (Draft)
	 */
	private function show_draft()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;

		$label = date('F Y', strtotime($this->session->get('accom_details')['yearmonth']));
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
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

		// $university = $univ->get_university();
		// $college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		// $department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		
		$this->view->content = View::factory('faculty/accom/form/template')
			->bind('label', $label)
			->bind('success', $success)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('session', $this->session)
			->bind('accom', $accoms);
			// ->bind('university', $university)
			// ->bind('college_details', $college_details)
			// ->bind('department_details', $department_details);
		$this->response->body($this->view->render());	
	}

	/**
	 * Consolidate Accomplishment Reports
	 */
	private function consolidate_accoms()
	{
		$accom = new Model_Accom;

		$start = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01 '.$this->request->post('end')));
		$accom_ID = $accom->get_faculty_accom($this->session->get('user_ID'), $start, $end, TRUE);

		if ($accom_ID)
		{
			$consolidate_data['accoms']['pub'] = $accom->get_accoms($accom_ID, 'pub');
			$consolidate_data['accoms']['awd'] = $accom->get_accoms($accom_ID, 'awd');
			$consolidate_data['accoms']['rch'] = $accom->get_accoms($accom_ID, 'rch');
			$consolidate_data['accoms']['ppr'] = $accom->get_accoms($accom_ID, 'ppr');
			$consolidate_data['accoms']['ctv'] = $accom->get_accoms($accom_ID, 'ctv');
			$consolidate_data['accoms']['par'] = $accom->get_accoms($accom_ID, 'par');
			$consolidate_data['accoms']['mat'] = $accom->get_accoms($accom_ID, 'mat');
			$consolidate_data['accoms']['oth'] = $accom->get_accoms($accom_ID, 'oth');

			$consolidate_data['start'] = $start;
			$consolidate_data['end'] = $end;
			$this->session->set('consolidate_data', $consolidate_data);
			$this->session->set('accom_type', 'faculty');
			$this->redirect('extras/mpdf/consolidate/accom-consolidated');
		}
		else
		{
			$period = $this->request->post('start').' - '.$this->request->post('end');

			if ($this->session->get('identifier') == 'faculty')
				$this->session->set('error', 'There are no approved reports to consolidate in the period '.$period.'.');
			else
				$this->session->set('error', 'There are no saved reports to consolidate in the period '.$period.'.');

			$this->redirect('faculty/accom', 303);
		}
	}

} // End Accom
