<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_IpcrGroup extends Controller_Faculty {

	/**
	 * Department's IPCR Form
	 */
	public function action_dept()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_department_programIDs($department['department_ID']);
		$users = $user->get_user_group($programIDs, 'dean');
		$consolidate_url = 'faculty/ipcr_dept/consolidate';

		$this->view_group($department['department'], $programIDs, $users, $consolidate_url);
	}

	/**
	 * College's IPCR Form
	 */
	public function action_coll()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_college_programIDs($college['college_ID']);
		$users = $user->get_user_group($programIDs, NULL);
		$consolidate_url = 'faculty/ipcr_coll/consolidate';

		$this->view_group($college['college'], $programIDs, $users, $consolidate_url);
	}

	/**
	 * View IPCR Form
	 */
	public function action_view()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$user = new Model_User;

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$user_details = $user->get_details($ipcr_details['user_ID'], NULL);

		$evaluation = $this->session->get_once('evaluation');
		$identifier = $this->session->get('identifier');
		$period_from = date_format(date_create($opcr_details['period_from']), 'F Y');
		$period_to = date_format(date_create($opcr_details['period_to']), 'F Y');
		$period = $period_from.' - '.$period_to;
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$evaluate_url = ($identifier == 'dean' ? 'faculty/ipcr_coll/evaluate/'.$ipcr_ID : 'faculty/ipcr_dept/evaluate/'.$ipcr_ID);

		$this->view->content = View::factory('faculty/ipcr/view/group')
			->bind('identifier', $identifier)
			->bind('user', $fullname)
			->bind('period', $period)
			->bind('evaluation', $evaluation)
			->bind('evaluate_url', $evaluate_url)
			->bind('ipcr_details', $ipcr_details);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate IPCR Form
	 */
	public function action_evaluate()
	{
		$ipcr = new Model_Ipcr;

		$assessor = $this->session->get('fullname').' '.date_format(date_create(), '(d M Y)');
		$ipcr_ID = $this->request->param('id');
		$details = $this->request->post();
		$details['remarks'] = ($details['remarks']
			? $details['remarks'].' - '.$assessor
			: 'Checked by '.$assessor);
		
		$evaluate_success = $ipcr->evaluate($ipcr_ID, $details);
		$this->session->set('evaluate', $evaluate_success);

		$referrer = $this->request->referrer();
		$coll = strpos($referrer, 'ipcr_coll');

		if ($coll) 
			$this->redirect('faculty/ipcr_coll/view/'.$ipcr_ID, 303);
		else
			$this->redirect('faculty/ipcr_dept/view/'.$ipcr_ID, 303);
	}

	/**
	 * Shows consolidated IPCR Forms (OPCR Form) for evaluation
	 */
	public function action_consolidate()
	{
		echo 'Shows consolidated IPCR Forms (OPCR Form) for evaluation';
		// $ipcr = new Model_Ipcr;
		// $opcr = new Model_Opcr;
		// $univ = new Model_Univ;
		// $user = new Model_User;

		// $opcr_ID = ($this->request->post('opcr_ID') ? $this->request->post('opcr_ID') : $this->request->param('id'));
		// $opcr_details = $opcr->get_details($opcr_ID);
		// $period_from = DateTime::createFromFormat('Y-m-d', $opcr_details['period_from']);
		// $period_to = DateTime::createFromFormat('Y-m-d', $opcr_details['period_to']);
			
		// if ($this->session->get('identifier') == 'dean')
		// {
		// 	$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		// 	$label = $college['short'];
		// 	$programIDs = $univ->get_college_programIDs($college['college_ID']);
		// 	$users = $user->get_user_group($programIDs, NULL);
		// }
		// else
		// {
		// 	$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		// 	$label = $department['short'];
		// 	$programIDs = $univ->get_department_programIDs($department['department_ID']);
		// 	$users = $user->get_user_group($programIDs, 'dean');
		// }
		
		// $outputs = $opcr->get_outputs($opcr_ID);
		// $targets = $ipcr->get_output_targets($outputs);
		// $ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);
		// $categories = $this->oams->get_categories();
				
		// $this->view->content = View::factory('faculty/opcr/form/final/basic2')
		// 	->bind('session', $this->session)
		// 	->bind('department', $department)
		// 	->bind('period_to', $period_to)
		// 	->bind('period_from', $period_from)
		// 	->bind('label', $label)
		// 	->bind('opcr_details', $opcr_details)
		// 	->bind('categories', $categories)
		// 	->bind('outputs', $outputs)
		// 	->bind('ipcr_forms', $ipcr_forms)
		// 	->bind('targets', $targets)
		// 	->bind('users', $users);
		// $this->response->body($this->view->render());

		// $opcr = new Model_Opcr;

		// $opcr_ID = $this->request->param('id');
		// $opcr_details = $opcr->get_details($opcr_ID);
		// $this->action_check($opcr_details['user_ID']); // Redirects if not the owner
		// $this->redirect('faculty/mpdf/submit/ipcr-consolidated/'.$opcr_ID);
	}

	/**
	 * IPCR Forms (Department/College)
	 */
	private function view_group($group, $programIDs, $users, $consolidate_url)
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
