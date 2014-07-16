<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Univ extends Model {

	/**
	 * College
	 */
	public function get_colleges()
	{
		$colleges = array();

		$result = DB::select()
			->from('univ_collegetbl')
			->execute()
			->as_array();

		foreach ($result as $college)
		{
			$colleges[] = $college;
		}

		return $colleges;
	}

	/**
	 * Department
	 */
	public function get_departments()
	{
		$departments = array();

		$result = DB::select()
			->from('univ_departmenttbl')
			->execute()
			->as_array();

		foreach ($result as $department)
		{
			$departments[] = $department;
		}

		return $departments;
	}

	public function get_department_details($department_ID, $program_ID)
 	{
 		if (is_null($department_ID))
 		{
 			$program = $this->get_program_details($program_ID);
 			$department_ID = $program[0]['department_ID'];
 		}
		
		$result = DB::select()
			->from('univ_departmenttbl')
			->where('department_ID', '=', $department_ID)
			->execute()
			->as_array();

 		return $result;
 	}
 	
	/**
	 * Degree Program
	 */
	public function get_programs()
	{
		$programs = array();

		$result = DB::select()
			->from('univ_programtbl')
			->execute()
			->as_array();

		foreach ($result as $program)
		{
			$programs[] = $program;
		}

		return $programs;
	}

	public function get_program_details($program_ID)
 	{
 		$result = DB::select()
 			->from('univ_programtbl')
 			->where('program_ID', '=', $program_ID)
			->execute()
			->as_array();

		return $result;
 	}
	
} // End Univ