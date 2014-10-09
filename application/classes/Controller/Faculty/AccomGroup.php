<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_AccomGroup extends Controller_Faculty {

	/**
	 * Department's Accomplishment Report
	 */
	public function action_dept()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$this->action_delete_session();
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_department_programIDs($department['department_ID']);
		$users = $user->get_user_group($programIDs, 'dean');
		// $consolidate_url = 'faculty/accom_dept/consolidate';

		// $this->view_group($department['department'], $programIDs, $users, $consolidate_url);
		$this->view_group($department['department'], $programIDs, $users);
	}

	/**
	 * College's Accomplishment Report
	 */
	public function action_coll()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$this->action_delete_session();
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_college_programIDs($college['college_ID']);
		$users = $user->get_user_group($programIDs, NULL);
		// $consolidate_url = 'faculty/accom_coll/consolidate';

		// $this->view_group($college['college'], $programIDs, $users, $consolidate_url);
		$this->view_group($college['college'], $programIDs, $users);
	}

	/**
	 * Office's Accomplishments
	 */
	public function action_all()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$identifier = $this->session->get('identifier');

		if ($identifier == 'dean')
		{
			$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
			$programIDs = $univ->get_college_programIDs($college['college_ID']);
			$users = $user->get_user_group($programIDs, NULL);
		}
		elseif ($identifier == 'dept_chair')
		{
			$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$programIDs = $univ->get_department_programIDs($department['department_ID']);
			$users = $user->get_user_group($programIDs, 'dean');
		}

		$userIDs = array();
		foreach ($users as $user)
		{
			$userIDs[] = $user['user_ID'];
		}

		$accom_reports = $accom->get_group_accom($userIDs);

		if ($accom_reports)
		{
			$accom_IDs = array();
			foreach ($accom_reports as $report)
			{
				$accom_IDs[] = $report['accom_ID'];
			}

			if ($accom_IDs)
			{
				$pub = $accom->get_accoms($accom_IDs, 'pub'); $accom_pub = $this->rearray_accoms($pub, 'publication_ID');
				$awd = $accom->get_accoms($accom_IDs, 'awd'); $accom_awd = $this->rearray_accoms($awd, 'award_ID');
				$rch = $accom->get_accoms($accom_IDs, 'rch'); $accom_rch = $this->rearray_accoms($rch, 'research_ID');
				$ppr = $accom->get_accoms($accom_IDs, 'ppr'); $accom_ppr = $this->rearray_accoms($ppr, 'paper_ID');
				$ctv = $accom->get_accoms($accom_IDs, 'ctv'); $accom_ctv = $this->rearray_accoms($ctv, 'creative_ID');
				$par = $accom->get_accoms($accom_IDs, 'par'); $accom_par = $this->rearray_accoms($par, 'participation_ID');
				$oth = $accom->get_accoms($accom_IDs, 'oth'); $accom_oth = $this->rearray_accoms($oth, 'other_ID');
				$mat = $accom->get_accoms($accom_IDs, 'mat'); $accom_mat = $this->rearray_accoms($mat, 'material_ID');
			}
		}

		$this->view->content = View::factory('faculty/accom/list/group_all')
			->bind('identifier', $identifier)
			->bind('accom_reports', $accom_reports)
			->bind('accom_pub', $accom_pub)
			->bind('accom_awd', $accom_awd)
			->bind('accom_rch', $accom_rch)
			->bind('accom_ppr', $accom_ppr)
			->bind('accom_ctv', $accom_ctv)
			->bind('accom_par', $accom_par)
			->bind('accom_mat', $accom_mat)
			->bind('accom_oth', $accom_oth)
			->bind('users', $users);
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
		
		$evaluate = $this->session->get_once('evaluate');
		$identifier = $this->session->get('identifier');
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'].'. '.$user_details['last_name'];
		$evaluate_url = ($identifier == 'dean' ? 'faculty/accom_coll/evaluate/'.$accom_ID : 'faculty/accom_dept/evaluate/'.$accom_ID);

		$this->view->content = View::factory('faculty/accom/view/group')
			->bind('identifier', $identifier)
			->bind('evaluate', $evaluate)
			->bind('evaluate_url', $evaluate_url)
			->bind('accom_details', $accom_details)
			->bind('user', $fullname);
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
		// Open PDF in new tab
		// elseif ($identifier == 'department')
		// {
		// 	$program_ID = $this->site->session->get('program_ID');
		// 	$department = $this->univ->get_department($program_ID);
		// 	$filename = $department[0]->short.' ('.$smy->format('F Y').'-'.$emy->format('F Y').').pdf';
		// 	$this->mpdf->consolidate($filename, $period, $identifier, 'ar');
		// }
		// elseif ($identifier == 'college')
		// {
		// 	$program_ID = $this->site->session->get('program_ID');
		// 	$college = $this->univ->get_college($program_ID);
		// 	$filename = $college[0]->short.' ('.$smy->format('F Y').'-'.$emy->format('F Y').').pdf';
		// 	$this->mpdf->consolidate($filename, $period, $identifier, 'ar');
		// }
	}

	/**
	 * Accomplishment Reports (Department/College)
	 */
	// private function view_group($group, $programIDs, $users, $consolidate_url)
	private function view_group($group, $programIDs, $users)
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$employee_code = $this->session->get('employee_code');
		$identifier = $this->session->get('identifier');
		$programs = $univ->get_programs();

		$userIDs = array();
		foreach ($users as $user)
		{
			$userIDs[] = $user['user_ID'];
		}

		$accom_reports = $accom->get_group_accom($userIDs);
		
		$this->view->content = View::factory('faculty/accom/list/group')
			->bind('identifier', $identifier)
			->bind('group', $group)
			->bind('accom_reports', $accom_reports)
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('employee_code', $employee_code);
		$this->response->body($this->view->render());
	}

	/**
	 * Delete duplicates
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
