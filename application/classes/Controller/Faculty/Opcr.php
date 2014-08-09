<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Opcr extends Controller_Faculty {

	/**
	 * Faculty's OPCRs
	 */
	public function action_index()
	{
		// print_r($this->request->post());
		$opcr = new Model_Opcr;

		$this->session->delete('accom_details');
		$this->session->delete('ipcr_details');
		$this->session->delete('opcr_details');
		$publish = $this->session->get_once('publish');
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$employee_code = $this->session->get('employee_code');
		$opcr_forms = $opcr->get_faculty_opcr($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/opcr/list/faculty')
			->bind('publish', $publish)
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('opcr_forms', $opcr_forms);
		$this->response->body($this->view->render());
	}

	/**
	 * New OPCR Form
	 */
	public function action_new()
	{
		if (($this->request->post('document_type') == 'new') OR ($this->request->post('start')))
		{
			$opcr = new Model_Opcr;

			$details['user_ID'] = $this->session->get('user_ID');
			$details['period_from'] = date_format(date_create('01 '.$this->request->post('start')), 'Y-m-d');
			$details['period_to'] = date_format(date_create('01 '.$this->request->post('end')), 'Y-m-d');
			$details['opcr_ID'] = $opcr->initialize($details);
			$this->session->set('opcr_details', $details);
			$this->action_draft();
		}
		else
		{
			$this->action_consolidate();
		}
	}

	/**
	 * View OPCR Form (PDF)
	 */
	// public function action_preview()
	// {}

	/**
	 * View OPCR Form (Draft)
	 */
	public function action_update()
	{
		$opcr = new Model_Opcr;
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID)[0];
		$this->action_check($opcr_details['user_ID']); // Redirects if not the owner
		
		$this->session->set('opcr_details', $opcr_details);
		$this->action_draft();
	}

	/**
	 * Delete OPCR Form
	 */
	public function action_delete()
	{
		$opcr = new Model_Opcr;
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID)[0];
		$this->action_check($opcr_details['user_ID']);

		$delete = $opcr->delete($opcr_ID);
		$this->session->set('delete', $delete);
		$this->redirect('faculty/opcr');
	}

	/**
	 * Publish OPCR Form
	 */
	public function action_publish()
	{
		$opcr = new Model_Opcr;
		
		$opcr_ID = $this->request->param('id');
		$opcr_details = $opcr->get_details($opcr_ID)[0];
		$this->action_check($opcr_details['user_ID']);

		$publish_success = $opcr->publish($opcr_ID);
		$this->session->set('publish', $publish_success);
		$this->redirect('faculty/opcr');
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
	// private function action_consolidate()
	// {}

	/**
	 * OPCR Form - PDF
	 */
	// private function action_pdf($label, $filepath)
	// {}

	/**
	 * OPCR Form - Draft
	 */
	private function action_draft()
	{
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$period_from = date_format(date_create($this->session->get('opcr_details')['period_from']), 'F Y');
		$period_to = date_format(date_create($this->session->get('opcr_details')['period_to']), 'F Y');
		$label = $period_from.' - '.$period_to;
		$opcr_ID = $this->session->get('opcr_details')['opcr_ID'];
		$outputs = $opcr->get_outputs($opcr_ID);
		$categories = $opcr->get_categories();
		// $department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];

		// if ($this->session->get('identifier') == 'dept_chair')
		// {
		// 	$title = $department['short'];
		// }
		// elseif ($this->session->get('identifier') == 'dean')
		// {
		// 	$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
		// 	$title = $college['short'];
		// }

		$this->view->content = View::factory('faculty/opcr/form/template')
			->bind('label', $label)
			->bind('session', $this->session)
			->bind('categories', $categories)
			// ->bind('department', $department['short'])
			// ->bind('title', $title)
			->bind('outputs', $outputs);
		$this->response->body($this->view->render());
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
		$this->redirect('faculty/opcr/update/'.$details['opcr_ID']);
	}

	/**
	 * Edit output
	 */
	public function action_edit()
	{
		$opcr = new Model_Opcr;

		$post = $this->request->post();
		$output_details = $opcr->get_output_details($post['output_ID'])[0];
		
		if ($this->session->get('opcr_details')['opcr_ID'] == $output_details['opcr_ID'])
		{
			$edit_success = $opcr->edit_output($post);

			if ($edit_success)
			{
				if (isset($post['output'])) echo $post['output'];
				elseif (isset($post['indicators'])) echo $post['indicators'];
			}
		}	

// 		if ($edit_success)
// 		{	
// 			if ($post['output']) echo $post['output'];
// 			else echo 'h';
// 		}
	}

	/**
	 * Delete output
	 */
	public function action_remove()
	{
		$opcr = new Model_Opcr;
		$output_ID = $this->request->param('id');
		$opcr->delete_output($output_ID);
		$this->redirect('faculty/opcr/update/'.$this->session->get('opcr_details')['opcr_ID']);
	}

} // End Opcr
