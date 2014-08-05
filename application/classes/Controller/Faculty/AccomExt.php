<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_AccomExt extends Controller_Faculty {

	/**
	 * Department's Accomplishment Report
	 */
	public function action_dept()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		// $evaluate = $this->session->get_once('evaluate');
		$user_ID = $this->session->get('user_ID');
		$employee_code = $this->session->get('employee_code');
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
		$programIDs = $univ->get_department_programIDs($department['department_ID']);
		$users = $user->get_user_group($programIDs, 'dean');
		$programs = $univ->get_programs();

		$userIDs = array();
		foreach ($users as $user)
		{
			$userIDs[] = $user['user_ID'];
		}

		$accom_reports = $accom->get_accom_group($userIDs);
		$consolidate_url = "faculty/accom_dept/consolidate";

		$this->view->content = View::factory('faculty/accom/list/group')
			->bind('group', $department['department'])
			->bind('consolidate_url', $consolidate_url)
			->bind('accom_reports', $accom_reports)
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('employee_code', $employee_code);
			// ->bind('evaluate', $evaluate);
		$this->response->body($this->view->render());
	}

	/**
	 * College's Accomplishment Report
	 */
	public function action_coll()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		// $evaluate = $this->session->get_once('evaluate');
		$user_ID = $this->session->get('user_ID');
		$employee_code = $this->session->get('employee_code');
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
		$programIDs = $univ->get_college_programIDs($college['college_ID']);
		$users = $user->get_user_group($programIDs, NULL);
		$programs = $univ->get_programs();

		$userIDs = array();
		foreach ($users as $user)
		{
			$userIDs[] = $user['user_ID'];
		}

		$accom_reports = $accom->get_accom_group($userIDs);
		$consolidate_url = "faculty/accom_coll/consolidate";

		$this->view->content = View::factory('faculty/accom/list/group')
			->bind('group', $college['college'])
			->bind('consolidate_url', $consolidate_url)
			->bind('accom_reports', $accom_reports)
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('employee_code', $employee_code);
			// ->bind('evaluate', $evaluate);
		$this->response->body($this->view->render());
	}

	/**
	 * View Accomplishment Report
	 */
	public function action_view()
	{}

	/**
	 * Evaluate Accomplishment Report
	 */
	public function action_evaluate()
	{}

	/**
	 * Consolidate Accomplishment Reports
	 */
	private function action_consolidate()
	{
		// Open PDF in new tab
	}

} // End AccomExt
