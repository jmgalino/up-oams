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
 			$result = DB::select()
				->from('user_profiletbl')
				->where('user_ID', '=', $user_ID)
		 		->execute()
		 		->as_array();
		 }
 		else
 		{
 			$result = DB::select()
				->from('user_profiletbl')
				->where('employee_code', '=', $employee_code)
		 		->execute()
		 		->as_array();
 		}

 		$details = array();
		foreach ($result as $detail)
		{
			$details[] = $detail;
		}

 		return $details;
 	}

 	/**
	 * Get users
	 */
	public function get_users()
 	{
    	$result = DB::select()
		->from('user_profiletbl')
		->where('deleted', '=', '0')
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
 		// Check User
 		$result = $this->get_details(NULL, $details['employee_code']);

 		if ($result)
 		{
 			// Existing User
 			// Deleted User
 		}
 		else
 		{
 			foreach ($details as $column => $value)
 			{
				$columns[] = $column;
				$values[] = $value;
			}
 			
 			$insert_profile = DB::insert('user_profiletbl')
	 			->columns($columns)
	 			->values($values)
	 			->execute();
 			$insert_login = DB::insert('user_logintbl')
 				->columns(array('user_ID', 'employee_code', 'password'))
 				->values(array($insert_profile[0], $details['employee_code'], password_hash('upmin', PASSWORD_DEFAULT)))
 				->execute();

 			if ($details['position'] == 'dean')
 			{
 				$college_details = array("user_ID" => $insert_profile[0]);

 				$univ = new Model_Univ;
 				$college = $univ->get_college_details(null, $details['program_ID']);
 				$success = $univ->update_college_details($college[0]['college_ID'], $college_details);
 			}
 			elseif ($details['position'] == 'dept_chair')
 			{
 				$department_details = array("user_ID" => $insert_profile[0]);

 				$univ = new Model_Univ;
 				$department = $univ->get_department_details(null, $details['program_ID']);
 				$success = $univ->update_department_details($department[0]['department_ID'], $department_details);	
 			}

 			// if ($sucess)
 			// 	// yay
 			// else
 			// 	// nay
 		}
 	}

 	/**
	 * Update user details
	 */
	public function update_details($employee_code, $details)
 	{
 		$rows_updated = DB::update('user_profiletbl')
 			->set($details)
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
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
	public function reset_password($employee_code)
 	{
 		$rows_updated = DB::update('user_logintbl')
 			->set(array('password' => password_hash('upmin', PASSWORD_DEFAULT)))
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
 	}

 	/**
	 * Archive/Delete user
	 */
	public function delete_profile($employee_code)
 	{
 		$user_details = $this->get_details(NULL, $employee_code)[0];

 		// Archive
 		if ($user_details['deleted'] == 0)
 		{
 			$rows_deleted = DB::update('user_profiletbl')
	 			->set(array('deleted' => '1'))
	 			->where('employee_code', '=', $employee_code)
	 			->execute();
 		}
 		// Delete
 		else
 		{

 		}

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
 	}

 	/**
	 * Get publications (pre-)OAMS
	 */
	// public function get_publications($user_ID)
 	// {}

 	/**
	 * Get research (pre-)OAMS
	 */
	// public function get_research($user_ID)
 	// {}

 	/**
	 * New (pre-)OAMS publication 
	 */
	// public function add_accom($key, $details)
 	// {}

 	/**
	 * New (pre-)OAMS research 
	 */
	// public function delete_accom($key, $accom_ID)
 	// {}
	
} // End User