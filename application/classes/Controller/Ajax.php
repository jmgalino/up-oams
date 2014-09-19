<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller {

	public function action_abc()
	{
		$user = new Model_User;
		echo ($user->check_password($this->request->post('password')) ? TRUE : FALSE);
	}

	public function action_unique()
	{
		
		switch ($this->request->param('id'))
		{
			case 'new_college':
				$this->unique_college(0);
				break;

			case 'edit_college':
				$this->unique_college(1);
				break;

			case 'new_department':
				$this->unique_department(0);
				break;

			case 'edit_department':
				$this->unique_department(1);
				break;
			
			default:
				# code...
				break;
		}
	}

	private function unique_college($max)
	{
		$univ = new Model_Univ;

		$post = $this->request->post();
		$record = $univ->unique_record($post, 'univ_collegetbl', NULL);

		if ($record <= $max)
			echo TRUE;
		else
			echo FALSE;
	}

	/**
	 * Get college details
	 */
	public function action_college_details()
	{
		$univ = new Model_Univ;

		$college_ID = $this->request->post('college_ID');
		$college_details = $univ->get_college_details($college_ID, NULL);

		$arr = array();
		$arr['college_ID'] = $college_ID;
		$arr['college'] = $college_details['college'];
		$arr['short'] = $college_details['short'];
		$arr['user_ID'] = $college_details['user_ID'];
		
		echo json_encode($arr);
		exit();
	}

	/**
	 * Get department details
	 */
	public function action_department_details()
	{
		$univ = new Model_Univ;

		$department_ID = $this->request->post('department_ID');
		$department_details = $univ->get_department_details($department_ID, NULL);

		$arr = array();
		$arr['department'] = $department_details['department'];
		$arr['short'] = $department_details['short'];
		$arr['college_ID'] = $department_details['college_ID'];
		$arr['user_ID'] = $department_details['user_ID'];
		
		echo json_encode($arr);
		exit();
	}

	/**
	 * Get targets based on selected category
	 */
	public function action_category_targets()
	{
		$ipcr = new Model_Ipcr;

		$category_ID = $this->request->post('category_ID');
		$ipcr_ID = $this->request->post('ipcr_ID');
		$targets = $ipcr->get_category_targets($ipcr_ID, $category_ID);

		$arr = array();
		foreach ($targets as $target)
        {
        	$tmp['optionValue'] = $target['target_ID'];
        	$tmp['optionText'] = $target['target'];
        	$arr[] = $tmp;
        }

        echo json_encode($arr);
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
