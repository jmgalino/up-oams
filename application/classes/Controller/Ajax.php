<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller {

	public function action_abc()
	{
		$user = new Model_User;
		echo ($user->check_password($this->request->post('password')) ? TRUE : FALSE);
	}

	/**
	 * Validate college/department/program
	 */
	public function action_unique()
	{
		switch ($this->request->param('id'))
		{
			case 'new_user':
				$table = 'user_profiletbl';
				$exclude = array('first_name', 'middle_name', 'last_name', 'user_type',
					'faculty_code', 'program_ID', 'department_ID', 'rank', 'position', 'birthday', 'deleted');
				$max = 0;
				break;

			case 'edit_user':
				$table = 'user_profiletbl';
				$exclude = array('first_name', 'middle_name', 'last_name', 'user_type',
					'faculty_code', 'program_ID', 'department_ID', 'rank', 'position', 'birthday', 'deleted');
				$max = 1;
				break;

			case 'new_college':
				$table = 'univ_collegetbl';
				$exclude = array();
				$max = 0;
				break;

			case 'edit_college':
				$table = 'univ_collegetbl';
				$exclude = array();
				$max = 1;
				break;

			case 'new_department':
				$table = 'univ_departmenttbl';
				$exclude = array('college_ID');
				$max = 0;
				break;

			case 'edit_department':
				$table = 'univ_departmenttbl';
				$exclude = array('college_ID');
				$max = 1;
				break;

			case 'new_program':
				$table = 'univ_programtbl';
				$exclude = array('college_ID', 'department_ID', 'type', 'date_instituted', 'vision', 'goals');
				$max = 0;
				break;

			case 'edit_program':
				$table = 'univ_programtbl';
				$exclude = array('college_ID', 'department_ID', 'type', 'date_instituted', 'vision', 'goals');
				$max = 1;
				break;
		}

		$oams = new Model_Oams;
		$post = $this->request->post();
		$record = $oams->unique_record($post, $table, $exclude);

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
	 * Get departments based on college
	 */
	public function action_college_departments()
	{
		$univ = new Model_Univ;

		$college_ID = $this->request->post('college_ID');
		$departments = $univ->get_college_departments($college_ID);

		$arr = array();
		foreach ($departments as $department)
        {
        	$tmp['optionValue'] = $department['department_ID'];
        	$tmp['optionText'] = $department['department'];
        	$arr[] = $tmp;
        }

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
		$arr['department_ID'] = $department_ID;
		$arr['college_ID'] = $department_details['college_ID'];
		$arr['department'] = $department_details['department'];
		$arr['short'] = $department_details['short'];
		$arr['user_ID'] = $department_details['user_ID'];
		
		echo json_encode($arr);
		exit();
	}

	/**
	 * Get programs
	 */
	public function action_get_programs()
	{
		$univ = new Model_Univ;

		$programs = $univ->get_programs();

		$arr = array();
		foreach ($programs as $program)
		{
			$tmp['program_ID'] = $program['program_ID'];
			$tmp['college'] = $program['college'];
			$tmp['department'] = ($program['department'] ? $program['department'] : 'Not Applicable');
			$tmp['program'] = $program['program'];
			$tmp['program_short'] = $program['program_short'];
			$tmp['short'] = $program['short'];
			$tmp['date_instituted'] = date('F d, Y', strtotime($program['date_instituted']));
			$tmp['type'] = $program['type'];
			$tmp['vision'] = $program['vision'];
			$tmp['goals'] = $program['goals'];
			$tmp['update'] = '<a class="btn btn-default" key="'.$program['program_ID'].'" id="updateProgram" data-toggle="modal" data-target="#modal_program" href="#" url="'.URL::site('admin/university/update/program').'">
					<span class="glyphicon glyphicon-pencil"></span> Update</a>';
			$arr[] = $tmp;
		}
		
		echo json_encode(array('data' => $arr));
		exit();
	}

	/**
	 * Get program details
	 */
	public function action_program_details()
	{
		$univ = new Model_Univ;

		$program_ID = $this->request->post('program_ID');
		$program_details = $univ->get_program_details($program_ID);

		$arr = array();
		$arr['program_ID'] = $program_ID;
		$arr['college_ID'] = $program_details['college_ID'];
		$arr['department_ID'] = ($program_details['department_ID'] ? $program_details['department_ID'] : FALSE);
		$arr['program'] = $program_details['program'];
		$arr['program_short'] = $program_details['program_short'];
		$arr['short'] = $program_details['short'];
		$arr['date_instituted'] = date('m/d/Y', strtotime($program_details['date_instituted']));
		$arr['type'] = $program_details['type'];
		$arr['vision'] = $program_details['vision'];
		$arr['goals'] = $program_details['goals'];
		
		echo json_encode($arr);
		exit();
	}

	/**
	 * Get user details
	 */
	public function action_user_details()
	{
		$user = new Model_User;

		$user_ID = $this->request->post('user_ID');
		$user_details = $user->get_details($user_ID, NULL);

		$arr = array();
		$arr['user_ID'] = $user_ID;
		$arr['empcode'] = $user_details['employee_code'];
		$arr['fname'] = $user_details['first_name'];
		$arr['mname'] = $user_details['middle_name'];
		$arr['lname'] = $user_details['last_name'];
		$arr['birthday'] = date('m/d/Y', strtotime($user_details['birthday']));

		if ($user_details['user_type'] == 'Faculty')
		{
			$arr['fcode'] = $user_details['faculty_code'];
			$arr['rank'] = $user_details['rank'];
			$arr['program_ID'] = $user_details['program_ID'];
			$arr['position'] = $user_details['position'];
		}
		
		echo json_encode($arr);
		exit();
	}

	/**
	 * Get targets based on category
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
