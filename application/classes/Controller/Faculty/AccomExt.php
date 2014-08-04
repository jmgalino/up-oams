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

		$consolidate_url = "faculty/accom_dept/consolidate";

		$user_ID = $this->session->get('user_ID');
		$employee_code = $this->session->get('employee_code');
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
		// $programs = $univ->get_department_programs($department[0]['department_ID']);
		// $users = $user->get_users($programIDs); print_r($users); echo "users";
		$accom_reports = $accom->get_department_accom($user_ID);

		$this->view->content = View::factory('faculty/accom/list/department')
			->bind('employee_code', $employee_code)
			->bind('department', $department['department'])
			// ->bind('programs', $programs)
			// ->bind('users', NULL)
			// ->bind('accom_reports', NULL)
			->bind('consolidate_url', $consolidate_url);
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

		$consolidate_url = "faculty/accom_coll/consolidate";

		$user_ID = $this->session->get('user_ID');
		$employee_code = $this->session->get('employee_code');
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
		// $programs = $univ->get_college_programs($college[0]['college_ID']);
		// $users = $user->get_users($programIDs); print_r($users); echo "users";
		// $accom_reports = $accom->get_department_accom($user_ID, $filter);

		$this->view->content = View::factory('faculty/accom/list/college')
			->bind('employee_code', $employee_code)
			->bind('college', $college['college'])
			// ->bind('programs', $programs)
			// ->bind('users', NULL)
			// ->bind('accom_reports', NULL)
			->bind('consolidate_url', $consolidate_url);
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
