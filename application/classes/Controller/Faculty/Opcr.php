<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Opcr extends Controller_Faculty {

	/**
	 * Faculty's OPCRs
	 */
	public function action_index()
	{
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
			->bind('opcr_forms', $opcr_forms)
			->bind('employee_code', $employee_code);
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
			$this->session->set('opcr_details', $details);print_r($details);
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
	public function action_preview()
	{}

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
	// public function action_delete()
	// {}

	/**
	 * Publish OPCR Form
	 */
	public function action_publish()
	{
		// generate PDF from draft
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
		$outputs = $opcr->find_outputs($opcr_ID);
		$categories = $opcr->get_categories();
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];

		if ($this->session->get('identifier') == 'dept_chair')
		{
			$title = $department['short'];
		}
		elseif ($this->session->get('identifier') == 'dean')
		{
			$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
			$title = $college['short'];
		}

		$this->view->content = View::factory('faculty/opcr/form/template')
			->bind('label', $label)
			->bind('session', $this->session)
			->bind('categories', $categories)
			->bind('department', $department['short'])
			->bind('title', $title)
			->bind('outputs', $outputs);
		$this->response->body($this->view->render());
	}

	/**
	 * Check ownership
	 */
	private function action_check($user_ID)
	{
		if ($this->session->get('user_ID') !== $user_ID)
		{
			$this->session->set('error', 'This form is not available.');
			$this->redirect('faculty/error');
		}
	}

	/**
	 * New output
	 */
	public function action_add()
	{
		$opcr = new Model_Opcr;

		$details = $this->request->post();
		$details['opcr_ID'] = $this->session->get('opcr_details')['opcr_ID'];
		$opcr->add_output($details);
		$this->redirect('faculty/opcr/update/'.$details['opcr_ID']);
	}

	/**
	 * Edit output
	 */
	// public function action_edit()
	// {}

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
