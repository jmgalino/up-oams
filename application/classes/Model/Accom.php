<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Accom extends Model {
	
	/**
	 * Faculty
	 */
	public function get_faculty_accom($user_ID, $filter)
	{
		$accom_reports = array();

		if ($filter)
    	{}
		else
		{
			$result = DB::select()
				->from('accomtbl')
				->where('user_ID', '=', $user_ID)
				->order_by('yearmonth', 'ASC')
				->execute()
				->as_array();
		}

		foreach ($result as $report)
		{
			$accom_reports[] = $report;
		}

		return $accom_reports;
	}

	// /**
	//  * Department
	//  */
	// public function get_department_accom($user_ID, $filter)
	// {}
	
	// /**
	//  * College
	//  */
	// public function get_college_accom($user_ID, $filter)
	// {}

	public function get_details($accom_ID)
	{
		$result = DB::select()
			->from('accomtbl')
			->where('accom_ID', '=', $accom_ID)
	 		->execute()
	 		->as_array();

		foreach ($result as $detail)
		{
			$details[] = $detail;
		}

 		return $details;
	}

	public function initialize($details)
	{
		// Check
		$result = DB::query(Database::SELECT, 'SELECT * FROM accomtbl WHERE user_ID = :user_ID AND DATE_FORMAT(yearmonth, \'%Y %m\') = DATE_FORMAT(:yearmonth, \'%Y %m\')')
			->bind(':user_ID', $details['user_ID'])
		    ->bind(':yearmonth', $details['yearmonth'])
		    ->execute()
			->as_array();

		// Existing
		if ($result)
 		{
 			if (($result[0]['status'] == 'Approved') OR ($result[0]['status'] == 'Pending'))
 			{
 				return FALSE;
 			}
 			else
 			{
 				return $result[0]['accom_ID'];
 			}
 		}
 		else
 		{
 			foreach ($details as $column_name => $value) {
 				$columns[] = $column_name;
				$values[] = $value;
			}// print_r($values);

 			$insert_accom = DB::insert('accomtbl')
	 			->columns($columns)
	 			->values($values)
	 			->execute();

	 		return $insert_accom[0];
 		}
	}

	public function submit($details) //$accom_ID, $path, $date, $identifier)
	{}

	public function evaluate($accom_ID, $details, $identifier)
	{}

	public function delete($accom_ID)
	{
		$row_deleted = DB::delete('accomtbl')
			->where('accom_ID', '=', $accom_ID)
	 		->execute();

	 	return $row_deleted;	
	}

	public function find_accom($user_ID, $accom_ID, $type)
	{}

	public function add_accom($user_ID, $accom_ID, $details, $type)
	{}

	public function edit_accom($user_ID, $accom_ID, $details, $type)
	{}

	public function delete_accom($user_ID, $accom_ID, $details, $type)
	{}

	private function unlink_accom($user_ID, $accom_ID, $details, $type)
	{}

} // End Accom