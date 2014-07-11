<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Univ extends Model {

	// College

	// Department
	public function get_department_details($department_ID, $program_ID)
 	{
 		if (is_null($department_ID))
 		{
 			$program = $this->get_program_details($program_ID);
 			$department_ID = $program[0]['department_ID'];
 		}
		
		$query = DB::select()
			->from('univ_departmenttbl')
			->where('department_ID', '=', );
 		return $query->execute()->as_array();
 	}
 	
	// Program
	public function get_program_details($program_ID)
 	{
 		$query = DB::select()
 			->from('univ_programtbl')
 			->where('program_ID', '=', $program_ID);
		return $query->execute()->as_array();
 	}
	
} // End Univ