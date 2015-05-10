<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Chair extends Controller_Faculty implements Controller_Faculty_AccomGroup, Controller_Faculty_IpcrGroup {

	private $univ;
	private $user;
	private $department_details;
	private $department_users;
	private $department_userIDs;

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		if ($this->session->get('identifier') != 'chair')
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect('faculty/error');
		}

		$this->univ = new Model_Univ;
		$this->user = new Model_User;

		$this->department_details = $this->univ->get_department_details(NULL, $this->session->get('program_ID'));
		$programIDs = $this->univ->get_department_programIDs($this->department_details['department_ID']);
		$this->department_users = $this->user->get_user_group($programIDs);

		$this->department_userIDs = array();
		foreach ($this->department_users as $department_user)
		{
			$this->department_userIDs[] = $department_user['user_ID'];
		}
	}

	/**
	 * List department faculty
	 */
	public function action_profiles()
	{	
		$profile_url = URL::site('faculty/dept/profile').'/';
		$programs = $this->univ->get_programs();
		
		$this->view->content = View::factory('faculty/profile/faculty')
			->bind('group', $this->department_details['department'])
			->bind('users', $this->department_users)
			->bind('programs', $programs)
			->bind('profile_url', $profile_url);
		$this->response->body($this->view->render());
	}

	/**
	 * Show faculty profile
	 */
	public function action_profile()
	{
		$accom = new Model_Accom;

		$employee_code = $this->request->param('id');
		
		$user_details = $this->user->get_details(NULL, $employee_code);
		$education = $this->user->get_education($user_details['user_ID'], NULL);
		$accom_reports = $accom->get_faculty_accom($user_details['user_ID'], NULL, NULL, TRUE);
		$program_details = $this->univ->get_program_details($user_details['program_ID']);
		
		$user_details['program_short'] = $program_details['program_short'];
		$fullname = $user_details['last_name'].', '.$user_details['first_name'].' '.$user_details['middle_name'][0].'.';
		$faculty_url = URL::site('faculty/dept/profiles');

		$reports = array();
		$accom_IDs = array();
		if ($accom_reports)
		{
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
		
		$this->view->content = View::factory('faculty/profile/profile')
			->bind('faculty_url', $faculty_url)
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
			->bind('accom_oth', $oth);
		$this->response->body($this->view->render());
	}

	/* ==================================== *
	*										*
	*	  Controller_Faculty_AccomGroup		*
	*										*
	* ===================================== */

	/**
	 * List department reports
	 */
	public function action_accom()
	{
		$accom = new Model_Accom;

		switch ($this->request->param('type'))
		{
			case 'all':
				$this->accom_all();
				break;
			
			case 'view':
				$this->accom_view($accom);
				break;
			
			case 'evaluate':
				$this->accom_evaluate($accom);
				break;
			
			case 'consolidate':
				$this->accom_consolidate($accom);
				break;

			default:
				$error = $this->session->get_once('error'); // Consolidate period doesn't include any report
				$employee_code = $this->session->get('employee_code');

				$programs = $this->univ->get_programs();
				$accom_reports = $accom->get_group_accom($this->department_userIDs, NULL, NULL, FALSE);
				$accom_all_url = URL::site('faculty/dept/accom/all');
				$accom_url = URL::site('faculty/dept/accom/view');
				$label = 'Accomplishment Reports - Department';
				$consolidate_url = 'faculty/dept/accom/consolidate';

				$this->view->content = View::factory('faculty/accom/list/group')
					->bind('label', $label)
					->bind('group', $this->department_details['department'])
					->bind('accom_reports', $accom_reports)
					->bind('accom_all_url', $accom_all_url)
					->bind('consolidate_url', $consolidate_url)
					->bind('error', $error)
					->bind('users', $this->department_users)
					->bind('programs', $programs)
					->bind('accom_url', $accom_url);
				$this->response->body($this->view->render());
				break;
		}
	}	

	/**
	 * List department accomplishments
	 */
	public function accom_all()
	{
		$identifier = 'chair';
		$accom_reports = $this->get_group_accom($this->department_userIDs, NULL, NULL);

		$this->view->content = View::factory('faculty/accom/list/group_all')
			->bind('identifier', $identifier)
			->bind('accom_reports', $accom_reports['accom_reports'])
			->bind('accom_pub', $accom_reports['pub'])
			->bind('accom_awd', $accom_reports['awd'])
			->bind('accom_rch', $accom_reports['rch'])
			->bind('accom_ppr', $accom_reports['ppr'])
			->bind('accom_ctv', $accom_reports['ctv'])
			->bind('accom_par', $accom_reports['par'])
			->bind('accom_mat', $accom_reports['mat'])
			->bind('accom_oth', $accom_reports['oth'])
			->bind('users', $this->department_users);
		$this->response->body($this->view->render());
	}

	/**
	 * Show faculty report
	 */
	public function accom_view($accom)
	{
		$evaluation = $this->session->get_once('evaluation');
		
		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$user_details = $this->user->get_details($accom_details['user_ID'], NULL);
		
		$user_flag = ($accom_details['user_ID'] == $this->session->get('user_ID') ? TRUE : FALSE);
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$accom_url = '<a href="'.URL::site('faculty/dept/accom').'">Accomplishment Reports - Department</a>';
		$evaluate_url = 'faculty/dept/accom/evaluate/'.$accom_ID;

		$this->view->content = View::factory('faculty/accom/view/group')
			->bind('accom_url', $accom_url)
			->bind('evaluation', $evaluation)
			->bind('evaluate_url', $evaluate_url)
			->bind('accom_details', $accom_details)
			->bind('user_flag', $user_flag)
			->bind('faculty', $fullname);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate faculty report
	 */
	public function accom_evaluate($accom)
	{
		$assessor = $this->session->get('fullname').' '.date('(d M Y)');
		
		$accom_ID = $this->request->param('id');
		$details = $this->request->post();
		$details['remarks'] = ($details['remarks']
			? $details['remarks'].' - '.$assessor
			: $details['status'].' by '.$assessor);
		
		$evaluate_success = $accom->evaluate($accom_ID, $details);
		$this->session->set('evaluation', $evaluate_success);

		$this->redirect('faculty/dept/accom/view/'.$accom_ID, 303);
	}

	/**
	 * Consolidate department reports
	 */
	public function accom_consolidate($accom)
	{
		$start = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01 '.$this->request->post('end')));

		$this->session->set('unit', $this->department_details['short']);
		$accoms = $this->get_group_accom($this->department_userIDs, $start, $end);
		
		if ($accoms)
		{
			$consolidate_data['accoms'] = $accoms;
			$consolidate_data['start'] = $start;
			$consolidate_data['end'] = $end;
			$this->session->set('accom_type', 'group');
			$this->session->set('users', $this->department_users);
			$this->session->set('consolidate_data', $consolidate_data);
			$this->response = Request::factory('extras/mpdf/accom-consolidated')
				->execute();
		}
		else
		{
			$period = $this->request->post('start').' - '.$this->request->post('end');
			$this->session->set('error', 'There are no accepted/saved reports to consolidate in the period '.$period.'.');

			$this->redirect('faculty/dept/accom', 303);
		}
	}

	/* ==================================== *
	*										*
	*	 Controller_Faculty_IpcrGroup		*
	*										*
	* ===================================== */

	/**
	 * List forms
	 */
	public function action_ipcr()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;

		switch ($this->request->param('type'))
		{
			case 'view':
				$this->ipcr_view($ipcr, $opcr);
				break;
			
			case 'evaluate':
				$this->ipcr_evaluate($ipcr);
				break;
			
			case 'consolidate':
				$this->ipcr_consolidate($ipcr, $opcr);
				break;

			default:
				$error = $this->session->get_once('error'); // Consolidated report has been submitted
				$employee_code = $this->session->get('employee_code');

				$programs = $this->univ->get_programs();
				$ipcr_forms = $ipcr->get_group_ipcr($this->department_userIDs, NULL, NULL, FALSE);
				$opcr_forms = $opcr->get_group_opcr($this->department_userIDs, NULL, NULL, FALSE);
				$ipcr_url = URL::site('faculty/dept/ipcr/view');
				$label = 'IPCR Forms - Department';
				$consolidate_form = 'faculty/ipcr/form/modals/dept';
				$consolidate_url = 'faculty/dept/ipcr/consolidate';

				$this->view->content = View::factory('faculty/ipcr/list/group')
					->bind('label', $label)
					->bind('group', $this->department_details['department'])
					->bind('opcr_forms', $opcr_forms)
					->bind('ipcr_forms', $ipcr_forms)
					->bind('consolidate_form', $consolidate_form)
					->bind('consolidate_url', $consolidate_url)
					->bind('error', $error)
					->bind('users', $this->department_users)
					->bind('programs', $programs)
					->bind('ipcr_url', $ipcr_url);
				$this->response->body($this->view->render());
				break;
		}
	}	

	/**
	 * Show faculty form
	 */
	public function ipcr_view($ipcr, $opcr)
	{
		$evaluation = $this->session->get_once('evaluation');

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$user_details = $this->user->get_details($ipcr_details['user_ID'], NULL);

		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;
		$user_flag = ($ipcr_details['user_ID'] == $this->session->get('user_ID') ? TRUE : FALSE);
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$ipcr_url = '<a href="'.URL::site('faculty/dept/ipcr').'">IPCR Forms - Department</a>';
		$evaluate_url = 'faculty/dept/ipcr/evaluate/'.$ipcr_ID;

		$flag = 0;
		$targets = $ipcr->get_targets($ipcr_details['ipcr_ID']);
		foreach ($targets as $target)
		{
			if (!$target['r_quantity'] OR !$target['r_efficiency'] OR !$target['r_timeliness'])
				$flag++;
		}

		$this->view->content = View::factory('faculty/ipcr/view/group')
			->bind('ipcr_url', $ipcr_url)
			->bind('evaluation', $evaluation)
			->bind('evaluate_url', $evaluate_url)
			->bind('ipcr_details', $ipcr_details)
			->bind('user_flag', $user_flag)
			->bind('flag', $flag)
			->bind('faculty', $fullname)
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate faculty form
	 */
	public function ipcr_evaluate($ipcr)
	{
		$assessor = $this->session->get('fullname').' '.date('(d M Y)');
		
		$ipcr_ID = $this->request->param('id');
		$details = $this->request->post();
		
		$details['remarks'] = ($details['remarks']
			? $details['remarks'].' - '.$assessor
			: $details['status'].' by '.$assessor);
		
		$evaluate_success = $ipcr->evaluate($ipcr_ID, $details);
		$this->session->set('evaluation', $evaluate_success);

		$this->redirect('faculty/dept/ipcr/view/'.$ipcr_ID, 303);
	}

	/**
	 * Consolidate forms
	 */
	public function ipcr_consolidate($ipcr, $opcr)
	{
		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		
		$opcr_ID = ($this->request->post('opcr_ID') ? $this->request->post('opcr_ID') : $this->request->param('id'));
		$opcr_details = $opcr->get_details($opcr_ID);
		
		if (in_array($opcr_details['status'], array('Pending', 'Accepted')))
		{
			$this->session->set('error', 'OPCR Form is locked for editing.');
			
			$referrer = $this->request->referrer();
			if (strpos($referrer, 'opcr') !== FALSE)
				$this->redirect('faculty/opcr');
			else
				$this->redirect('faculty/dept/ipcr');
		}

		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$label = $period_from.' - '.$period_to;

		$flag = 0;
		$outputs = $opcr->get_outputs($opcr_ID);
		foreach ($outputs as $output)
		{
			if (!$output['r_quantity'] OR !$output['r_efficiency'] OR !$output['r_timeliness'])
				$flag++;
		}

		$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);
		$targets = $ipcr->get_output_targets(NULL, $outputs);
		$categories = $this->oams->get_categories();
		
		$this->view->content = View::factory('faculty/opcr/form/final/template')
			->bind('label', $label)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('flag', $flag)
			->bind('opcr_ID', $opcr_ID)
			->bind('categories', $categories)
			->bind('outputs', $outputs)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('targets', $targets)
			->bind('users', $this->department_users);
		$this->response->body($this->view->render());
	}

} // End Chair
