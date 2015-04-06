<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_IpcrGroup extends Controller_Faculty {

	/**
	 * Department's IPCR Form
	 */
	public function action_dept()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_department_programIDs($department_details['department_ID']);
		$users = $user->get_user_group($programIDs, 'dean');
		$consolidate_url = 'faculty/ipcr_dept/consolidate';

		$this->view_group($department_details['department'], $users, $consolidate_url);
	}

	/**
	 * College's IPCR Form
	 */
	public function action_coll()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_college_programIDs($college_details['college_ID']);
		$users = $user->get_user_group($programIDs, NULL);
		$consolidate_url = NULL;//'faculty/ipcr_coll/consolidate';

		$this->view_group($college_details['college'], $users, $consolidate_url);
	}

	/**
	 * View IPCR Form
	 */
	public function action_view()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$identifier = $this->session->get('identifier');

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$user_details = $user->get_details($ipcr_details['user_ID'], NULL);

		$user_flag = ($ipcr_details['user_ID'] == $this->session->get('user_ID') ? TRUE : FALSE);
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$evaluate_url = ($identifier == 'chair' ? 'faculty/ipcr_dept/evaluate/'.$ipcr_ID : 'faculty/ipcr_coll/evaluate/'.$ipcr_ID);

		$flag = 0;
		$targets = $ipcr->get_targets($ipcr_details['ipcr_ID']);
		foreach ($targets as $target)
		{
			if (!$target['r_quantity'] OR !$target['r_efficiency'] OR !$target['r_timeliness'])
				$flag++;
		}

		$this->view->content = View::factory('faculty/ipcr/view/group')
			->bind('identifier', $identifier)
			->bind('success', $success)
			->bind('evaluate_url', $evaluate_url)
			->bind('ipcr_details', $ipcr_details)
			->bind('user_flag', $user_flag)
			->bind('flag', $flag)
			->bind('faculty', $fullname)
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * Mark IPCR Form as Checked
	 */
	public function action_mark_checked()
	{
		$ipcr = new Model_Ipcr;

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$ipcr_details['status'] = 'Checked';
		$ipcr_details['remarks'] = 'Checked by '.$this->session->get('fullname').' '.date('(d M Y)');
		$ipcr_details['version']++;
		$check_success = $ipcr->update($ipcr_ID, $ipcr_details);
		
		if ($check_success)
			$this->session->set('success', 'marked as \'Checked\'');
		else
			$this->session->set('success', FALSE);

		if ($this->session->get('identifier') == 'chair') 
			$this->redirect('faculty/ipcr_dept/view/'.$ipcr_ID, 303);
		else
			$this->redirect('faculty/ipcr_coll/view/'.$ipcr_ID, 303);
	}

	/**
	 * Mark IPCR Form as Accepted
	 */
	public function action_mark_accepted()
	{
		$ipcr = new Model_Ipcr;

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$ipcr_details['status'] = 'Accepted';
		$ipcr_details['remarks'] = 'Accepted by '.$this->session->get('fullname').' '.date('(d M Y)');
		$ipcr_details['version']++;
		$check_success = $ipcr->update($ipcr_ID, $ipcr_details);
		
		if ($check_success)
			$this->session->set('success', 'marked as \'Accepted\'');
		else
			$this->session->set('success', FALSE);

		if ($this->session->get('identifier') == 'chair') 
			$this->redirect('faculty/ipcr_dept/view/'.$ipcr_ID, 303);
		else
			$this->redirect('faculty/ipcr_coll/view/'.$ipcr_ID, 303);
	}

	/**
	 * Evaluate IPCR Form
	 */
	// public function action_evaluate()
	// {
	// 	$ipcr = new Model_Ipcr;

	// 	$assessor = $this->session->get('fullname').' '.date('(d M Y)');
	// 	$ipcr_ID = $this->request->param('id');
	// 	$details = $this->request->post();
	// 	$details['remarks'] = ($details['remarks']
	// 		? $details['remarks'].' - '.$assessor
	// 		: 'Checked by '.$assessor);
		
	// 	$evaluate_success = $ipcr->evaluate($ipcr_ID, $details);
	// 	$this->session->set('evaluate', $evaluate_success);

	// 	if ($this->session->get('identifier') == 'chair') 
	// 		$this->redirect('faculty/ipcr_dept/view/'.$ipcr_ID, 303);
	// 	else
	// 		$this->redirect('faculty/ipcr_coll/view/'.$ipcr_ID, 303);
	// }

	/**
	 * Consolidate IPCR Forms
	 * college level
	 */
	public function action_consolidate()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		$user = new Model_User;
		
		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		$identifier = $this->session->get('identifier');
		
		$opcr_ID = ($this->request->post('opcr_ID') ? $this->request->post('opcr_ID') : $this->request->param('id'));
		$opcr_details = $opcr->get_details($opcr_ID);
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$label = $period_from.' - '.$period_to;

		$flag = 0;
		$outputs = $opcr->get_outputs($opcr_ID);
		foreach ($outputs as $output)
		{
			if (!$output['r_quantity'] OR !$output['r_efficiency'] OR !$output['r_timeliness'])
				$flag++;
		}

		if ($identifier == 'chair')
		{
			$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$programIDs = $univ->get_department_programIDs($department['department_ID']);
			$users = $user->get_user_group($programIDs, 'dean');
		}
		// elseif ($identifier == 'dean')
		// {
		// 	$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		// 	$programIDs = $univ->get_college_programIDs($college['college_ID']);
		// 	$users = $user->get_user_group($programIDs, NULL);
		// }

		$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);
		$targets = $ipcr->get_output_targets(NULL, $outputs);
		$categories = $this->oams->get_categories();
		
		$this->view->content = View::factory('faculty/opcr/form/final/template')
			->bind('label', $label)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('flag', $flag)
			->bind('opcr_ID', $opcr_ID)
			->bind('categories', $categories)
			->bind('outputs', $outputs)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('targets', $targets)
			->bind('users', $users);
			// ->bind('identifier', $identifier);
		$this->response->body($this->view->render());
	}

	/**
	 * IPCR Forms (Department/College)
	 */
	private function view_group($group, $users, $consolidate_url)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$employee_code = $this->session->get('employee_code');
		$identifier = $this->session->get('identifier');

		$userIDs = array();
		foreach ($users as $user)
		{
			$userIDs[] = $user['user_ID'];
		}

		$programs = $univ->get_programs();
		$ipcr_forms = $ipcr->get_group_ipcr($userIDs);
		$opcr_forms = $opcr->get_group_opcr($userIDs, NULL, NULL, FALSE);
		
		$this->view->content = View::factory('faculty/ipcr/list/group')
			->bind('identifier', $identifier)
			->bind('group', $group)
			->bind('opcr_forms', $opcr_forms)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('consolidate_url', $consolidate_url)
			->bind('users', $users)
			->bind('programs', $programs);
		$this->response->body($this->view->render());
	}

} // End IpcrGroup
