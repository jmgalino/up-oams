<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Accom extends Model {

	public function get_all_accom($user_ID, $filter)
	{
		$accom_reports = array();

		if (count($filter) > 0)
    	{}
		else
		{
			$result = DB::select()
				->from('accomtbl')
				->where('user_ID', '=', $user_ID)
				->execute()
				->as_array();
		}

		foreach ($result as $report)
		{
			$accom_reports[] = $report;
		}

		return $accom_reports;
	}

} // End Accom