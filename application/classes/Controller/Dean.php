<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dean extends Controller_Faculty {

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
		$programs = $univ->get_programs();
		
		$this->view->content = View::factory('faculty/profile/faculty')
			->bind('group', $this->college_details['college'])
			->bind('users', $this->college_users)
			->bind('programs', $programs);
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
		$url = URL::site('faculty/coll/profiles');

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
			->bind('url', $url)
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
    *                                       *
    *     Controller_Faculty_AccomGroup     *
    *                                       *
    * ===================================== */

	/**
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
				$error = $this->session->get_once('error');
				$employee_code = $this->session->get('employee_code');

				$programs = $this->univ->get_programs();
				$accom_reports = $accom->get_group_accom($this->college_userIDs, NULL, NULL, FALSE);
				$identifier = 'dean';
				$consolidate_url = 'faculty/coll/accom/consolidate';

				$this->view->content = View::factory('faculty/accom/list/group')
					->bind('identifier', $identifier)
					->bind('group', $this->college_details['college'])
					->bind('accom_reports', $accom_reports)
					->bind('consolidate_url', $consolidate_url)
					->bind('error', $error)
					->bind('users', $this->college_users)
					->bind('programs', $programs);
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
		
		$identifier = 'dean';
		$user_flag = ($accom_details['user_ID'] == $this->session->get('user_ID') ? TRUE : FALSE);
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$evaluate_url = 'faculty/coll/accom/evaluate/'.$accom_ID;

		$this->view->content = View::factory('faculty/accom/view/group')
			->bind('identifier', $identifier)
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
		$accom = new Model_Accom;

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

} // End Dean
