<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Univ extends Model {

	/**
	 * Get university
	 */
	public function get_university()
	{
		$result = DB::select('value')
			->from('univtbl')
			->where('name', '=', 'university')
			->execute()
			->as_array();

		return $result[0]['value'];
	}

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
 		else return FALSE;
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
 		else return FALSE;
	}

	/**
	 * Get colleges
	 */
	public function get_colleges()
	{
		$colleges = DB::select('univ_collegetbl.*',
			'user_profiletbl.first_name', 'user_profiletbl.middle_name', 'user_profiletbl.last_name')
			->from('univ_collegetbl')
			->join('user_profiletbl', 'LEFT')
			->on('univ_collegetbl.user_ID', '=', 'user_profiletbl.user_ID')
			->order_by('college')
			->execute()
			->as_array();

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
 			$college_ID = $program['college_ID'];
 		}
		
		$details = DB::select('univ_collegetbl.*',
			'user_profiletbl.title', 'user_profiletbl.first_name', 'user_profiletbl.middle_name', 'user_profiletbl.last_name', 'user_profiletbl.suffix')
			->from('univ_collegetbl')
			->join('user_profiletbl', 'LEFT')
			->on('univ_collegetbl.user_ID', '=', 'user_profiletbl.user_ID')
			->where('college_ID', '=', $college_ID)
			->execute()
			->as_array();

 		return $details[0];
 	}

	/**
	 * New college
	 */
	public function add_college($details)
 	{
 		$insert_profile = DB::insert('univ_collegetbl')
 			->columns(array_keys($details))
 			->values($details)
 			->execute();

 		if ($insert_profile[1] == 1) return $details['short'].' was successfully added.';
 		else return FALSE;
 	}

	/**
	 * Update college
	 */
	public function update_college($details)
 	{
 		$rows_updated = DB::update('univ_collegetbl')
 			->set($details)
 			->where('college_ID', '=', $details['college_ID'])
 			->execute();

 		if ($rows_updated == 1) return (array_key_exists('short', $details) ? $details['short'].' was successfully updated.' : TRUE);
 		elseif ($rows_updated == 0) return 'No changes were made.';
 		else return FALSE;
 	}

	/**
	 * Get departments by college
	 */
	public function get_college_departments($college_ID)
	{
		$departments = DB::select()
			->from('univ_departmenttbl')
			->where('college_ID', '=', $college_ID)
			->execute()
			->as_array();

		return $departments;
	}

	/**
	 * Get departments
	 */
	public function get_departments()
	{
		$departments = DB::select('univ_departmenttbl.*', 'univ_collegetbl.college',
			'user_profiletbl.first_name', 'user_profiletbl.middle_name', 'user_profiletbl.last_name')
			->from('univ_departmenttbl')
			->join('univ_collegetbl')
			->on('univ_departmenttbl.college_ID', '=', 'univ_collegetbl.college_ID')
			->join('user_profiletbl', 'LEFT')
			->on('univ_departmenttbl.user_ID', '=', 'user_profiletbl.user_ID')
			->order_by('department')
			->execute()
			->as_array();

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
 			$department_ID = $program['department_ID']; echo $program['department_ID'];
 		}
		
		$details = DB::select('univ_departmenttbl.*', 'univ_collegetbl.college',
			'user_profiletbl.title', 'user_profiletbl.first_name', 'user_profiletbl.middle_name', 'user_profiletbl.last_name', 'user_profiletbl.suffix')
			->from('univ_departmenttbl')
			->join('univ_collegetbl')
			->on('univ_departmenttbl.college_ID', '=', 'univ_collegetbl.college_ID')
			->join('user_profiletbl', 'LEFT')
			->on('univ_departmenttbl.user_ID', '=', 'user_profiletbl.user_ID')
			->where('univ_departmenttbl.department_ID', '=', $department_ID)
			->execute()
			->as_array();

 		return ($details ? $details[0] : FALSE); // To check for non-existing departments i.e. SOM
 	}

	/**
	 * New department
	 */
	public function add_department($details)
 	{
 		$insert_profile = DB::insert('univ_departmenttbl')
 			->columns(array_keys($details))
 			->values($details)
 			->execute();

 		if ($insert_profile[1] == 1) return $details['short'].' was successfully added.';
 		else return FALSE;
 	}

	/**
	 * Update department
	 */
	public function update_department($details)
 	{
 		$rows_updated = DB::update('univ_departmenttbl')
 			->set($details)
 			->where('department_ID', '=', $details['department_ID'])
 			->execute();

 		if ($rows_updated == 1) return (array_key_exists('short', $details) ? $details['short'].' was successfully updated.' : TRUE);
 		elseif ($rows_updated == 0) return 'No changes were made.';
 		else return FALSE;
 	}

	/**
	 * Get programs (by college)
	 */
	public function get_college_programIDs($college_ID)
	{
		$programIDs = DB::select('program_ID')
			->from('univ_programtbl')
			->where('college_ID', '=', $college_ID)
			->execute()
			->as_array();

		return $programIDs;
	}

	/**
	 * Get programs (by department)
	 */
	public function get_department_programIDs($department_ID)
	{
		$programIDs = DB::select('program_ID')
			->from('univ_programtbl')
			->where('department_ID', '=', $department_ID)
			->execute()
			->as_array();

		return $programIDs;
	}
 	
	/**
	 * Get programs
	 */
	public function get_programs()
	{
		$programs = DB::select('univ_programtbl.*',
			'univ_departmenttbl.department', 'univ_collegetbl.college')
			->from('univ_programtbl')
			->join('univ_departmenttbl', 'LEFT')
			->on('univ_programtbl.department_ID', '=', 'univ_departmenttbl.department_ID')
			->join('univ_collegetbl')
			->on('univ_programtbl.college_ID', '=', 'univ_collegetbl.college_ID')
			->order_by('univ_collegetbl.college')
			->order_by('univ_departmenttbl.department')
			->order_by('program_short')
			->execute()
			->as_array();

		return $programs;
	}

	/**
	 * Get program details
	 */
	public function get_program_details($program_ID)
 	{
 		$details = DB::select()
 			->from('univ_programtbl')
 			->where('program_ID', '=', $program_ID)
 			->execute()
 			->as_array();

 		if ($details[0]['department_ID'])
 			$details = DB::select('univ_programtbl.*',
				'univ_departmenttbl.department', 'univ_collegetbl.college')
				->from('univ_programtbl')
				->join('univ_departmenttbl')
				->on('univ_programtbl.department_ID', '=', 'univ_departmenttbl.department_ID')
				->join('univ_collegetbl')
				->on('univ_programtbl.college_ID', '=', 'univ_collegetbl.college_ID')
	 			->where('univ_programtbl.program_ID', '=', $program_ID)
				->execute()
				->as_array();

		return $details[0];
 	}

	/**
	 * New program
	 */
	public function add_program($details)
 	{
 		$insert_profile = DB::insert('univ_programtbl')
 			->columns(array_keys($details))
 			->values($details)
 			->execute();

 		if ($insert_profile[1] == 1) return $details['short'].' was successfully added.';
 		else return FALSE;
 	}

	/**
	 * Update program
	 */
	public function update_program($details)
 	{
 		$rows_updated = DB::update('univ_programtbl')
 			->set($details)
 			->where('program_ID', '=', $details['program_ID'])
 			->execute();

 		if ($rows_updated == 1) return $details['short'].' was successfully updated.';
 		else return FALSE;
 	}
	
} // End Univ