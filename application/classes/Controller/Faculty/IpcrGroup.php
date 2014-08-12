<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_IpcrGroup extends Controller_Faculty {

	/**
	 * Department's IPCR Form
	 */
	public function action_dept()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
		$programIDs = $univ->get_department_programIDs($department['department_ID']);
		$users = $user->get_user_group($programIDs, 'dean');
		$consolidate_url = 'faculty/ipcr_dept/consolidate';

		$this->action_view_group($department['department'], $programIDs, $users, $consolidate_url);
	}

	/**
	 * College's IPCR Form
	 */
	// public function action_coll()
	// {
	// 	$univ = new Model_Univ;
	// 	$user = new Model_User;

	// 	$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
	// 	$programIDs = $univ->get_college_programIDs($college['college_ID']);
	// 	$users = $user->get_user_group($programIDs, NULL);
	// 	$consolidate_url = 'faculty/ipcr_coll/consolidate';

	// 	$this->action_view_group($college['college'], $programIDs, $users, $consolidate_url);
	// }

	/**
	 * View IPCR Form
	 */
	public function action_view()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$user = new Model_User;

		$ipcr_ID = $this->request->param('id');
		$ipcr = $ipcr->get_details($ipcr_ID)[0];
		$opcr = $opcr->get_details($ipcr['opcr_ID'])[0];
		$user = $user->get_details($ipcr['user_ID'], NULL)[0];

		$evaluation = $this->session->get_once('evaluation');
		$identifier = $this->session->get('identifier');
		$period_from = date_format(date_create($opcr['period_from']), 'F Y');
		$period_to = date_format(date_create($opcr['period_to']), 'F Y');
		$period = $period_from.' - '.$period_to;
		$evaluate_url = ($identifier == 'dean' ? 'faculty/ipcr_coll/evaluate/' : 'faculty/ipcr_dept/evaluate/');


		$this->view->content = View::factory('faculty/ipcr/view/group')
			->bind('identifier', $identifier)
			->bind('user', $user['first_name'])
			->bind('period', $period)
			->bind('evaluation', $evaluation)
			->bind('evaluate_url', $evaluate_url)
			->bind('ipcr', $ipcr);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate IPCR Form
	 */
	// public function action_evaluate()
	// {
	// 	$ipcr = new Model_Ipcr;

	// 	$assessor = $this->session->get('fullname').' '.date_format(date_create(), '(d M Y)');
	// 	$ipcr_ID = $this->request->param('id');
	// 	$details = $this->request->post();
	// 	$details['remarks'] = ($details['remarks']
	// 		? $details['remarks'].' - '.$assessor
	// 		: 'Checked by '.$assessor);
	// 	print_r($details);
	// 	$evaluate_success = $ipcr->evaluate($ipcr_ID, $details);
	// 	$this->session->set('evaluate', $evaluate_success);

	// 	$referrer = $this->request->referrer();
	// 	$coll = strstr($referrer, 'ipcr_coll');

	// 	if ($coll) 
	// 		$this->redirect('faculty/ipcr_coll/view/'.$ipcr_ID);
	// 	else
	// 		$this->redirect('faculty/ipcr_dept/view/'.$ipcr_ID);
	// }

	/**
	 * Consolidate IPCR Forms
	 */
	public function action_consolidate()
	{
		// Open PDF in new tab
		print_r($this->request->post());
	}

	/**
	 * IPCR Forms (Department/College)
	 */
	private function action_view_group($group, $programIDs, $users, $consolidate_url)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
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

		$ipcr_forms = $ipcr->get_group_ipcr($userIDs);
		$opcr_forms = $opcr->get_department_opcr($this->session->get('user_ID'));
		
		$this->view->content = View::factory('faculty/ipcr/list/group')
			->bind('identifier', $identifier)
			->bind('group', $group)
			->bind('consolidate_url', $consolidate_url)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('opcr_forms', $opcr_forms)
			->bind('users', $users)
			->bind('programs', $programs)
			->bind('employee_code', $employee_code);
		$this->response->body($this->view->render());
	}

} // End IpcrGroup
