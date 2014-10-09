<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Opcr extends Controller_Faculty {

	/**
	 * Faculty's OPCRs
	 */
	public function action_index()
	{
		$opcr = new Model_Opcr;
		
		$this->action_delete_session();
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$error = $this->session->get_once('error');
		$identifier = $this->session->get('identifier');
		$opcr_forms = $opcr->get_faculty_opcr($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/opcr/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('error', $error)
			->bind('identifier', $identifier)
			->bind('opcr_forms', $opcr_forms);
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
			$details['period_from'] = date_format(date_create('01 '.$this->request->post('start')), 'Y-m-d');
			$details['period_to'] = date_format(date_create('01 '.$this->request->post('end')), 'Y-m-d');

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

		if ($opcr_details['document'])
		{
			// Show PDF
			$period_from = date_format(date_create($opcr_details['period_from']), 'F Y');
			$period_to = date_format(date_create($opcr_details['period_to']), 'F Y');
			$period = $period_from.' - '.$period_to;
			$this->show_pdf($period, $opcr_details);
		}
		else
		{
			// Create from draft
		}
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
		
		if (($opcr_details['status'] == 'Checked') OR ($opcr_details['status'] == 'Pending') OR ($opcr_details['status'] == 'Published'))
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

		if (($opcr_details['status'] == 'Checked') OR ($opcr_details['status'] == 'Accepted') OR ($opcr_details['status'] == 'Pending') OR ($opcr_details['status'] == 'Published'))
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
		$this->redirect('faculty/mpdf/submit/opcr/'.$opcr_ID, 303);
	}

	/**
	 * Submit OPCR Form
	 */
	// public function action_submit()
	// {}

	/**
	 * Download OPCR Form
	 */
	// public function action_download()
	// {}

	/**
	 * Consolidate OPCR Forms
	 */
	private function action_consolidate()
	{
		if ($this->session->get('identifier') == 'dean')
		{}
		elseif ($this->session->get('identifier') == 'dept_chair')
			$this->redirect('faculty/ipcr_dept/consolidate/'.$this->request->post('opcr_ID'));
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
		$details['indicators'] = ($post['indicators']
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
		
		if ($this->session->get('opcr_details')['opcr_ID'] == $output_details['opcr_ID'])
		{
			$edit_success = $opcr->update_output($post);

			if ($edit_success)
			{
				if (isset($post['output'])) echo $post['output'];
				elseif (isset($post['indicators'])) echo $post['indicators'];
			}
			else
			{
				echo "<script>
					alert('There seems to be an error. Please refresh the page.');
					</script>";
			}
		}
	}

	/**
	 * Delete output
	 */
	public function action_remove()
	{
		$opcr = new Model_Opcr;
		$output_ID = $this->request->param('id');
		$opcr->delete_output($output_ID);
		$this->redirect('faculty/opcr/update/'.$this->session->get('opcr_details')['opcr_ID'], 303);
	}

	/**
	 * OPCR Form - PDF
	 */
	private function show_pdf($period, $opcr_details)
	{
		$ipcr = new Model_Ipcr;
		$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_details['opcr_ID']);
		
		$this->view->content = View::factory('faculty/opcr/view/faculty')
			->bind('opcr_details', $opcr_details)
			->bind('ipcr_forms', $ipcr_forms)
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
		$period_from = date_format(date_create($this->session->get('opcr_details')['period_from']), 'F Y');
		$period_to = date_format(date_create($this->session->get('opcr_details')['period_to']), 'F Y');
		$label = $period_from.' - '.$period_to;
		$opcr_ID = $this->session->get('opcr_details')['opcr_ID'];
		$outputs = $opcr->get_outputs($opcr_ID);
		$categories = $this->oams->get_categories();
		// $department = $univ->get_department_details(NULL, $this->session->get('program_ID'));

		// if ($this->session->get('identifier') == 'dept_chair')
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
