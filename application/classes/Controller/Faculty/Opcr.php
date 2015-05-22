<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Opcr extends Controller_Faculty {

	private $opcr;

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		if ($this->session->get('identifier') != 'chair')
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect('faculty/error');
		}

		$this->opcr = new Model_Opcr;
	}

	/**
	 * Faculty's OPCRs
	 */
	public function action_index()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		$user = new Model_User;
		
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$error = $this->session->get_once('error');

		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_department_programIDs($department['department_ID']);
		$users = $user->get_user_group($programIDs);
		
		$userIDs = array();
		foreach ($users as $user)
		{
			$userIDs[] = $user['user_ID'];
		}

		$ipcr_forms = $ipcr->get_group_ipcr($userIDs, NULL, NULL, FALSE);
		$opcr_forms = $opcr->get_faculty_opcr($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/opcr/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('error', $error)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('opcr_forms', $opcr_forms)
			->bind('department', $department['short']);
		$this->response->body($this->view->render());
	}

	/**
	 * New OPCR Form
	 */
	public function action_new()
	{
		if (($this->request->post('form_type') == 'new') AND ($this->request->post('start')))
		{
			$opcr = new Model_Opcr;

			$details['user_ID'] = $this->session->get('user_ID');
			$details['period_from'] = date('Y-m-d', strtotime('01 '.$this->request->post('start')));
			$details['period_to'] = date('Y-m-d', strtotime('01 '.$this->request->post('end')));

			$insert_success = $opcr->initialize($details);

			if (is_numeric($insert_success))
			{
				$details['opcr_ID'] = $insert_success;
				$this->session->set('opcr_details', $details);
				$this->show_draft();
			}
			elseif (is_array($insert_success))
			{
				$opcr_details = $opcr->get_details($insert_success['opcr_ID']);
				$this->session->set('opcr_details', $opcr_details);
				$this->session->set('warning', $insert_success['message']);
				$this->show_draft();
			}
			else // Error
			{
				$this->session->set('error', $insert_success);
				$this->redirect('faculty/opcr', 303);
			}
		}
		else
		{
			$this->action_consolidate();
		}
	}

	/**
	 * View OPCR Form (PDF)
	 */
	public function action_preview()
	{
		$opcr = new Model_Opcr;

		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$this->action_check($opcr_details['user_ID']); // Redirects if not the owner

		if (in_array($opcr_details['status'], array('Published', 'Returned')))
		{
			$opcr_details['draft'] = Request::factory('extras/mpdf/preview/ipcr-consolidated/'.$opcr_ID)
				->execute()
				->body;
		}
		elseif (!$opcr_details['document'] OR $opcr_details['status'] == 'Draft')
		{
			$draft = Request::factory('extras/mpdf/preview/opcr/'.$opcr_ID, 303)
				->execute()
				->body;
		}
		else
			$opcr_details['draft'] = NULL;

		$this->show_pdf($opcr_details);
	}

	/**
	 * View OPCR Form (Draft)
	 */
	public function action_update()
	{
		$opcr = new Model_Opcr;
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$this->action_check($opcr_details['user_ID']); // Redirects if not the owner
		
		if (in_array($opcr_details['status'], array('Published', 'Pending')))
		{
			$this->session->set('error', 'OPCR Form is locked for editing.');
			$this->redirect('faculty/opcr'); //401
		}
		else
		{
			$this->session->set('opcr_details', $opcr_details);
			$this->show_draft();
		}
	}

	/**
	 * Delete OPCR Form
	 */
	public function action_delete()
	{
		$opcr = new Model_Opcr;
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$this->action_check($opcr_details['user_ID']);

		if (in_array($opcr_details['status'], array('Published', 'Pending', 'Accepted')))
		{
			$this->session->set('error', 'OPCR Form is locked for editing.');
			$this->redirect('faculty/opcr'); //401
		}
		else
		{
			$delete = $opcr->delete($opcr_ID);
			$this->session->set('delete', $delete);
			$this->redirect('faculty/opcr', 303);
		}
	}

	/**
	 * Publish OPCR Form
	 */
	public function action_publish()
	{
		$opcr = new Model_Opcr;
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$this->action_check($opcr_details['user_ID']); // Redirects if not the owner
		$this->redirect('extras/mpdf/submit/opcr/'.$opcr_ID, 303);
	}

	/**
	 * Submit OPCR Form
	 */
	public function action_submit()
	{
		$opcr = new Model_Opcr;
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$this->action_check($opcr_details['user_ID']); // Redirects if not the owner
		$this->redirect('extras/mpdf/submit/ipcr-consolidated/'.$opcr_ID, 303);
	}

	/**
	 * Save output rating
	 */
	public function action_save()
	{
		$opcr = new Model_Opcr;
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID);
		$this->action_check($opcr_details['user_ID']); // Redirects if not the owner
		
		$opcr->update_output($this->request->post());
		
		if ($this->session->get('identifier') == 'chair')
			$this->redirect('faculty/dept/ipcr/consolidate/'.$opcr_ID);
		elseif ($this->session->get('identifier') == 'dean')
		{}
	}

	/**
	 * Consolidate OPCR Forms
	 */
	private function action_consolidate()
	{
		if ($this->session->get('identifier') == 'chair')
			$this->redirect('faculty/dept/ipcr/consolidate/'.$this->request->post('opcr_ID'));
		elseif ($this->session->get('identifier') == 'dean')
		{}
	}

	/**
	 * New output
	 */
	public function action_add()
	{
		$opcr = new Model_Opcr;

		$post = $this->request->post();
		$details['category_ID'] = $post['category_ID'];
		$details['opcr_ID'] = $this->session->get('opcr_details')['opcr_ID'];
		$details['output'] = $post['output'];
		$details['indicators'] = ($post['indicators'] != ''
			? $post['indicators']
			: 'Targets: '.$post['targets'].' Measures: '.$post['measures']);
		
		$opcr->add_output($details);
		$this->redirect('faculty/opcr/update/'.$details['opcr_ID'], 303);
	}

	/**
	 * Edit output
	 */
	public function action_edit()
	{
		$opcr = new Model_Opcr;

		$post = $this->request->post();
		$output_details = $opcr->get_output_details($post['output_ID']);
		$this->action_check($output_details['user_ID']); // Redirects if not the owner
		
		$post['indicators'] = ($post['indicators'] != ''
			? $post['indicators']
			: 'Targets: '.$post['targets'].' Measures: '.$post['measures']);
		
		unset($post['targets'], $post['measures']);
		$edit_success = $opcr->update_output($post);

		$this->redirect('faculty/opcr/update/'.$output_details['opcr_ID'], 303);
	}

	/**
	 * Delete output
	 */
	public function action_remove()
	{
		$opcr = new Model_Opcr;
		$output_ID = $this->request->param('id');
		$delete_success = $opcr->delete_output($output_ID);
		
		if (!$delete_success) $this->session->set('error', 'Something went wrong. Please try again.');
		$this->redirect('faculty/opcr/update/'.$this->session->get('opcr_details')['opcr_ID'], 303);
	}

	/**
	 * OPCR Form - PDF
	 */
	private function show_pdf($opcr_details)
	{
		$ipcr = new Model_Ipcr;

		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;

		$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_details['opcr_ID']);
		
		$accepted = array();
		foreach ($ipcr_forms as $ipcr_form)
		{
			if ($ipcr_form['status'] == 'Accepted')
				$accepted[] = $ipcr_form;
		}

		$this->view->content = View::factory('faculty/opcr/view/faculty')
			->bind('opcr_details', $opcr_details)
			->bind('accepted', $accepted)
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * OPCR Form - Draft
	 */
	private function show_draft()
	{
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		
		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		$period_from = date('F Y', strtotime($this->session->get('opcr_details')['period_from']));
		$period_to = date('F Y', strtotime($this->session->get('opcr_details')['period_to']));
		$label = $period_from.' - '.$period_to;
		$opcr_ID = $this->session->get('opcr_details')['opcr_ID'];
		$outputs = $opcr->get_outputs($opcr_ID);
		$categories = $this->oams->get_categories();
		// $department = $univ->get_department_details(NULL, $this->session->get('program_ID'));

		// if ($this->session->get('identifier') == 'chair')
		// {
		// 	$title = $department['short'];
		// }
		// elseif ($this->session->get('identifier') == 'dean')
		// {
		// 	$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		// 	$title = $college['short'];
		// }

		$this->view->content = View::factory('faculty/opcr/form/initial/template')
			->bind('label', $label)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('session', $this->session)
			->bind('categories', $categories)
			// ->bind('department', $department['short'])
			// ->bind('title', $title)
			->bind('outputs', $outputs);
		$this->response->body($this->view->render());
	}

} // End Opcr
