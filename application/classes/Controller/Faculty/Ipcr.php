<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Ipcr extends Controller_Faculty {

	private $ipcr;

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		$this->ipcr = new Model_Ipcr;
	}

	/**
	 * Faculty's IPCRs
	 */
	public function action_index()
	{
		$opcr = new Model_Opcr;

		$error = $this->session->get_once('error');
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$identifier = $this->session->get('identifier');
		
		$ipcr_forms = $this->ipcr->get_faculty_ipcr($this->session->get('user_ID'), NULL);
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
		$ipcr_details['opcr_ID'] = $this->request->post('period');
		$ipcr_details['user_ID'] = $this->session->get('user_ID');

		$insert_success = $this->ipcr->initialize($ipcr_details);

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
		$opcr = new Model_Opcr;
		
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $this->ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);

		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;

		$ipcr_details['draft'] = ($this->is_mutable($ipcr_ID)
			? Request::factory('extras/mpdf/preview/ipcr/'.$ipcr_ID)
				->execute()
				->body
			: NULL);

		$this->view->content = View::factory('faculty/ipcr/view/faculty')
			->bind('ipcr_details', $ipcr_details)
			->bind('period', $period);
		$this->response->body($this->view->render());
	}

	/**
	 * View IPCR Form (Draft)
	 */
	public function action_update()
	{
		$ipcr_ID = $this->request->param('id');
		
		if ($this->is_mutable($ipcr_ID))
		{
			$ipcr_details = $this->ipcr->get_details($ipcr_ID);
			$this->show_draft($ipcr_details);
		}
		else
		{
			$this->session->set('error', 'IPCR Form is locked for editing.');
			$this->redirect('faculty/ipcr'); //401
		}
	}

	/**
	 * Delete IPCR Form
	 */
	public function action_delete()
	{
		$ipcr_ID = $this->request->param('id');
		
		if ($this->is_mutable($ipcr_ID))
		{
			$delete_success = $this->ipcr->delete($ipcr_ID);
			$this->session->set('delete', $delete_success);
			$this->redirect('faculty/ipcr', 303);
		}
		else
		{
			$this->session->set('error', 'IPCR Form is locked for editing.');
			$this->redirect('faculty/ipcr'); //401
		}
	}

	/**
	 * Submit IPCR Form
	 */
	public function action_submit()
	{
		$ipcr_ID = $this->request->param('id');

		$ipcr_details = $this->ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$details['document'] = Request::factory('extras/mpdf/submit/ipcr/'.$ipcr_ID)->execute()->body;
		$details['status'] = ($this->session->get('identifier') == 'faculty' ? 'Pending' : 'Saved');
		$details['date_submitted'] = date('Y-m-d');

		// Design better scheme: What if returned after rating?
		// Current: If returned after rating, reverts back to "unrated" (but keeps the rating) and must be submitted twice
		$details['version'] = ($ipcr_details['status'] == 'Accepted' ? 2 : 1);
		
		$submit_success = $this->ipcr->update($ipcr_ID, $details);
		$this->session->set('submit', $submit_success);
		$this->redirect('faculty/ipcr', 303);
	}

	/**
	 * Rate IPCR Form
	 */
	public function action_rate()
	{
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $this->ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		$identifier = $this->session->get('identifier');
		$categories = $this->app->get_categories();

		$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$label = $period_from.' - '.$period_to;

		$flag = 0;
		$targets = $this->ipcr->get_targets($ipcr_details['ipcr_ID']);
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
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $this->ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		$new_details = $this->request->post();
    	$current_details = $this->ipcr->get_target_details($new_details['target_ID']);

    	// Target has new attachments
		if(file_exists($_FILES['attachment']['tmp_name'][0]) AND is_uploaded_file($_FILES['attachment']['tmp_name'][0]))
			$new_details['attachment'] = $current_details['attachment'].'; '.$this->add_attachment($ipcr_ID, $_FILES['attachment']);
        
        // add alert (?)
		$this->ipcr->update_target($new_details);
		$this->redirect('faculty/ipcr/rate/'.$ipcr_ID);
	}

	/**
	 * Add output (Link)
	 */
	public function action_add()
	{
		$ipcr_ID = $this->request->param('id');
		$ipcr_details = $this->ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$details['output_ID'] = $this->request->post('output_ID');
		$details['ipcr_ID'] = $ipcr_ID;
		$add_success = $this->ipcr->add_target($details);
		$this->session->set('success', $add_success);
		$this->redirect('faculty/ipcr/update/'.$ipcr_ID, 303);
	}

	/**
	 * Edit output
	 */
	public function action_edit()
	{
		$post = $this->request->post();
		$target_details = $this->ipcr->get_target_details($post['target_ID']);
		$ipcr_details = $this->ipcr->get_details($target_details['ipcr_ID']);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner

		$edit_success = $this->ipcr->update_target($post);

		if ($edit_success)
		{
			if (isset($post['target'])) echo $post['target'];
			elseif (isset($post['indicators'])) echo $post['indicators'];
			elseif (isset($post['actual_ipcr'])) echo $post['actual_ipcr'];
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
		$target_ID = $this->request->param('id');
		$target_details = $this->ipcr->get_target_details($target_ID);
		$ipcr_details = $this->ipcr->get_details($target_details['ipcr_ID']);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		$delete_success = $this->ipcr->delete_target($target_ID);
		$this->session->set('success', $delete_success);
		$this->redirect('faculty/ipcr/update/'.$this->session->get('ipcr_details')['ipcr_ID'], 303);
	}

	/**
	 * IPCR Form - Draft
	 */
	private function show_draft($ipcr_details)
	{
		$opcr = new Model_Opcr;

		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		$warning = $this->session->get_once('warning');
		$this->session->set('ipcr_details', $ipcr_details); // used for checking 
		
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$targets = $this->ipcr->get_targets($ipcr_details['ipcr_ID']);
		$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);
		
		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$label = $period_from.' - '.$period_to;
		
		$categories = $this->app->get_categories();

		$this->view->content = View::factory('faculty/ipcr/form/initial/template')
			->bind('label', $label)
			->bind('success', $success)
			->bind('error', $error)
			->bind('warning', $warning)
			->bind('session', $this->session)
			->bind('ipcr_details', $ipcr_details)
			->bind('categories', $categories)
			->bind('outputs', $outputs)
			->bind('targets', $targets);
		$this->response->body($this->view->render());
	}

	/**
	 * Upload new attachments
	 */
	private function add_attachment($ipcr_ID, $new_attachment)
	{
		$attachment = Request::factory('extras/upload/attachment')
			->post(array(
				'id' => $ipcr_ID,
				'attachments' => $new_attachment))
			->execute()
			->body;

		$attachments = explode(' ', $attachment);
		$target_attachments = array(); $counter = 0;
		foreach ($attachments as $attachment)
		{
			$target_attachments[] = $_FILES['attachment']['name'][$counter++].' => '.$attachment;
		}
		
		$attachment = implode('; ', $target_attachments);
		return $attachment;
	}

	/**
	 * Check if report is mutabable
	 */
	private function is_mutable($ipcr_ID)
	{
		$ipcr_details = $this->ipcr->get_details($ipcr_ID);
		$this->action_check($ipcr_details['user_ID']); // Redirects if not the owner
		
		return ((in_array($ipcr_details['status'], array('Draft', 'Saved', 'Returned'))) OR (($ipcr_details['status'] == 'Saved') AND $this->session->get('identifier') != 'faculty'));
	}

} // End Ipcr
