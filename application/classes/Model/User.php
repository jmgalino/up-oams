<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model {

	/**
	 * Used by Contoller_Site
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
	 * Used by Everyone
	 */
	public function get_details($user_ID, $employee_code)
 	{
 		$details = array();

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

		foreach ($result as $detail)
		{
			$details[] = $detail;
		}

 		return $details;
 	}

 	public function update_details($employee_code, $details)
 	{
 		$rows_updated = DB::update('user_profiletbl')
 			->set($details)
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
 	}

 	public function change_password($employee_code, $password)
 	{}

 	/**
	 * Used by Contoller_Admin
	 */
	public function get_users()
 	{
    	$users = array();

    	$result = DB::select()
		->from('user_profiletbl')
		->where('deleted', '=', '0')
 		->execute()
 		->as_array();
	 	
		foreach ($result as $user)
		{
			$users[] = $user;
		}

 		return $users;
 	}

 	public function get_user_group($programIDs, $exclude)
 	{
 		$users = array();

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

		foreach ($result as $user)
		{
			$users[] = $user;
		}

 		return $users;
 	}

 	public function get_old_publications($user_ID)
 	{}

 	public function get_old_researches($user_ID)
 	{}


 	public function add_user($details)
 	{
 		// Check User
 		$result = $this->get_details($details['employee_code']);

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

 	public function add_old_accom($key, $details)
 	{}

 	public function delete_old_accom($key, $accom_ID)
 	{}

 	// public function update_profile($employee_code, $details)
 	// {}

 	public function reset_password($employee_code)
 	{
 		$rows_updated = DB::update('user_logintbl')
 			->set(array('password' => password_hash('upmin', PASSWORD_DEFAULT)))
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
 	}

 	public function delete_profile($employee_code)
 	{
 		$rows_deleted = DB::update('user_profiletbl')
 			->set(array('deleted' => '1'))
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
 	}

 	private function update_session()
 	{}
	
} // End User