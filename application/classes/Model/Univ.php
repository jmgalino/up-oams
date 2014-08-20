<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Univ extends Model {

	/**
	 * College
	 */
	public function get_colleges()
	{
		$result = DB::select()
			->from('univ_collegetbl')
			->order_by('college')
			->execute()
			->as_array();

		$colleges = array();
		foreach ($result as $college)
		{
			$colleges[] = $college;
		}

		return $colleges;
	}

	public function get_college_details($college_ID, $program_ID)
 	{
 		if (is_null($college_ID))
 		{
 			$program = $this->get_program_details($program_ID);
 			$college_ID = $program[0]['college_ID'];
 		}
		
		$result = DB::select()
			->from('univ_collegetbl')
			->where('college_ID', '=', $college_ID)
			->execute()
			->as_array();

 		return $result;
 	}

	public function update_college_details($college_ID, $details)
 	{
 		$rows_updated = DB::update('univ_collegetbl')
 			->set($details)
 			->where('college_ID', '=', $college_ID)
 			->execute();

 		return $rows_updated;
 	}

	public function get_college_programIDs($college_ID)
	{
		$result = DB::select('program_ID')
			->from('univ_programtbl')
			->where('college_ID', '=', $college_ID)
			->execute()
			->as_array();

		$programIDs = array();
		foreach ($result as $program)
		{
			foreach ($program as $program_ID)
			{
				$programIDs[] = $program_ID;
			}
		}

		return $programIDs;
	}

	/**
	 * Department
	 */
	public function get_departments()
	{
		$result = DB::select()
			->from('univ_departmenttbl')
			->order_by('department')
			->execute()
			->as_array();

		$departments = array();
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

	public function update_department_details($department_ID, $details)
 	{
 		$rows_updated = DB::update('univ_departmenttbl')
 			->set($details)
 			->where('department_ID', '=', $department_ID)
 			->execute();

 		return $rows_updated;
 	}

	public function get_department_programIDs($department_ID)
	{
		$result = DB::select('program_ID')
			->from('univ_programtbl')
			->where('department_ID', '=', $department_ID)
			->execute()
			->as_array();

		$programIDs = array();
		foreach ($result as $program)
		{
			foreach ($program as $program_ID)
			{
				$programIDs[] = $program_ID;
			}
		}

		return $programIDs;
	}
 	
	/**
	 * Degree Program
	 */
	public function get_programs()
	{
		$result = DB::select()
			->from('univ_programtbl')
			->order_by('program_short')
			->execute()
			->as_array();

		$programs = array();
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