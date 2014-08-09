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
		$consolidate_url = 'faculty/accom_dept/consolidate';

		$this->action_view_group($department['department'], $programIDs, $users, $consolidate_url);
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
		$consolidate_url = 'faculty/accom_coll/consolidate';

		$this->action_view_group($college['college'], $programIDs, $users, $consolidate_url);
	}

	/**
	 * View Accomplishment Report
	 */
	public function action_view()
	{
		$accom = new Model_Accom;
		$user = new Model_User;

		$evaluate = $this->session->get_once('evaluate');
		$accom_ID = $this->request->param('id');
		$accom = $accom->get_details($accom_ID)[0];
		$user = $user->get_details($accom['user_ID'], NULL)[0];
		$identifier = $this->session->get('identifier');
		$evaluate_url = ($identifier == 'dean' ? 'faculty/accom_coll/evaluate/' : 'faculty/accom_dept/evaluate/');

		$this->view->content = View::factory('faculty/accom/view/group')
			->bind('identifier', $identifier)
			->bind('user', $user['first_name'])
			->bind('accom', $accom)
			->bind('evaluate', $evaluate)
			->bind('evaluate_url', $evaluate_url);
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
		print_r($details);
		$evaluate_success = $accom->evaluate($accom_ID, $details);
		$this->session->set('evaluate', $evaluate_success);

		$referrer = $this->request->referrer();
		$coll = strstr($referrer, 'accom_coll');

		if ($coll) 
			$this->redirect('faculty/accom_coll/view/'.$accom_ID);
		else
			$this->redirect('faculty/accom_dept/view/'.$accom_ID);
	}

	/**
	 * Consolidate Accomplishment Reports
	 */
	private function action_consolidate()
	{
		// Open PDF in new tab
	}

	/**
	 * Accomplishment Reports (Department/College)
	 */
	private function action_view_group($group, $programIDs, $users, $consolidate_url)
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
			->bind('consolidate_url', $consolidate_url)
			->bind('accom_reports', $accom_reports)
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('employee_code', $employee_code);
		$this->response->body($this->view->render());
	}

} // End AccomGroup
