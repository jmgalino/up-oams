<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Accom extends Controller_Faculty {

	private $accom;

	public function before()
	{
		parent::before();

		$this->accom = new Model_Accom;
	}

	/**
	 * List faculty reports
	 */
	public function action_index()
	{
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$error = $this->session->get_once('error');
		
		$accom_reports = $this->accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, FALSE);

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('error', $error)
			->bind('accom_reports', $accom_reports);
		$this->response->body($this->view->render());
	}

	/**
	 * List faculty accomplishments
	 */
	public function action_all()
	{
		$fullname = $this->session->get('fullname2');
		$identifier = $this->session->get('identifier');
		$accom_reports = $this->accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, TRUE);

		$reports = array();
		if ($accom_reports)
		{
			$accom_IDs = array();
			foreach ($accom_reports as $report)
			{
				if (in_array($report['status'], array('Saved', 'Pending', 'Accepted')))
				{
					$reports[] = $report;
					$accom_IDs[] = $report['accom_ID'];
				}
			}

			if ($accom_IDs)
			{
				$pub = $this->accom->get_accoms($accom_IDs, 'pub');
				$awd = $this->accom->get_accoms($accom_IDs, 'awd');
				$rch = $this->accom->get_accoms($accom_IDs, 'rch');
				$ppr = $this->accom->get_accoms($accom_IDs, 'ppr');
				$ctv = $this->accom->get_accoms($accom_IDs, 'ctv');
				$par = $this->accom->get_accoms($accom_IDs, 'par');
				$mat = $this->accom->get_accoms($accom_IDs, 'mat');
				$oth = $this->accom->get_accoms($accom_IDs, 'oth');
			}
		}

		$this->view->content = View::factory('faculty/accom/list/faculty_all')
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
			->bind('identifier', $identifier);
		$this->response->body($this->view->render());
	}

	/**
	 * New report
	 */
	public function action_new()
	{
		if (($this->request->post('report_type') == 'new') AND ($this->request->post('yearmonth')))
		{
			$details['user_ID'] = $this->session->get('user_ID');
			$details['yearmonth'] = date('Y-m-d', strtotime('01 '.$this->request->post('yearmonth')));
			
			$insert_success = $this->accom->initialize($details);

			if (is_numeric($insert_success))
			{
				$accom_details = $this->accom->get_details($insert_success);
				$this->session->set('accom_details', $accom_details);
				$this->show_draft();
			}
			elseif (is_array($insert_success))
			{
				$accom_details = $this->accom->get_details($insert_success['accom_ID']);
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
	 * Preview report
	 */
	public function action_preview()
	{
		$accom_ID = $this->request->param('id');
		$accom_details = $this->accom->get_details($accom_ID);

		$accom_details['draft'] = ($this->is_mutable($accom_ID)
			? Request::factory('extras/mpdf/preview/accom/'.$accom_details['accom_ID'])
				->execute()
				->body
			: NULL);
		
		$this->view->content = View::factory('faculty/accom/view/faculty')
			->bind('accom_details', $accom_details);
		$this->response->body($this->view->render());
	}

	/**
	 * Edit report
	 */
	public function action_update()
	{
		$accom_ID = $this->request->param('id');
		
		if ($this->is_mutable($accom_ID))
		{
			$accom_details = $this->accom->get_details($accom_ID);
			$this->session->set('accom_details', $accom_details);
			$this->show_draft();
		}
		else
		{
			$this->session->set('error', 'Accomplishment Report is locked for editing.');
			$this->redirect('faculty/accom');
		}
	}

	/**
	 * Delete report
	 */
	public function action_delete()
	{
		$accom_ID = $this->request->param('id');

		if ($this->is_mutable($accom_ID))
		{
			$delete_success = $this->accom->delete($accom_ID);
			$this->session->set('delete', $delete_success);
			$this->redirect('faculty/accom', 303);
		}
		else
		{
			$this->session->set('error', 'Accomplishment Report is locked for editing.');
			$this->redirect('faculty/accom');
		}
	}

	/**
	 * Submit report
	 */
	public function action_submit()
	{
		$accom_ID = $this->request->param('id');
		
		$accom_details = $this->accom->get_details($accom_ID);
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		$this->session->set('accom_type', 'faculty');
		$details['document'] = Request::factory('extras/mpdf/submit/accom/'.$accom_ID)->execute()->body;
		$details['status'] = ($this->session->get('identifier') == 'faculty' ? 'Pending' : 'Saved');
		$details['date_submitted'] = date('Y-m-d');
		
		$submit_success = $this->accom->update($accom_ID, $details);
		$this->session->set('submit', $submit_success);
		$this->redirect('faculty/accom', 303);
	}

	/**
	 * Show report draft
	 */
	private function show_draft()
	{
		$univ = new Model_Univ;

		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		
		$accom_ID = $this->session->get('accom_details')['accom_ID'];
		$label = date('F Y', strtotime($this->session->get('accom_details')['yearmonth']));
		
		$pub = $this->accom->get_accoms($accom_ID, 'pub'); $this->session->set('accom_pub', $pub);
		$awd = $this->accom->get_accoms($accom_ID, 'awd'); $this->session->set('accom_awd', $awd);
		$rch = $this->accom->get_accoms($accom_ID, 'rch'); $this->session->set('accom_rch', $rch);
		$ppr = $this->accom->get_accoms($accom_ID, 'ppr'); $this->session->set('accom_ppr', $ppr);
		$ctv = $this->accom->get_accoms($accom_ID, 'ctv'); $this->session->set('accom_ctv', $ctv);
		$par = $this->accom->get_accoms($accom_ID, 'par'); $this->session->set('accom_par', $par);
		$mat = $this->accom->get_accoms($accom_ID, 'mat'); $this->session->set('accom_mat', $mat);
		$oth = $this->accom->get_accoms($accom_ID, 'oth'); $this->session->set('accom_oth', $oth);
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
	 * Consolidate reports
	 */
	private function consolidate_accoms()
	{
		$start = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01 '.$this->request->post('end')));
		$accom_ID = $this->accom->get_faculty_accom($this->session->get('user_ID'), $start, $end, TRUE);

		if ($accom_ID)
		{
			$consolidate_data['accoms']['pub'] = $this->accom->get_accoms($accom_ID, 'pub');
			$consolidate_data['accoms']['awd'] = $this->accom->get_accoms($accom_ID, 'awd');
			$consolidate_data['accoms']['rch'] = $this->accom->get_accoms($accom_ID, 'rch');
			$consolidate_data['accoms']['ppr'] = $this->accom->get_accoms($accom_ID, 'ppr');
			$consolidate_data['accoms']['ctv'] = $this->accom->get_accoms($accom_ID, 'ctv');
			$consolidate_data['accoms']['par'] = $this->accom->get_accoms($accom_ID, 'par');
			$consolidate_data['accoms']['mat'] = $this->accom->get_accoms($accom_ID, 'mat');
			$consolidate_data['accoms']['oth'] = $this->accom->get_accoms($accom_ID, 'oth');

			$consolidate_data['start'] = $start;
			$consolidate_data['end'] = $end;
			$this->session->set('consolidate_data', $consolidate_data);
			$this->session->set('accom_type', 'faculty');
			Request::factory('extras/mpdf/accom-consolidated/')->execute();
		}
		else
		{
			$period = $this->request->post('start').' - '.$this->request->post('end');

			if ($this->session->get('identifier') == 'faculty')
				$this->session->set('error', 'There are no accepted reports to consolidate in the period '.$period.'.');
			else
				$this->session->set('error', 'There are no saved reports to consolidate in the period '.$period.'.');

			$this->redirect('faculty/accom', 303);
		}
	}

	/**
	 * Check if report is mutabable
	 */
	private function is_mutable($accom_ID)
	{
		$accom_details = $this->accom->get_details($accom_ID);
		$this->action_check($accom_details['user_ID']); // Redirects if not the owner
		
		return in_array($accom_details['status'], array('Draft', 'Saved', 'Returned'));
	}

} // End Accom
