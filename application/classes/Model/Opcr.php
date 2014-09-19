<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Opcr extends Model {

	/**
	 * Get forms (by faculty)
	 */
	public function get_faculty_opcr($user_ID)
	{
		$result = DB::select()
			->from('opcrtbl')
			->where('user_ID', '=', $user_ID)
			->execute()
			->as_array();
	
		$opcr_forms = array();
		foreach ($result as $form)
		{
			$opcr_forms[] = $form;
		}

		return $opcr_forms;
	}

	/**
	 * Get forms (foreach department - as template for faculty)
	 */
	public function get_department_opcr($user_ID)
	{
		$user = new Model_User;
		$univ = new Model_Univ;

		$program = $user->get_details($user_ID, NULL);
		$department = $univ->get_department_details(NULL, $program['program_ID']);

		$result = DB::select()
			->from('opcrtbl')
			->where('user_ID', '=', $department['user_ID'])
			->where('status', '=', 'Published')
			->execute()
			->as_array();
	
		$opcr_forms = array();
		foreach ($result as $form)
		{
			$opcr_forms[] = $form;
		}

		return $opcr_forms;
	}

	/**
	 * Get forms (by college)
	 */
	// public function get_group_opcr($userIDs)
	// {}

	/**
	 * Get form details
	 */
	public function get_details($opcr_ID)
	{
		$details = DB::select()
			->from('opcrtbl')
			->where('opcr_ID', '=', $opcr_ID)
	 		->execute()
	 		->as_array();

		return $details[0];
	}

	/**
	 * Create new form
	 */
	public function initialize($details)
	{
		// Check
		$result = DB::query(Database::SELECT, 'SELECT * FROM opcrtbl WHERE user_ID = :user_ID
			AND DATE_FORMAT(period_from, \'%Y %m\') = DATE_FORMAT(:period_from, \'%Y %m\')
			AND DATE_FORMAT(period_to, \'%Y %m\') = DATE_FORMAT(:period_to, \'%Y %m\')')
			->bind(':user_ID', $details['user_ID'])
		    ->bind(':period_from', $details['period_from'])
		    ->bind(':period_to', $details['period_to'])
		    ->execute()
			->as_array();

		// Existing
		if ($result)
 		{
 			if (($result[0]['status'] == 'Checked') OR ($result[0]['status'] == 'Accepted') OR ($result[0]['status'] == 'Pending') OR ($result[0]['status'] == 'Published'))
 			{
 				return 'OPCR Form is locked for editing.';
 			}
 			else
 			{
 				return array('opcr_ID' => $result[0]['opcr_ID'], 'message' => 'This form has been generated.');
 			}
 		}
 		else
 		{
 			$insert_opcr = DB::insert('opcrtbl')
	 			->columns(array_keys($details))
	 			->values($details)
	 			->execute();

	 		return $insert_opcr[0];
 		}
	}

	/**
	 * Submit form
	 */
	public function submit($opcr_ID, $details)
	{
		$rows_updated = DB::update('opcrtbl')
 			->set($details)
 			->where('opcr_ID', '=', $opcr_ID)
 			->execute();

 		if ($rows_updated == 1)
 		{
 			$message = ($details['status'] == 'Saved'
 				? 'OPCR was successfully saved.'
 				: $details['status'] == 'Published'
 					? 'OPCR was successfully published.'
 					: 'OPCR was successfully submitted.');

 			return $message;
 		}
 		else return FALSE; //do something
	}

	/**
	 * Evaluate report
	 */
	// public function evaluate($opcr_ID, $details)
	// {}

	/**
	 * Delete form
	 */
	public function delete($opcr_ID)
	{
		// Check for linked IPCR
		$ipcr = DB::select()
			->from('ipcrtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->execute()
	 		->as_array();

		if ($ipcr) return "One or more IPCR is using this OPCR.";
		else
		{
			// Check for linked IPCR
			$output = DB::select()
				->from('opcr_outputtbl')
				->where('opcr_ID', '=', $opcr_ID)
				->execute()
		 		->as_array();

			if ($output)
			{
				$rows_deleted = DB::delete('opcr_outputtbl')
					->where('opcr_ID', '=', $opcr_ID)
			 		->execute();

				$this->delete($opcr_ID);
			}

			$rows_deleted = DB::delete('opcrtbl')
				->where('opcr_ID', '=', $opcr_ID)
		 		->execute();

	 		if ($rows_deleted == 1) return TRUE;
	 		else return "OPCR is not existing."; //do something
		}
	}

	/**
	 * Get form outputs
	 */
	public function get_outputs($opcr_ID)
	{
    	$result = DB::select()
			->from('opcr_outputtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->execute()
			->as_array();
	 	
		$outputs = array();
		foreach ($result as $output)
		{
			$outputs[] = $output;
		}

 		return $outputs;
	}

	/**
	 * Get output details
	 */
	public function get_output_details($output_ID)
	{
		$details = DB::select()
			->from('opcr_outputtbl')
			->where('output_ID', '=', $output_ID)
	 		->execute()
	 		->as_array();

 		return $details[0];
	}

	/**
	 * Add output
	 */
	public function add_output($details)
	{
		foreach ($details as $column_name => $value) {
			$columns[] = $column_name;
			$values[] = $value;
		}

		$insert_output = DB::insert('opcr_outputtbl')
			->columns($columns)
			->values($values)
			->execute();

		// return $insert_output[0]; -- output_ID
	}

	/**
	 * Update output
	 */
	public function update_output($details)
	{
		$rows_updated = DB::update('opcr_outputtbl')
 			->set($details)
 			->where('output_ID', '=', $details['output_ID'])
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Delete output
	 */
	public function delete_output($output_ID)
	{
		$rows_deleted = DB::delete('opcr_outputtbl')
			->where('output_ID', '=', $output_ID)
	 		->execute();

 		// if ($rows_deleted == 1) return TRUE;
 		// else return FALSE; //do something
	}

	/**
	 * Check if output is linked to other forms
	 */
	// private function check_output_users($output_ID)
	// {}

} // End Opcr