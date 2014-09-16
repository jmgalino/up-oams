<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!');
	}

	public function action_cats()
	{
		$ipcr = new Model_Ipcr;

		$category_ID = $this->request->post('category_ID');
		$ipcr_ID = $this->request->post('ipcr_ID');
		$targets = $ipcr->get_category_targets($ipcr_ID, $category_ID);

		$options = array();
		foreach ($targets as $target)
        {
        	$tmp['optionValue'] = $target['target_ID'];
        	$tmp['optionText'] = $target['target'];
        	$options[] = $tmp;
        }

        echo json_encode($options);
        exit();
	}

	/**
	 * Get target details
	 */
	public function action_target_details()
	{
		$ipcr = new Model_Ipcr;

		$target_ID = $this->request->post('target_ID');
		$target_details = $ipcr->get_target_details($target_ID);
		
		$arr = array();
		$arr['indicators'] = $target_details['indicators'];
		$arr['actual_accom'] = ($target_details['actual_accom'] ? $target_details['actual_accom'] : '');
		$arr['r_quantity'] = $target_details['r_quantity'];
		$arr['r_efficiency'] = $target_details['r_efficiency'];
		$arr['r_timeliness'] = $target_details['r_timeliness'];
		$arr['remarks'] = $target_details['remarks'];

		echo json_encode($arr);
		exit();
	}

} // End Ajax
