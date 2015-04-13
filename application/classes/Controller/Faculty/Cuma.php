<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Cuma extends Controller_Faculty {

	private $cuma;

	public function before()
	{
		$this->cuma = new Model_Cuma;

		parent::before();
	}

	/**
	 * Faculty's CUMAFs
	 */
	public function action_index()
	{
		$univ = new Model_Univ;

		// $publish = $this->request->post('publish');
		$delete = $this->request->post('delete');
		$error = $this->request->post('error');
		$cuma_forms = $this->cuma->get_faculty_cuma($this->session->get('user_ID'));
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		
		$this->view->content = View::factory('faculty/cuma/list/faculty')
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('error', $error)
			->bind('cuma_forms', $cuma_forms)
			->bind('department', $department['department']);
		$this->response->body($this->view->render());
	}

	/**
	 * New CUMA Form
	 */
	public function action_new()
	{
		$details['user_ID'] = $this->session->get('user_ID');
		$details['period_from'] = date('Y-m-d', strtotime($this->request->post('start').'-01-01'));
		$details['period_to'] = date('Y-m-d', strtotime($this->request->post('end').'-01-01'));
		
		$insert_success = $this->cuma->initialize($details);

		if (is_numeric($insert_success))
		{
			// Post 'cuma_ID'
			$this->response = Request::factory('faculty/cuma/show_draft')
				->post($insert_success)
				->execute();
		}
		elseif (is_array($insert_success))
		{
			// Post 'cuma_ID' & 'warning'
			$this->response = Request::factory('faculty/cuma/show_draft')
				->post($insert_success)
				->execute();
		}
		else
		{
			// Post error
			$this->response = Request::factory('faculty/cuma')
				->post(array('error' => $insert_success))
				->execute();
		}
	}

	/**
	 * View CUMA Form (PDF)
	 */
	public function action_preview()
	{
		$cuma_ID = $this->request->param('id');
		$cuma_details = $this->cuma->get_details($cuma_ID);
		$this->action_check($cuma_details['user_ID']); // Redirects if not the owner
		
		if ($cuma_details['status'] == 'Draft')
		{
			$response = Request::factory('faculty/mpdf/preview/cuma/'.$cuma_ID)->execute()->body;
		}
		else
			$cuma_details['draft'] = NULL;

		$this->view->content = View::factory('faculty/cuma/view/faculty')
			->bind('cuma_details', $cuma_details);
		$this->response->body($this->view->render());
	}

	/**
	 * Edit CUMA Form
	 */
	public function action_update()
	{
		$cuma_ID = $this->request->param('id');
		
		if ($this->can_be_modified($cuma_ID))
		{
			$this->response = Request::factory('faculty/cuma/show_draft')
				->post(array('cuma_ID' => $cuma_ID))
				->execute();
		}
	}

	/**
	 * Delete CUMA Form
	 */
	public function action_delete()
	{
		$cuma_ID = $this->request->param('id');
		
		if ($this->can_be_modified($cuma_ID))
		{
			$delete_success = $this->cuma->delete($cuma_ID);
			$this->response = Request::factory('faculty/cuma')
				->post(array('delete' => $delete_success))
				->execute();
		}
	}

	/**
	 * Publish CUMA Form
	 */
	public function action_publish()
	{}

	/**
	 * View CUMA Form (Draft)
	 */
	protected function action_show_draft()
	{
		$error = $this->request->post('error');
		$warning = $this->request->post('warning');

		$cuma_ID = $this->request->post('cuma_ID');
		$cuma_details = $this->cuma->get_details($cuma_ID);
		$cuma_details['document'] = ($cuma_details['document']
			? $cuma_details['document']
			: Request::factory('faculty/mpdf/preview/cuma/'.$cuma_ID)->execute()->body);

		$start = date('Y', strtotime($cuma_details['period_from']));
		$end = date('Y', strtotime($cuma_details['period_to']));
		$label = 'AY '.$start.' - '.$end;

		$this->view->content = View::factory('faculty/cuma/form/template')
			->bind('label', $label)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('cuma_details', $cuma_details);
		$this->response->body($this->view->render());	
	}

	private function can_be_modified($cuma_ID)
	{
		$cuma_details = $this->cuma->get_details($cuma_ID);
		$this->action_check($cuma_details['user_ID']); // Redirects if not the owner
		
		if ($cuma_details['status'] == 'Published')
		{
			$this->response = Request::factory('faculty/cuma')
				->post(array('error' => 'Accomplishment Report is locked for editing.'))
				->execute();
		}

		return TRUE;
	}

} // End Cuma
