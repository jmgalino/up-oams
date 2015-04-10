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
		$oams = new Model_Oams;
		
		$post = $this->request->post();
		$key = $this->request->param('id');
		$unique = TRUE;

		switch ($key)
		{
			case 'new_user':
			case 'edit_user':
				$table = 'user_profiletbl';
				$exclude = array('title', 'first_name', 'middle_name', 'last_name', 'suffix', 'user_type',
					'faculty_code', 'program_ID', 'rank', 'position', 'birthday', 'pic', 'deleted');
				$strict = FALSE;
				$max = ($key == 'new_user' ? 0 : 1);
				break;

			case 'new_college':
			case 'edit_college':
				$table = 'univ_collegetbl';
				$exclude = ($this->request->post('user_ID') ? array() : array('user_ID'));
				$strict = FALSE;
				$max = ($key == 'new_college' ? 0 : 1);
				break;

			case 'new_department':
			case 'edit_department':
				$table = 'univ_departmenttbl';
				$exclude = ($this->request->post('user_ID') ? array('college_ID') : array('college_ID', 'user_ID'));
				$strict = FALSE;
				$max = ($key == 'new_department' ? 0 : 1);
				break;

			case 'new_program':
			case 'edit_program':
				$table = 'univ_programtbl';
				$exclude = array('college_ID', 'department_ID', 'type', 'date_instituted', 'vision', 'goals');
				$strict = FALSE;
				$max = ($key == 'new_program' ? 0 : 1);
				break;

			case 'new_output':
			case 'edit_output':
				$table = 'opcr_outputtbl';
				$exclude = array('output_ID', 'accountable', 'actual_accom', 'r_quantity', 'r_efficiency', 'r_timeliness', 'remarks');
				$strict = TRUE;
				$max = ($key == 'new_output' ? 0 : 1);
				
				$post['indicators'] = ($post['indicators'] != ''
					? $post['indicators']
					: 'Targets: '.$post['targets'].' Measures: '.$post['measures']);
				
				unset($post['targets'], $post['measures']);
				break;
		}

		$record = $oams->unique_record($post, $table, $exclude, $strict);

		if (count($record) > $max)
			$unique = FALSE;

		if ($key == 'edit_output')
		{
			foreach ($record as $duplicate)
			{
				if ($duplicate['output_ID'] != $post['output_ID'])
				{
					$unique = FALSE;
					break;
				}
			}
		}

		
		echo $unique;
	}

	/**
	 * Get education details
	 */
	public function action_education_details()
	{
		$user = new Model_User;

		$education_ID = $this->request->post('education_ID');
		$education_details = $user->get_education_details($education_ID);
		echo json_encode($education_details);
		exit();
	}

	/**
	 * Get college details
	 */
	public function action_college_details()
	{
		$univ = new Model_Univ;

		$college_ID = $this->request->post('college_ID');
		$college_details = $univ->get_college_details($college_ID, NULL);
		echo json_encode($college_details);
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
	 * Get users based on college
	 */
	public function action_college_users()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$college_ID = $this->request->post('college_ID');
		$programIDs = $univ->get_college_programIDs($college_ID);
		$users = ($programIDs ? $user->get_user_group($programIDs, NULL) : NULL);
		$college_details = $univ->get_college_details($college_ID, NULL);

		$arr = array();
		if ($users)
		{
			foreach ($users as $user)
	        {
	        	$tmp['optionValue'] = $user['user_ID'];
	        	$tmp['optionText'] = $user['first_name'].' '.$user['middle_name'][0].'. '.$user['last_name'];
	        	$tmp['optionSelect'] = ($college_details['user_ID'] == $user['user_ID'] ? TRUE : FALSE);
	        	$arr[] = $tmp;
	        }
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
		echo json_encode($department_details);
		exit();
	}

	/**
	 * Get users based on department
	 */
	public function action_department_users()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$department_ID = $this->request->post('department_ID');
		$programIDs = $univ->get_department_programIDs($department_ID);
		$users = ($programIDs ? $user->get_user_group($programIDs, NULL) : NULL);
		$department_details = $univ->get_department_details($department_ID, NULL);

		$arr = array();
		if ($users)
		{
			foreach ($users as $user)
	        {
	        	$tmp['optionValue'] = $user['user_ID'];
	        	$tmp['optionText'] = $user['first_name'].' '.$user['middle_name'][0].'. '.$user['last_name'];
	        	$tmp['optionSelect'] = ($department_details['user_ID'] == $user['user_ID'] ? TRUE : FALSE);
	        	$arr[] = $tmp;
	        }
		}

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
			$tmp['update'] = '<a class="btn btn-default" id="updateProgram" key="'.$program['program_ID'].'" data-toggle="modal" data-target="#modal_program" href="" url="'.URL::site('admin/university/update/program').'" ajax-url="'.URL::site('ajax/program_details').'" validate-url="'.URL::site('ajax/unique/edit_program').'">
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
	 * Get announcement details
	 */
	public function action_announcement_details()
	{
		$oams = new Model_Oams;

		$announcement_ID = $this->request->post('announcement_ID');
		$announcement_details = $oams->get_announcement_details($announcement_ID);
		echo json_encode($announcement_details);
		exit();
	}	

	/**
	 * Get message details
	 */
	public function action_message_details()
	{
		$oams = new Model_Oams;

		$message_ID = $this->request->post('message_ID');
		$message_details = $oams->get_message_details($message_ID);
		$oams->update_message(array('message_ID'=>$message_ID, 'seen'=>'1'));

		$arr = array();
		$arr['sender'] = $message_details['name'].' ('.$message_details['contact'].')';
		$arr['subject'] = $message_details['subject'];
		$arr['date'] = date('F d, Y \a\t H:i A', strtotime($message_details['date']));
		$arr['message'] = $message_details['message'];
		$arr['read'] = ($message_details['seen']
			? '<a class="link-reverse" href="'.URL::site('admin/unread/'.$message_details['message_ID']).'"><span class="glyphicon glyphicon-eye-close"></span> Mark as Unread</a>'
			: '<a class="link-reverse" href="'.URL::site('admin/read/'.$message_details['message_ID']).'"><span class="glyphicon glyphicon-eye-open"></span> Mark as Read</a>');
		$arr['star'] = ($message_details['star']
			? '<a class="link-reverse" href="'.URL::site('admin/remove_star/'.$message_details['message_ID']).'"><span class="glyphicon glyphicon-star-empty"></span> Remove Star</a>'
			: '<a class="link-reverse" href="'.URL::site('admin/star/'.$message_details['message_ID']).'"><span class="glyphicon glyphicon-star"></span> Add Star</a>');
		$arr['delete'] = '<a class="link-reverse" onclick="return confirm(\'Are you sure you want to delete this message?\')" href="'.URL::site('admin/archive/'.$message_details['message_ID']).'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';

		echo json_encode($arr);
		exit();
	}

	/**
	 * Get accom details
	 */
	public function action_accom_details()
	{
		$accom = new Model_Accom;

		$type = $this->request->param('id');
		$accom_ID = $this->request->post('accom_ID');
		$accom_specID = $this->request->post('accom_specID');
		$accom_details = $accom->get_accom_details($accom_ID, $accom_specID, $type);
		
		// Format dates
		foreach ($accom_details as $key => $value)
		{
			// Check if date (in format)
			if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value))
				$accom_details[$key] = date('d F Y', strtotime($value));
		}
		
		// Convert attachments array into html <img> strings
		$tmp = '';
		$count = 0;
		$arr = ($accom_details['attachment'] ? explode(' ', $accom_details['attachment']) : NULL);
		if ($arr)
		{
			foreach ($arr as $filename)
			{
				$tmp .= '<img src="'.URL::base().'files/upload_attachments/'.$filename.'" class="file-preview-image"> ';
				$count++;
			}
		}
		// $accom_details['attachmentCount'] = ($count > 1 ? $count.' files selected' : $count.' file selected');
		$accom_details['attachment'] = $tmp;

		echo json_encode($accom_details);
		exit();
	}

	/**
	 * Check if date range is valid
	 */
	public function action_check_date()
	{
		$post = $this->request->post();

		if (array_key_exists('start', $post))
		{
			if (strtotime($post['start']) <= strtotime($post['end']))
				echo TRUE;
			else
				echo 'Dates are invalid.';
		}
	}

	/**
	 * Get outputs based on category
	 */
	public function action_category_outputs()
	{
		$opcr = new Model_Opcr;

		$category_ID = $this->request->post('category_ID');
		$opcr_ID = $this->request->post('opcr_ID');
		$outputs = $opcr->get_category_outputs($opcr_ID, $category_ID);

        echo json_encode($outputs);
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
        	$tmp['target_ID'] = $target['target_ID'];
        	$tmp['target_details'] = $target['target'];
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
		$target_details['actual_accom'] .= '';
		echo json_encode($target_details);
		exit();
	}

	/**
	 * Get output details
	 */
	public function action_output_details()
	{
		$opcr = new Model_Opcr;

		$output_ID = $this->request->post('output_ID');
		$output_details = $opcr->get_output_details($output_ID);

		$style1 = strpos($output_details['indicators'], 'Targets:');
		if ($style1 !== FALSE)
		{
			list($indicator, $imeasures) = explode('Measures:', $output_details['indicators']);
			list($nothingness, $itargets) = explode('Targets:', $indicator);
			$output_details['targets'] = $itargets;
			$output_details['measures'] = $imeasures;
			$output_details['indicators'] = NULL;
		}

		echo json_encode($output_details);
		exit();
	}

} // End Ajax
