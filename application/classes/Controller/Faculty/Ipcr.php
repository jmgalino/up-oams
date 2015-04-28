<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Ipcr extends Controller_Faculty {

	/**
	 * Faculty's IPCRs
	 */
	public function action_index()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;

		// $this->action_delete_session();
		$error = $this->session->get_once('error');
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$identifier = $this->session->get('identifier');
		$ipcr_forms = $ipcr->get_faculty_ipcr($this->session->get('user_ID'), NULL);
		$opcr_forms = $opcr->get_department_opcr($this->session->get('program_ID'), NULL);

		$this->view->content = View::factory('faculty/ipcr/list/faculty')
			->bind('submit', $submit)
			->bind('identifier', $identifier)
			->bind('delete', $delete)
			->bind('error', $error)
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

		$ipcr_details['opcr_ID'] = $this->request->post('period');
		$ipcr_details['user_ID'] = $this->session->get('user_ID');

		$insert_success = $ipcr->initialize($ipcr_details);

		if (is_numeric($insert_success))
		{
			$ipcr_details['ipcr_ID'] = $insert_success;
			$this->show_draft($ipcr_details);
		}
		elseif (is_array($insert_success))
		{
			$ipcr_details['ipcr_ID'] = $insert_success['ipcr_ID'];
			$this->session->set('warning', $insert_success['message']);
			$this->show_draft($ipcr_details);
		}
		else // Error
		{
			$this->session->set('error', $insert_success);
			$this->redirect('faculty/ipcr', 303);
		}
	}

	/**
	 * View IPCR Form (PDF)
	 */
	public function action_preview()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		if (!$ipcr_details['document'] OR in_array($ipcr_details['status'], array('Draft', 'Rejected', 'Accepted')) OR (($ipcr_details['status'] == 'Saved') AND $this->session->get('identifier') != 'faculty'))
		{
			$draft = $this->session->get_once('pdf_draft');
			
			if ($draft)
				$ipcr_details['draft'] = $draft;
			else
				$this->redirect('faculty/mpdf/preview/ipcr/'.$ipcr_ID, 303);
		}
		else
			$ipcr_details['draft'] = NULL;

		$this->show_pdf($ipcr_details, $opcr_details);
	}

	/**
	 * View IPCR Form (Draft)
	 */
	public function action_update()
	{
		$ipcr = new Model_Ipcr;
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		if (($ipcr_details['status'] == 'Checked') OR ($ipcr_details['status'] == 'Pending'))
		{
			$this->session->set('error', 'IPCR Form is locked for editing.');
			$this->redirect('faculty/ipcr'); //401
		}
		else
		{
			$this->show_draft($ipcr_details);
		}
	}

	/**
	 * Delete IPCR Form
	 */
	public function action_delete()
	{
		$ipcr = new Model_Ipcr;
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		if (($ipcr_details['status'] == 'Checked') OR ($ipcr_details['status'] == 'Accepted') OR ($ipcr_details['status'] == 'Pending'))
		{
			$this->session->set('error', 'IPCR Form is locked for editing.');
			$this->redirect('faculty/ipcr'); //401
		}
		else
		{
			$delete_success = $ipcr->delete($ipcr_ID);
			$this->session->set('delete', $delete_success);
			$this->redirect('faculty/ipcr', 303);
		}
	}

	/**
	 * Submit IPCR Form
	 */
	public function action_submit()
	{
		$ipcr = new Model_Ipcr;
		
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		$this->redirect('faculty/mpdf/submit/ipcr/'.$ipcr_ID);
	}

	/**
	 * Rate IPCR Form
	 */
	public function action_rate()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		$identifier = $this->session->get('identifier');
		$categories = $this->oams->get_categories();

		$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$label = $period_from.' - '.$period_to;

		$flag = 0;
		$targets = $ipcr->get_targets($ipcr_details['ipcr_ID']);
		foreach ($targets as $target)
		{
			if (!$target['r_quantity'] OR !$target['r_efficiency'] OR !$target['r_timeliness'])
				$flag++;
		}

		$this->view->content = View::factory('faculty/ipcr/form/final/template')
			->bind('label', $label)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('flag', $flag)
			->bind('identifier', $identifier)
			->bind('ipcr_ID', $ipcr_ID)
			->bind('categories', $categories)
			->bind('outputs', $outputs)
			->bind('targets', $targets);
		$this->response->body($this->view->render());
	}

	/**
	 * Save target rating
	 */
	public function action_save()
	{
		$ipcr = new Model_Ipcr;
		
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		$update_success = $ipcr->update_target($this->request->post());// add alert (?)
		$this->redirect('faculty/ipcr/rate/'.$ipcr_ID);
	}

	/**
	 * Add output (Link)
	 */
	public function action_add()
	{
		$ipcr = new Model_Ipcr;
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$details['output_ID'] = $this->request->post('output_ID');
		$details['ipcr_ID'] = $ipcr_ID;
		$ipcr->add_target($details);
		
		$this->redirect('faculty/ipcr/update/'.$ipcr_ID, 303);
	}

	/**
	 * Edit output
	 */
	public function action_edit()
	{
		$ipcr = new Model_Ipcr;
		
		$post = $this->request->post();
		$target_details = $ipcr->get_target_details($post['target_ID']);
		$ipcr_details = $ipcr->get_details($target_details['ipcr_ID']);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$edit_success = $ipcr->update_target($post);

		if ($edit_success)
		{
			if (isset($post['target'])) echo $post['target'];
			elseif (isset($post['indicators'])) echo $post['indicators'];
			elseif (isset($post['actual_accom'])) echo $post['actual_accom'];
		}
		else
		{
			echo "<script>
				alert('There seems to be an error. Please refresh the page.');
				</script>";
		}
	}

	/**
	 * Remove output (Unlink)
	 */
	public function action_remove()
	{
		$ipcr = new Model_Ipcr;
		$target_ID = $this->request->param('id');
		$target_details = $ipcr->get_target_details($target_ID);
		$ipcr_details = $ipcr->get_details($target_details['ipcr_ID']);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		$ipcr->delete_target($target_ID);
		$this->redirect('faculty/ipcr/update/'.$this->session->get('ipcr_details')['ipcr_ID'], 303);
	}

	/**
	 * IPCR Form - PDF
	 */
	private function show_pdf($ipcr_details, $opcr_details)
	{
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;

		$this->view->content = View::factory('faculty/ipcr/view/faculty')
			->bind('ipcr_details', $ipcr_details)
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * IPCR Form - Draft
	 */
	private function show_draft($ipcr_details)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		$this->session->set('ipcr_details', $ipcr_details); // used for checking 
		
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$targets = $ipcr->get_targets($ipcr_details['ipcr_ID']);
		$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);
		
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$label = $period_from.' - '.$period_to;
		
		$categories = $this->oams->get_categories();

		// $department = $univ->get_department_details(NULL, $this->session->get('program_ID'));

		// if ($this->session->get('identifier') == 'dean')
		// {
		// 		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		// 		$title = 'Unit Head, '.$college['short'];
		// }
		// elseif ($this->session->get('identifier') == 'chair')
		// 	$title = 'Unit Head, '.$department['short'];
		// else
		// 	$title = 'Faculty, '.$department['short'];

		$this->view->content = View::factory('faculty/ipcr/form/initial/template')
			->bind('label', $label)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('session', $this->session)
			->bind('ipcr_details', $ipcr_details)
			->bind('categories', $categories)
			->bind('outputs', $outputs)
			// ->bind('department', $department['short'])
			// ->bind('title', $title)
			->bind('targets', $targets);
		$this->response->body($this->view->render());
	}

} // End Ipcr
