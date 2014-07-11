<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model {

	public function check_user($employee_code, $password)
	{
		$query = DB::select('user_ID')
			->from('usertbl')
			->where('employee_code', '=', $employee_code)
			->where('password', '=', $password);
		return $query->execute();
	}

	public function get_details($user_ID)
 	{
 		$query = DB::select()
			->from('user_profiletbl')
	 		->where('user_ID', '=', $user_ID);
 		return $query->execute()->as_array();
 	}

	
} // End User