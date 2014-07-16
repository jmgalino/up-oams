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
	public function get_details($employee_code)
 	{
 		$details = array();

 		$result = DB::select()
			->from('user_profiletbl')
			->where('employee_code', '=', $employee_code)
	 		->execute()
	 		->as_array();

		foreach ($result as $detail)
		{
			$details[] = $detail;
		}

 		return $details;
 	}

 	public function update_details($user_ID, $details)
 	{}

 	public function change_password($user_ID, $password)
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
			->order_by('employee_code', 'ASC')
	 		->execute()
	 		->as_array();

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

 		if (count($result) == 0)
 		{
 			$columns = array('employee_code', 'first_name', 'middle_initial', 'last_name', 'user_type', 'faculty_code', 'program_ID', 'rank', 'position', 'birthday');
 			
 			for ($i=0; $i < count($columns); $i++)
 			{ 
 				foreach ($details as $key => $value)
 				{
	 				
	 				if ($columns[$i] == $key)
	 					$values[] = $value;
	 			}	
 			}
 			
 			$insert_profile = DB::insert('user_profiletbl')
	 			->columns($columns)
	 			->values($values)
	 			->execute();
 			$insert_login = DB::insert('user_logintbl')
 				->columns(array('user_ID', 'employee_code', 'password'))
 				->values(array($insert_profile[0], $details['employee_code'], password_hash('upmin', PASSWORD_DEFAULT)))
 				->execute();
 		}
 		else
 		{
 			// Existing User
 			// Deleted User
 		}
 	}

 	public function add_old_accom($key, $details)
 	{}

 	public function delete_old_accom($key, $accom_ID)
 	{}

 	public function update_profile($employee_code, $details)
 	{}

 	public function reset_password($employee_code)
 	{
 		$rows_updated = DB::update('user_logintbl')
 			->set(array('password' => password_hash('upmin', PASSWORD_DEFAULT)))
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		return $rows_updated;
 	}

 	public function delete_profile($employee_code)
 	{
 		$rows_deleted = DB::update('user_profiletbl')
 			->set(array('deleted' => '1'))
 			->where('employee_code', '=', $employee_code)
 			->execute();

 		return $rows_deleted;
 	}

 	private function update_session()
 	{}
	
} // End User