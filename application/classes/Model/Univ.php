<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Univ extends Model {

	/**
	 * Get mission
	 */
	public function get_mission()
	{
		$result = DB::select('value')
			->from('univtbl')
			->where('name', '=', 'mission')
			->execute()
			->as_array();

		return $result[0]['value'];
	}

	/**
	 * Update mission
	 */
	public function update_mission($mission)
	{
		$rows_updated = DB::update('univtbl')
 			->set(array('value' => $mission))
			->where('name', '=', 'mission')
 			->execute();

 		if ($rows_updated == 1) return 'Mission was successfully updated.';
 		else return FALSE; //do something
	}

	/**
	 * Get vision
	 */
	public function get_vision()
	{
		$result = DB::select('value')
			->from('univtbl')
			->where('name', '=', 'vision')
			->execute()
			->as_array();

		return $result[0]['value'];
	}

	/**
	 * Update vision
	 */
	public function update_vision($vision)
	{
		$rows_updated = DB::update('univtbl')
 			->set(array('value' => $vision))
			->where('name', '=', 'vision')
 			->execute();

 		if ($rows_updated == 1) return 'Vision was successfully updated.';
 		else return FALSE; //do something
	}

	/**
	 * Get colleges
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

	/**
	 * Get college details
	 */
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

	/**
	 * Update college details
	 */
	public function update_college_details($college_ID, $details)
 	{
 		$rows_updated = DB::update('univ_collegetbl')
 			->set($details)
 			->where('college_ID', '=', $college_ID)
 			->execute();

 		return $rows_updated;
 	}

	/**
	 * Get programs (by college)
	 */
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
	 * Get departments
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

	/**
	 * Get department details
	 */
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
	 * Update department details
	 */
	public function update_department_details($department_ID, $details)
 	{
 		$rows_updated = DB::update('univ_departmenttbl')
 			->set($details)
 			->where('department_ID', '=', $department_ID)
 			->execute();

 		return $rows_updated;
 	}

	/**
	 * Get programs (by department)
	 */
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
	 * Get programs
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

	/**
	 * Get program details
	 */
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