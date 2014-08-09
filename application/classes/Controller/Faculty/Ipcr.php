<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Ipcr extends Controller_Faculty {

	/**
	 * Faculty's IPCRs
	 */
	public function action_index()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$this->session->delete('accom_details');
		$this->session->delete('ipcr_details');
		$this->session->delete('opcr_details');
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$ipcr_forms = $ipcr->get_faculty_ipcr($this->session->get('user_ID'));
		$opcr_forms = $opcr->get_department_opcr($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/ipcr/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('opcr_forms', $opcr_forms);
		$this->response->body($this->view->render());
	}

	/**
	 * New IPCR Form
	 */
	public function action_new()
	{
		$ipcr = new Model_Ipcr;

		$details['opcr_ID'] = $this->request->post();
		$details['user_ID'] = $this->session->get('user_ID');
		$details['ipcr_ID'] = $ipcr->initialize($details);
		$this->session->set('ipcr_details', $details);
		$this->action_draft();
	}

	/**
	 * View IPCR Form (PDF)
	 */
	// public function action_preview()
	// {}

	/**
	 * View IPCR Form (Draft)
	 */
	public function action_update()
	{
		$ipcr = new Model_Ipcr;
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID)[0];
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		$this->session->set('ipcr_details', $ipcr_details);
		$this->action_draft();
	}

	/**
	 * Delete IPCR Form
	 */
	public function action_delete()
	{
		$ipcr = new Model_Ipcr;
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID)[0];
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		$delete_success = $ipcr->delete($ipcr_ID);
		$this->session->set('delete', $delete_success);
		$this->redirect('faculty/ipcr');
	}

	/**
	 * Submit IPCR Form
	 */
	// public function action_submit()
	// {}

	/**
	 * Download IPCR Form
	 */
	// public function action_download()
	// {}

	/**
	 * IPCR Form - PDF
	 */
	// private function action_pdf($label, $filepath)
	// {}

	/**
	 * IPCR Form - Draft
	 */
	private function action_draft()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$opcr_details = $opcr->get_details($this->session->get('ipcr_details')['opcr_ID'])[0];
		$period_from = date_format(date_create($opcr_details['period_from']), 'F Y');
		$period_to = date_format(date_create($opcr_details['period_to']), 'F Y');
		$label = $period_from.' - '.$period_to;

		$targets = $ipcr->find_targets($this->session->get('ipcr_details')['ipcr_ID']);
		$outputs = $opcr->get_outputs($this->session->get('ipcr_details')['opcr_ID']);
		$categories = $opcr->get_categories();
		// $department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];

		// if ($this->session->get('identifier') == 'dean')
		// {
		// 	$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
		// 	$title = 'Unit Head, '.$college['short'];
		// }
		// else
		// {
		// 	$title = ($this->session->get('identifier') == 'dept_chair'
		// 		? 'Unit Head, '.$department['short']
		// 		: 'Faculty, '.$department['short']);
		// }

		$this->view->content = View::factory('faculty/ipcr/form/template')
			->bind('label', $label)
			->bind('session', $this->session)
			->bind('categories', $categories)
			->bind('outputs', $outputs)
			// ->bind('department', $department['short'])
			// ->bind('title', $title)
			->bind('targets', $targets);
		$this->response->body($this->view->render());
	}

	/**
	 * Add output (Link)
	 */
	public function action_add()
	{}

	/**
	 * Remove output (Unlink)
	 */
	public function action_remove()
	{}

} // End Ipcr
