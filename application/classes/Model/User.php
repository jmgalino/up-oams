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

 		return ($details ? $details[0] : FALSE); // To check for non-existing users
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
			->order_by('first_name')
	 		->execute()
	 		->as_array();
    	}
		else
		{
			$result = DB::select()
			->from('user_profiletbl')
			->where('program_ID', 'IN', $programIDs)
			->where('deleted', '=', '0')
			->order_by('first_name')
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
	public function add_user($user_details)
 	{
 		$success = FALSE;

 		$insert_profile = DB::insert('user_profiletbl')
			->columns(array_keys($user_details))
			->values($user_details)
			->execute();
		$insert_login = DB::insert('user_logintbl')
			->columns(array('user_ID', 'employee_code', 'password'))
			->values(array($insert_profile[0], $user_details['employee_code'], password_hash('upmin', PASSWORD_DEFAULT)))
			->execute();

		$positions = array('dean', 'dept_chair');
		if (in_array($user_details['position'], $positions))
		{
			$user_details['user_ID'] = $insert_profile[0];
			$update = $this->update_univ($user_details);
			$success = ($insert_profile[1] == 1 AND $insert_login[1] == 1 AND $update ? TRUE : FALSE);
		}
		elseif ($insert_profile[1] == 1 AND $insert_login[1] == 1 )
			$success = TRUE;

		return $success;
 	}

 	/**
	 * Update user details
	 */
	public function update_details($new_details)
 	{
 		$user_details = $this->get_details($new_details['user_ID'], NULL);
 		
 		$profile_updated = DB::update('user_profiletbl')
 			->set($new_details)
 			->where('user_ID', '=', $new_details['user_ID'])
 			->execute();

		// Profile update
 		$success = ($profile_updated == 1 ? TRUE : ($profile_updated == 0 ? 'No changes were made.' : FALSE));

 		// Login update
 		if (array_key_exists('employee_code', $new_details) AND $new_details['employee_code'] != $user_details['employee_code'])
 		{
 			$login_updated = DB::update('user_logintbl')
	 			->set(array('employee_code'=>$new_details['employee_code']))
	 			->where('user_ID', '=', $new_details['user_ID'])
	 			->execute();

	 		$success = ($login_updated ? $success : FALSE);
 		}
		

 		if ($success === TRUE) return (array_key_exists('first_name', $new_details) ? $new_details['first_name'] : $user_details['first_name']).'\'s profile was successfully updated.';
 		else return $success;
 	}

 	/**
	 * Get user educational background
	 */
	public function get_education($user_ID)
 	{
 		$education = DB::select()
 			->from('user_educationtbl')
 			->where('user_ID', '=', $user_ID)
 			->order_by('year', 'DESC')
			->execute()
			->as_array();
		
		return $education;
 	}

 	/**
	 * Get educational background details
	 */
	public function get_education_details($education_ID)
 	{
 		$education = DB::select()
 			->from('user_educationtbl')
 			->where('education_ID', '=', $education_ID)
			->execute()
			->as_array();
		
		return $education[0];
 	}

 	/**
	 * New educational attainment
	 */
	public function add_education($education_details)
 	{
 		$success = FALSE;
 		$user_details = $this->get_details($education_details['user_ID'], NULL);

 		$insert_education = DB::insert('user_educationtbl')
			->columns(array_keys($education_details))
			->values($education_details)
			->execute();

		if ($insert_education[1] == 1) $success = $user_details['first_name'].'\'s educational background was successfully updated.';
		return $success;
 	}

 	public function update_education($education_details)
 	{
 		$success = FALSE;

 		$education_updated = DB::update('user_educationtbl')
 			->set($education_details)
 			->where('education_ID', '=', $education_details['education_ID'])
 			->execute();

 		if ($education_updated) $success = TRUE;
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
 		else return FALSE;
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