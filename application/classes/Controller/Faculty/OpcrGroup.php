<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_OpcrGroup extends Controller_Faculty {

	/**
	 * Department's OPCR Form
	 */
	public function action_dept()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$opcr_details = $opcr->get_department_opcr($this->session->get('program_ID'), 1);
		$ipcr_details = $ipcr->get_faculty_ipcr($this->session->get('user_ID'), $opcr_details['opcr_ID']);

		$identifier = $this->session->get('identifier');
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;
	
		$this->view->content = View::factory('faculty/opcr/view/group')
			->bind('identifier', $identifier)
			->bind('opcr_details', $opcr_details)
			->bind('ipcr_details', $ipcr_details)
			->bind('period', $period);

		$this->response->body($this->view->render());
	}

	/**
	 * College's OPCR Form
	 */
	public function action_coll()
	{
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$error = $this->session->get_once('error');

		$departments = $univ->get_departments();
		$users = $this->get_college_users();
		$opcr_forms = $opcr->get_group_opcr($users['user_IDs'], NULL, NULL, TRUE);
		
		$periods = array();
		foreach ($opcr_forms as $opcr_details)
		{
			$period_from = date('F Y', strtotime($opcr_details['period_from']));
			$period_to = date('F Y', strtotime($opcr_details['period_to']));
			$period = $period_from.' - '.$period_to;

			if (!in_array($period, $periods))
				$periods[] = $period;
		}

		$this->view->content = View::factory('faculty/opcr/list/group')
			->bind('unit', $college_details['college'])
			->bind('opcr_forms', $opcr_forms)
			->bind('error', $error)
			->bind('periods', $periods)
			->bind('users', $users['users'])
			->bind('departments', $departments);
		$this->response->body($this->view->render());
	}

	/**
	 * View OPCR Form
	 */
	public function action_view()
	{
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$identifier = $this->session->get('identifier');
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$user_details = $user->get_details($opcr_details['user_ID'], NULL);
		$college_details = $univ->get_college_details(NULL, $user_details['program_ID']);
		
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;
		$fullname = $user_details['first_name'].' '.$user_details['middle_name'][0].'. '.$user_details['last_name'];
		$evaluate_url = 'faculty/opcr_coll/evaluate/'.$opcr_ID;

		$this->view->content = View::factory('faculty/opcr/view/group')
			->bind('identifier', $identifier)
			->bind('success', $success)
			->bind('evaluate_url', $evaluate_url)
			->bind('opcr_details', $opcr_details)
			->bind('faculty', $fullname)
			->bind('unit', $college_details['short'])
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * Evaluate OPCR Form
	 */
	public function action_evaluate()
	{
		$opcr = new Model_Opcr;

		$assessor = $this->session->get('fullname').' '.date('(d M Y)');
		
		$opcr_ID = $this->request->param('id');
		$details = $this->request->post();
		
		$details['remarks'] = ($details['remarks']
			? $details['remarks'].' - '.$assessor
			: $details['status'].' by '.$assessor);
		
		$evaluate_success = $opcr->evaluate($opcr_ID, $details);
		$this->session->set('evaluate', $evaluate_success);

		$this->redirect('faculty/opcr_coll/view/'.$opcr_ID, 303);
	}

	/**
	 * Mark OPCR Form as Checked
	 */
	public function action_mark_checked()
	{
		$opcr = new Model_Opcr;

		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$opcr_details['status'] = 'Checked';
		$opcr_details['remarks'] = 'Checked by '.$this->session->get('fullname').' '.date('(d M Y)');
		$check_success = $opcr->update($opcr_ID, $opcr_details);
		
		if ($check_success)
			$this->session->set('success', 'marked as \'Checked\'');
		else
			$this->session->set('success', FALSE);

		$this->redirect('faculty/opcr_coll/view/'.$opcr_ID, 303);
	}

	/**
	 * Consolidated OPCR Forms
	 */
	public function action_consolidate()
	{
		$opcr = new Model_Opcr;
		
		$start = date('Y-m-d', strtotime('01'.$this->request->post('start')));
		$end = date('Y-m-d', strtotime('01'.$this->request->post('end')));
		$users = $this->get_college_users();
		$opcr_forms = $opcr->get_group_opcr($users['user_IDs'], $start, $end, TRUE);

		if ($opcr_forms)
		{
			$opcr_outputs = array();
			foreach ($opcr_forms as $opcr_details)
			{
				$outputs = $opcr->get_outputs($opcr_details['opcr_ID']);

				if ($outputs)
				{
					foreach ($outputs as $output)
					{
						$opcr_outputs[] = $output;
					}
				}
			}

			$consolidate_data['start'] = $start;
			$consolidate_data['end'] = $end;
			$consolidate_data['opcr_outputs'] = $opcr_outputs;
			$this->session->set('consolidate_data', $consolidate_data);

			$this->redirect('extras/mpdf/download/opcr-consolidated/', 303);
		}
		else
		{
			$period = $this->request->post('start').' - '.$this->request->post('end');
			$this->session->set('error', 'There are no OPCR Forms to consolidate in the period '.$period.'.');

			$this->redirect('faculty/opcr_coll', 303);
		}
	}

	/**
	 * Get users from user's college
	 */
	private function get_college_users()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_college_programIDs($college_details['college_ID']);
		$college_users['users'] = $user->get_user_group($programIDs);
		
		$user_IDs = array();
		foreach ($college_users['users'] as $user)
		{
			$user_IDs[] = $user['user_ID'];
		}

		$college_users['user_IDs'] = $user_IDs;

		return $college_users;
	}

} // End OpcrGroup
