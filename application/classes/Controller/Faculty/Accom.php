<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_Accom extends Controller_Faculty {

	/**
	 * Accomplishment Reports
	 */
	public function action_index()
	{
		$accom = new Model_Accom;

		$filter = $this->request->post();
		$user_ID = $this->session->get('user_ID');
		$accom_reports = $accom->get_all_accom($user_ID, $filter);

		$this->view->content = View::factory('faculty/accom/list/faculty')
			->bind('accom_reports', $accom_reports)
			->bind('filter', $accom_reports);
		$this->response->body($this->view->render());
	}

} // End Accom
