<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ipcr extends Controller {

	/**
	 * Faculty's IPCRs
	 */
	public function action_index()
	{
		$ipcr = new Model_Ipcr;

		$this->session->delete('accom_details');
		$this->session->delete('ipcr_details');
		$this->session->delete('opcr_details');
		$publish = $this->session->get_once('publish');
		$submit = $this->session->get_once('submit');
		$delete = $this->session->get_once('delete');
		$employee_code = $this->session->get('employee_code');
		$ipcr_forms = $ipcr->get_faculty_ipcr($this->session->get('user_ID'));

		$this->view->content = View::factory('faculty/ipcr/list/faculty')
			->bind('publish', $publish)
			->bind('submit', $submit)
			->bind('delete', $delete)
			->bind('ipcr_forms', $ipcr_forms)
			->bind('employee_code', $employee_code);
		$this->response->body($this->view->render());
	}


} // End Ipcr
