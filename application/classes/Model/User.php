<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model {

	/**
	 * Check login details
	 */
	public function check_user($employee_code, $password)
	{
		$result = DB::select()
			->from('user_logintbl')
			->where('employee_code', '=', $employee_code)
			->where('deleted', '=', '0')
			->execute();

		if ((password_verify($password, $result[0]['password'])) AND (count($result) == 1))
			return TRUE;
		else
			return FALSE;
	}

	/**
	 * Get user details
	 */
	public function get_details($user_ID, $employee_code)
 	{
 		// $details = NULL;

 		if ($user_ID)
 		{
 			$details = DB::select()
				->from('user_profiletbl')
				->where('user_ID', '=', $user_ID)
		 		->execute()
		 		->as_array();
		 }
 		elseif ($employee_code)
 		{
 			$details = DB::select()
				->from('user_profiletbl')
				->where('employee_code', '=', $employee_code)
		 		->execute()
		 		->as_array();
 		}

 		return $details[0];//($details ? $details[0] : FALSE);
 	}

 	/**
	 * Get users
	 */
	public function get_users()
 	{
    	$result = DB::select()
		->from('user_profiletbl')
		->where('deleted', '=', '0')
		->order_by('first_name')
 		->execute()
 		->as_array();
	 	
    	$users = array();
		foreach ($result as $user)
		{
			$users[] = $user;
		}

 		return $users;
 	}

 	/**
	 * Get users (by department/college)
	 */
	public function get_user_group($programIDs, $exclude)
 	{
    	if ($exclude)
    	{
			$result = DB::select()
			->from('user_profiletbl')
			->where('program_ID', 'IN', $programIDs)
			->where('position', '!=', $exclude)
			->where('deleted', '=', '0')
	 		->execute()
	 		->as_array();
    	}
		else
		{
			$result = DB::select()
			->from('user_profiletbl')
			->where('program_ID', 'IN', $programIDs)
			->where('deleted', '=', '0')
	 		->execute()
	 		->as_array();
	 	}

 		$users = array();
		foreach ($result as $user)
		{
			$users[] = $user;
		}

 		return $users;
 	}

 	/**
	 * New user
	 */
	public function add_user($details)
 	{
 		$insert_profile = DB::insert('user_profiletbl')
			->columns(array_keys($details))
			->values($details)
			->execute();
		$insert_login = DB::insert('user_logintbl')
			->columns(array('user_ID', 'employee_code', 'password'))
			->values(array($insert_profile[0], $details['employee_code'], password_hash('upmin', PASSWORD_DEFAULT)))
			->execute();

		$positions = array('dean', 'dept_chair');
		if (in_array($details['position'], $positions))
		{
			$update = $this->update_univ($insert_profile[0]);
			$success = ($insert_profile[1] == 1 AND $insert_login[1] == 1 AND $update ? TRUE : FALSE);
		}
		elseif ($insert_profile[1] == 1 AND $insert_login[1] == 1 )
			$success = TRUE;

		if (!$sucess)
		{
			$this->session->set('error', TRUE);
			$this->redirect('admin/profile');
		}
 	}

 	/**
	 * Update user details
	 */
	public function update_details($details)
 	{
 		$positions = array('dean', 'dept_chair');
		$user_details = $this->get_details($details['user_ID'], NULL);
 		
 		$rows_updated = DB::update('user_profiletbl')
 			->set($details)
 			->where('user_ID', '=', $details['user_ID'])
 			->execute();

 		// Profile and univ update
		if (in_array('position', array_keys($details)) AND in_array($details['position'], $positions))
		{
			$update = $this->update_univ($details['user_ID']);
			$success = ($rows_updated == 1 AND $update ? TRUE : FALSE);
		}

		// Profile update
		elseif ($rows_updated == 1)
			$success = TRUE;

		// Update was unnecessary
		elseif (count(array_diff($user_details, $details)) == 2)
			$success = 'none';
		
		// No update was made
		else
			$success = FALSE;

 		if ($success === TRUE) return $user_details['first_name'].'\'s profile was successfully updated.';
 		elseif($success === 'none') return $success;
 		else return FALSE;
 	}

 	/**
	 * Update univ details
	 */
	private function update_univ($user_ID)
 	{
 		$univ = new Model_Univ;
 		$success = NULL;

 		if ($details['position'] == 'dean')
		{	
			$college = $univ->get_college_details(null, $details['program_ID']);
			$success = $univ->update_college(array('college_ID'=>$college['college_ID'], 'user_ID'=>$user_ID));
		}
		elseif ($details['position'] == 'dept_chair')
		{
			$department = $univ->get_department_details(null, $details['program_ID']);
			$success = $univ->update_department(array('department_ID'=>$department['department_ID'], 'user_ID'=>$user_ID));
		}

		return $success;
 	}

 	/**
	 * Check if password match
	 */
	public function check_password($password)
 	{
 		$employee_code = Session::instance()->get('employee_code');
 		return $this->check_user($employee_code, $password);
 	}

 	/**
	 * Update user login details
	 */
	public function change_password($employee_code, $password)
 	{
 		$rows_updated = DB::update('user_logintbl')
 			->set(array('password' => password_hash($password, PASSWORD_DEFAULT)))
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something	
 	}

 	/**
	 * Reset user password
	 */
	public function reset_password($user_ID)
 	{
 		$rows_updated = DB::update('user_logintbl')
 			->set(array('password' => password_hash('upmin', PASSWORD_DEFAULT)))
 			->where('user_ID', '=', $user_ID)
 			->execute();

 		if ($rows_updated == 1) return 'Password was successfully reset.';
 		else return FALSE;
 	}

 	/**
	 * Archive/Delete user
	 */
	public function delete_profile($user_ID)
 	{
 		$user_details = $this->get_details($user_ID, NULL);

 		// Archive
 		if ($user_details['deleted'] == 0)
 		{
 			$rows_deleted = DB::update('user_profiletbl')
	 			->set(array('deleted' => '1'))
	 			->where('user_ID', '=', $user_ID)
	 			->execute();
 		}
 		// Delete
 		else
 		{
 			// $rows_deleted = DB::delete('user_profiletbl')
	 		// 	->where('user_ID', '=', $user_ID)
	 		// 	->execute();
 		}

 		if ($rows_deleted == 1) return 'Profile was successfully deleted.';
 		else return FALSE;
 	}
	
} // End User