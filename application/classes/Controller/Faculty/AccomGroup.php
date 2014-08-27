<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_AccomGroup extends Controller_Faculty {

	/**
	 * Department's Accomplishment Report
	 */
	public function action_dept()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
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

		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
		$programIDs = $univ->get_college_programIDs($college['college_ID']);
		$users = $user->get_user_group($programIDs, NULL);
		// $consolidate_url = 'faculty/accom_coll/consolidate';

		// $this->view_group($college['college'], $programIDs, $users, $consolidate_url);
		$this->view_group($college['college'], $programIDs, $users);
	}

	/**
	 * View Accomplishment Report
	 */
	public function action_view()
	{
		$accom = new Model_Accom;
		$user = new Model_User;

		$accom_ID = $this->request->param('id');
		$accom_details = $accom->get_details($accom_ID)[0];
		$user_details = $user->get_details($accom_details['user_ID'], NULL)[0];
		
		$evaluate = $this->session->get_once('evaluate');
		$identifier = $this->session->get('identifier');
		$fullname = $user_details['first_name'].' '.$user_details['middle_initial'].'. '.$user_details['last_name'];
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

} // End AccomGroup
