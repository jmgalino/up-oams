<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model {

	// Site
	public function check_user($employee_code, $password)
	{
		$query = DB::select('user_ID')
			->from('user_logintbl')
			->where('employee_code', '=', $employee_code)
			->where('password', '=', $password);
		return $query->execute();
	}

	// User
	public function get_details($user_ID)
 	{
 		$query = DB::select()
			->from('user_profiletbl')
	 		->where('user_ID', '=', $user_ID);
 		return $query->execute()->as_array();
 	}

 	public function update_details($user_ID, $details)
 	{

 	}

 	public function change_password($user_ID, $password)
 	{

 	}

 	// Admin
 	public function get_users()
 	{
    	$query = DB::select()
			->from('user_profiletbl')
			->where('deleted', '=', '0')
			->order_by('last_name', 'ASC');
		$result = $query->execute()->as_array();

		$users = null;
		foreach ($result as $user) {
			$users[] = $user;
		}

 		return $users;
 	}

 	public function get_old_publications($user_ID)
 	{}

 	public function get_old_researches($user_ID)
 	{}

 	public function add_user($details)
 	{}

 	public function add_old_accom($key, $details)
 	{}

 	public function delete_old_accom($key, $accom_ID)
 	{}

 	public function reset_password($user_ID)
 	{}

 	public function delete_user($user_ID)
 	{}

 	private function update_session()
 	{}
	
} // End User