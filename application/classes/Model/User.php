<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_User extends Model {

	public function get_users()
	{
		$query = DB::select()->from('usertbl');
		$result = $query->execute();
		echo print_r($result);
	}
} // End User