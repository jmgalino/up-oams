<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dean extends Controller_Faculty implements Controller_Faculty_AccomGroup, Controller_Faculty_IpcrGroup, Controller_Faculty_OpcrGroup, Controller_Faculty_CumaGroup {

	private $univ;
	private $user;
	private $college_details;
	private $college_users;
	private $college_userIDs;

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		if ($this->session->get('identifier') != 'dean')
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect('faculty/error');
		}

		$this->univ = new Model_Univ;
		$this->user = new Model_User;

		$this->college_details = $this->univ->get_college_details(NULL, $this->session->get('program_ID'));
		$programIDs = $this->univ->get_college_programIDs($this->college_details['college_ID']);
		$this->college_users = $this->user->get_user_group($programIDs);

		$this->college_userIDs = array();
		foreach ($this->college_users as $college_user)
		{
			$this->college_userIDs[] = $college_user['user_ID'];
		}
	}

	/**
	 * List college faculty
	 */
	public function action_profiles()
	{
		$profile_url = URL::site('faculty/coll/profile').'/';
		$programs = $this->univ->get_programs();
		
		$this->view->content = View::factory('faculty/profile/faculty')
			->bind('group', $this->college_details['college'])
			->bind('users', $this->college_users)
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
		$faculty_url = URL::site('faculty/coll/profiles');

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

	/**
	 * Announcements
	 * List college announcements
	 */
	public function action_announcements()
	{
		switch ($this->request->param('id'))
		{
			case 'new':
				$this->announcement_new();
				break;

			case 'update':
				$this->announcement_update();
				break;

			default:
				$success = $this->session->get_once('success');
				$announcements = $this->oams->get_announcements($this->session->get('user_ID'), 'coll');

				$new_url = URL::site('faculty/coll/announcements/new');
				$update_url = URL::site('faculty/coll/announcements/update');
				$form_url = 'faculty/coll/announcements/new';
				
				$this->view->content = View::factory('faculty/announcement/announcements')
					->bind('new_url', $new_url)
					->bind('success', $success)
					->bind('form_url', $form_url)
					->bind('announcements', $announcements)
					->bind('update_url', $update_url);
				$this->response->body($this->view->render());
				break;
		}
	}

	/**
	 * Create announcement
	 */
	private function announcement_new()
	{
		$details = $this->request->post();
		$details['user_ID'] = $this->session->get('user_ID');
		$details['type'] = 'coll';
		$details['date'] = date('Y-m-d H:i:s');
		
		$add_success = $this->oams->add_announcement($details);
		$this->session->set('success', $add_success);
		$this->redirect('faculty/coll/announcements', 303);
	}

	/**
	 * Update Announcements
	 */
	private function announcement_update()
	{
		$details = $this->request->post();
		$details['edited'] = 1;

		$update_success = $this->oams->update_announcement($details);
		$this->session->set('success', $update_success);
		$this->redirect('faculty/coll/announcements', 303);
	}

	/* ==================================== *
    *                                       *
    *     Controller_Faculty_AccomGroup     *
    *                                       *
    * ===================================== */

	/**
	 * Accomplishment Report
	 * List college reports
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
				$accom_reports = $accom->get_group_accom($this->college_userIDs, NULL, NULL, FALSE);
				$accom_all_url = URL::site('faculty/coll/accom/all');
				$accom_url = URL::site('faculty/coll/accom/view');
				$label = 'Accomplishment Reports - College';
				$consolidate_url = 'faculty/coll/accom/consolidate';

				$this->view->content = View::factory('faculty/accom/list/group')
					->bind('label', $label)
					->bind('group', $this->college_details['college'])
					->bind('accom_reports', $accom_reports)
					->bind('accom_all_url', $accom_all_url)
					->bind('consolidate_url', $consolidate_url)
					->bind('error', $error)
					->bind('users', $this->college_users)
					->bind('programs', $programs)
					->bind('accom_url', $accom_url);
				$this->response->body($this->view->render());
				break;
		}
	}	

	/**
	 * List college accomplishments
	 */
	public function accom_all()
	{
		$identifier = 'dean';
		$accom_reports = $this->get_group_accom($this->college_userIDs, NULL, NULL);

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
			->bind('users', $this->college_users);
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
		$accom_url = '<a href="'.URL::site('faculty/coll/accom').'">Accomplishment Reports - College</a>';
		$evaluate_url = 'faculty/coll/accom/evaluate/'.$accom_ID;

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

		$this->redirect('faculty/coll/accom/view/'.$accom_ID, 303);
	}

	/**
	 * Consolidate college reports
	 */
	public function accom_consolidate($accom)
	{
		$start = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01 '.$this->request->post('end')));

		$this->session->set('unit', $this->college_details['short']);
		$accoms = $this->get_group_accom($this->college_userIDs, $start, $end);
		
		if ($accoms)
		{
			$consolidate_data['level'] = 'college';
			$consolidate_data['accoms'] = $accoms;
			$consolidate_data['start'] = $start;
			$consolidate_data['end'] = $end;
			$this->session->set('accom_type', 'group');
			$this->session->set('users', $this->college_users);
			$this->session->set('consolidate_data', $consolidate_data);
			$this->response = Request::factory('extras/mpdf/accom-consolidated')
				->execute();
		}
		else
		{
			$period = $this->request->post('start').' - '.$this->request->post('end');
			$this->session->set('error', 'There are no accepted/saved reports to consolidate in the period '.$period.'.');

			$this->redirect('faculty/coll/accom', 303);
		}
	}

	/* ==================================== *
	*										*
	*	 Controller_Faculty_IpcrGroup		*
	*										*
	* ===================================== */

	/**
	 * IPCR Forms
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
				$error = $this->session->get_once('error'); // Consolidate period doesn't include any form
				$employee_code = $this->session->get('employee_code');

				$programs = $this->univ->get_programs();
				$ipcr_forms = $ipcr->get_group_ipcr($this->college_userIDs, NULL, NULL, FALSE);
				$opcr_forms = $opcr->get_group_opcr($this->college_userIDs, NULL, NULL, FALSE);
				$ipcr_url = URL::site('faculty/coll/ipcr/view');
				$label = 'IPCR Forms - College';
				$consolidate_form = 'faculty/ipcr/form/modals/coll';
				$consolidate_url = 'faculty/coll/ipcr/consolidate';

				$this->view->content = View::factory('faculty/ipcr/list/group')
					->bind('label', $label)
					->bind('group', $this->college_details['college'])
					->bind('opcr_forms', $opcr_forms)
					->bind('ipcr_forms', $ipcr_forms)
					->bind('consolidate_form', $consolidate_form)
					->bind('consolidate_url', $consolidate_url)
					->bind('error', $error)
					->bind('users', $this->college_users)
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
		$ipcr_url = '<a href="'.URL::site('faculty/coll/ipcr').'">IPCR Forms - College</a>';
		$evaluate_url = 'faculty/coll/ipcr/evaluate/'.$ipcr_ID;

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

		$this->redirect('faculty/coll/ipcr/view/'.$ipcr_ID, 303);
	}

	/**
	 * Consolidate forms
	 */
	public function ipcr_consolidate($ipcr, $opcr)
	{
		$start = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01 '.$this->request->post('end')));
		$period = $this->request->post('start').' - '.$this->request->post('end');

		$ipcr_forms = $ipcr->get_group_ipcr($this->college_userIDs, $start, $end, TRUE);
		
		if ($ipcr_forms)
		{
			$this->session->set('ipcr_forms', $ipcr_forms);
			$this->session->set('period', $period);
			$this->redirect('extras/mpdf/download/ipcr-consolidated/', 303);
		}
		else
		{
			$this->session->set('error', 'There are no IPCR/OPCR Forms to consolidate in the period '.$period.'.');

			$this->redirect('faculty/coll/ipcr', 303);
		}
	}

	/* ==================================== *
	*										*
	*	 Controller_Faculty_OpcrGroup		*
	*										*
	* ===================================== */

	/**
	 * OPCR Forms
	 * List forms
	 */
	public function action_opcr()
	{
		$opcr = new Model_Opcr;

		switch ($this->request->param('type'))
		{
			case 'view':
				$this->opcr_view($opcr);
				break;
			
			case 'evaluate':
				$this->opcr_evaluate($opcr);
				break;
			
			case 'consolidate':
				$this->opcr_consolidate($opcr);
				break;

			default:
				$error = $this->session->get_once('error'); // Consolidate period doesn't include any form
				$employee_code = $this->session->get('employee_code');

				$departments = $this->univ->get_departments();
				$opcr_forms = $opcr->get_group_opcr($this->college_userIDs, NULL, NULL, FALSE);
				$opcr_forms = $opcr->get_group_opcr($this->college_userIDs, NULL, NULL, FALSE);

				$this->view->content = View::factory('faculty/opcr/list/group')
					->bind('group', $this->college_details['college'])
					->bind('opcr_forms', $opcr_forms)
					->bind('error', $error)
					->bind('users', $this->college_users)
					->bind('departments', $departments);
				$this->response->body($this->view->render());
				break;
		}
	}

	/**
	 * Show department form
	 */
	public function opcr_view($opcr)
	{
		$evaluation = $this->session->get_once('evaluation');
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$user_details = $this->user->get_details($opcr_details['user_ID'], NULL);
		$department_details = $this->univ->get_department_details(NULL, $user_details['program_ID']);
		
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];

		$this->view->content = View::factory('faculty/opcr/view/group')
			->bind('evaluation', $evaluation)
			->bind('opcr_details', $opcr_details)
			->bind('faculty', $fullname)
			->bind('unit', $department_details['short'])
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate department form
	 */
	public function opcr_evaluate($opcr)
	{
		$assessor = $this->session->get('fullname').' '.date('(d M Y)');
		
		$opcr_ID = $this->request->param('id');
		$details = $this->request->post();
		
		$details['remarks'] = ($details['remarks']
			? $details['remarks'].' - '.$assessor
			: $details['status'].' by '.$assessor);
		
		$evaluate_success = $opcr->evaluate($opcr_ID, $details);
		$this->session->set('evaluation', $evaluate_success);

		$this->redirect('faculty/coll/opcr/view/'.$opcr_ID, 303);
	}

	/**
	 * Consolidate department forms
	 */
	public function opcr_consolidate($opcr)
	{
		$start = date('Y-m-d', strtotime('01'.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01'.$this->request->post('end')));
		
		$opcr_forms = $opcr->get_group_opcr($this->college_userIDs, $start, $end, TRUE);

		if ($opcr_forms)
		{
			$opcr_outputs = array();
			foreach ($opcr_forms as $opcr_details)
			{
				$outputs = $opcr->get_outputs($opcr_details['opcr_ID']);

				if ($outputs)
				{
					foreach ($outputs as $output)
					{
						$opcr_outputs[] = $output;
					}
				}
			}

			$consolidate_data['start'] = $start;
			$consolidate_data['end'] = $end;
			$consolidate_data['opcr_outputs'] = $opcr_outputs;
			$this->session->set('consolidate_data', $consolidate_data);

			$this->redirect('extras/mpdf/download/opcr-consolidated/', 303);
		}
		else
		{
			$period = $this->request->post('start').' - '.$this->request->post('end');
			$this->session->set('error', 'There are no OPCR Forms to consolidate in the period '.$period.'.');

			$this->redirect('faculty/opcr_coll', 303);
		}
	}

	/* ==================================== *
    *                                       *
    *     Controller_Faculty_CumaGroup      *
    *                                       *
    * ===================================== */

    /**
	 * CUMA Forms
	 * List forms
	 */
	public function action_cuma()
	{
		$cuma = new Model_Cuma;

		switch ($this->request->param('type'))
		{
			case 'view':
				$this->cuma_view($cuma);
				break;
			
			default:
				$programs = $this->univ->get_programs();
				$cuma_forms = $cuma->get_group_cuma($this->college_userIDs);

				$this->view->content = View::factory('faculty/cuma/list/group')
					->bind('group', $this->college_details['college'])
					->bind('cuma_forms', $cuma_forms)
					->bind('users', $this->college_users)
					->bind('programs', $programs);
				$this->response->body($this->view->render());
				break;
		}
	}	

	/**
	 * Show faculty form
	 */
	public function cuma_view($cuma)
	{
		$cuma_ID = $this->request->param('id');
		$cuma_details = $cuma->get_details($cuma_ID);
		$user_details = $this->user->get_details($cuma_details['user_ID'], NULL);
		
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$department_details = $this->univ->get_department_details(NULL, $user_details['program_ID']);

		$this->view->content = View::factory('faculty/cuma/view/group')
			->bind('cuma_details', $cuma_details)
			->bind('faculty', $fullname)
			->bind('unit', $department_details['short']);
		$this->response->body($this->view->render());
	}

} // End Dean
