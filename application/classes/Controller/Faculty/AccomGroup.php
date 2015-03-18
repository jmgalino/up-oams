<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_AccomGroup extends Controller_Faculty {

	/**
	 * Department's Accomplishment Report
	 */
	public function action_dept()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		// $this->action_delete_session();
		$users = $this->get_group_users($this->session->get('identifier'));
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$consolidate_url = 'faculty/accom_dept/consolidate';

		$this->view_group($department['department'], $users, $consolidate_url);
	}

	/**
	 * College's Accomplishment Report
	 */
	public function action_coll()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		// $this->action_delete_session();
		$users = $this->get_group_users($this->session->get('identifier'));
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$consolidate_url = 'faculty/accom_coll/consolidate';

		$this->view_group($college['college'], $users, $consolidate_url);
	}

	/**
	 * Office's Accomplishments
	 */
	public function action_all()
	{
		$identifier = $this->session->get('identifier');
		$users = $this->get_group_users($this->session->get('identifier'));
		$accoms = $this->get_group_accom($users['user_IDs'], NULL, NULL);

		$this->view->content = View::factory('faculty/accom/list/group_all')
			->bind('identifier', $identifier)
			->bind('accom_reports', $accoms['accom_reports'])
			->bind('accom_pub', $accoms['pub'])
			->bind('accom_awd', $accoms['awd'])
			->bind('accom_rch', $accoms['rch'])
			->bind('accom_ppr', $accoms['ppr'])
			->bind('accom_ctv', $accoms['ctv'])
			->bind('accom_par', $accoms['par'])
			->bind('accom_mat', $accoms['mat'])
			->bind('accom_oth', $accoms['oth'])
			->bind('users', $users['users']);
		$this->response->body($this->view->render());
	}

	/**
	 * View Accomplishment Report
	 */
	public function action_view()
	{
		$accom = new Model_Accom;
		$user = new Model_User;

		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID);
		$user_details = $user->get_details($accom_details['user_ID'], NULL);
		$user_flag = ($accom_details['user_ID'] == $this->session->get('user_ID') ? TRUE : FALSE);
		
		$evaluate = $this->session->get_once('evaluate');
		$identifier = $this->session->get('identifier');
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$evaluate_url = ($identifier == 'dean' ? 'faculty/accom_coll/evaluate/'.$accom_ID : 'faculty/accom_dept/evaluate/'.$accom_ID);

		$this->view->content = View::factory('faculty/accom/view/group')
			->bind('identifier', $identifier)
			->bind('evaluate', $evaluate)
			->bind('evaluate_url', $evaluate_url)
			->bind('accom_details', $accom_details)
			->bind('user', $fullname)
			->bind('user_flag', $user_flag);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate Accomplishment Report
	 */
	public function action_evaluate()
	{
		$accom = new Model_Accom;

		$assessor = $this->session->get('fullname').' '.date_format(date_create(), '(d M Y)');
		$accom_ID = $this->request->param('id');
		$details = $this->request->post();
		$details['remarks'] = ($details['remarks']
			? $details['remarks'].' - '.$assessor
			: 'Checked by '.$assessor);
		
		$evaluate_success = $accom->evaluate($accom_ID, $details);
		$this->session->set('evaluate', $evaluate_success);

		$referrer = $this->request->referrer();
		$coll = strpos($referrer, 'accom_coll');

		if ($coll) 
			$this->redirect('faculty/accom_coll/view/'.$accom_ID, 303);
		else
			$this->redirect('faculty/accom_dept/view/'.$accom_ID, 303);
	}

	/**
	 * Consolidate Accomplishment Reports
	 */
	public function action_consolidate()
	{
		$univ = new Model_Univ;

		$start = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01 '.$this->request->post('end')));

		if ($this->session->get('identifier') == 'chair')
		{
			$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$this->session->set('unit', $department['short']);
		}
		elseif ($this->session->get('identifier') == 'dean')
		{
			$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
			$this->session->set('level', 'college');
			$this->session->set('unit', $college['short']);
		}

		$user_details = $this->get_group_users($this->session->get('identifier'));
		$accoms = $this->get_group_accom($user_details['user_IDs'], $start, $end);
		
		$consolidate_data['accoms'] = $accoms;
		$consolidate_data['start'] = $start;
		$consolidate_data['end'] = $end;
		$this->session->set('accom_type', 'group');
		$this->session->set('users', $user_details['users']);
		$this->session->set('consolidate_data', $consolidate_data);
		$this->redirect('faculty/mpdf/consolidate/accom-group');
	}

	/**
	 * Accomplishment Reports (Department/College)
	 */
	private function view_group($group, $users, $consolidate_url)
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$employee_code = $this->session->get('employee_code');
		$identifier = $this->session->get('identifier');
		$programs = $univ->get_programs();

		$accom_reports = $accom->get_group_accom($users['user_IDs'], NULL, NULL, FALSE);
		
		$this->view->content = View::factory('faculty/accom/list/group')
			->bind('identifier', $identifier)
			->bind('group', $group)
			->bind('accom_reports', $accom_reports)
			->bind('consolidate_url', $consolidate_url)
			->bind('users', $users['users'])
			->bind('programs', $programs)
			->bind('employee_code', $employee_code);
		$this->response->body($this->view->render());
	}

	/**
	 * Get Department/College Users
	 */
	private function get_group_users($identifier)
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		if ($identifier == 'dean')
		{
			$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
			$programIDs = $univ->get_college_programIDs($college['college_ID']);
			$users = $user->get_user_group($programIDs, NULL);
		}
		elseif ($identifier == 'chair')
		{
			$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$programIDs = $univ->get_department_programIDs($department['department_ID']);
			$users = $user->get_user_group($programIDs, 'dean');
		}

		$user_IDs = array();
		foreach ($users as $user)
		{
			$user_IDs[] = $user['user_ID'];
		}

		$user_details['users'] = $users;
		$user_details['user_IDs'] = $user_IDs;

		return $user_details;
	}

	/**
	 * Get Department/College Accomplishments
	 */
	private function get_group_accom($users, $start, $end)
	{
		$accom = new Model_Accom;
		$accom_reports = $accom->get_group_accom($users, $start, $end, TRUE);

		if ($start AND $end)
			$accom_IDs = $accom_reports;
		else
		{
			if ($accom_reports)
			{
				$accom_IDs = array();
				foreach ($accom_reports as $report)
				{
					$accom_IDs[] = $report['accom_ID'];
				}
			}
		}

		if ($accom_IDs)
		{
			$pub = $accom->get_accoms($accom_IDs, 'pub'); $accom_pub = $this->rearray_accoms($pub, 'publication_ID');
			$awd = $accom->get_accoms($accom_IDs, 'awd'); $accom_awd = $this->rearray_accoms($awd, 'award_ID');
			$rch = $accom->get_accoms($accom_IDs, 'rch'); $accom_rch = $this->rearray_accoms($rch, 'research_ID');
			$ppr = $accom->get_accoms($accom_IDs, 'ppr'); $accom_ppr = $this->rearray_accoms($ppr, 'paper_ID');
			$ctv = $accom->get_accoms($accom_IDs, 'ctv'); $accom_ctv = $this->rearray_accoms($ctv, 'creative_ID');
			$par = $accom->get_accoms($accom_IDs, 'par'); $accom_par = $this->rearray_accoms($par, 'participation_ID');
			$mat = $accom->get_accoms($accom_IDs, 'mat'); $accom_mat = $this->rearray_accoms($mat, 'material_ID'); 
			$oth = $accom->get_accoms($accom_IDs, 'oth'); $accom_oth = $this->rearray_accoms($oth, 'other_ID');
		}

		$accoms['accom_reports'] = $accom_reports;
		$accoms['pub'] = $accom_pub;
		$accoms['awd'] = $accom_awd;
		$accoms['rch'] = $accom_rch;
		$accoms['ppr'] = $accom_ppr;
		$accoms['ctv'] = $accom_ctv;
		$accoms['par'] = $accom_par;
		$accoms['mat'] = $accom_mat;
		$accoms['oth'] = $accom_oth;

		return $accoms;
	}

	/**
	 * Merge duplicates
	 */
	private function rearray_accoms($accoms, $name_ID)
	{
		$rearray_accoms = array();

		foreach ($accoms as $accom)
		{			
			$flag=0;
			// if new array contains at least one accom, check for duplicate
			if ($rearray_accoms)
			{
				foreach ($rearray_accoms as &$new_accom)
				{
					// duplicate
					if ($accom[$name_ID] == $new_accom[$name_ID])
					{
						$flag = 1;

						$user_IDs = $new_accom['user_ID'];	// get current users

						if (is_array($user_IDs))
						{
							array_push($user_IDs, $accom['user_ID']);	// add new user to array
							$new_accom['user_ID'] = $user_IDs;			// update user_ID
						}
						else
						{
							$users = array();						// init array
							array_push($users, $user_IDs);			// add current to array
							array_push($users, $accom['user_ID']);	// add new user to array
							$new_accom['user_ID'] = $users;			// update user_ID
						}

						break;
					}
				}

				if (!$flag)
					$rearray_accoms[] = $accom;
			}

			// new array is empty
			else
			{
				$rearray_accoms[] = $accom;
			}
		}
		
		return $rearray_accoms;
	}

} // End AccomGroup
