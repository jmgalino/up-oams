<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Opcr extends Model {

	/**
	 * Faculty
	 */
	public function get_faculty_opcr($user_ID)
	{
		$opcr_forms = array();

		$result = DB::select()
			->from('opcrtbl')
			->where('user_ID', '=', $user_ID)
			->execute()
			->as_array();
	
		foreach ($result as $form)
		{
			$opcr_forms[] = $form;
		}

		return $opcr_forms;
	}

	/**
	 * College
	 */
	// public function get_group_opcr($userIDs)
	// {}

	/**
	 * Get form details
	 */
	public function get_details($opcr_ID)
	{
		$result = DB::select()
			->from('opcrtbl')
			->where('opcr_ID', '=', $opcr_ID)
	 		->execute()
	 		->as_array();

		foreach ($result as $detail)
		{
			$details[] = $detail;
		}

 		return $details;
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
 			if (($result[0]['status'] == 'Approved') OR ($result[0]['status'] == 'Pending'))
 			{
 				return FALSE;
 			}
 			else
 			{
 				return $result[0]['opcr_ID'];
 			}
 		}
 		else
 		{
 			foreach ($details as $column_name => $value) {
 				$columns[] = $column_name;
				$values[] = $value;
			}

 			$insert_opcr = DB::insert('opcrtbl')
	 			->columns($columns)
	 			->values($values)
	 			->execute();

	 		return $insert_opcr[0];
 		}
	}

	/**
	 * Publish form
	 */
	// public function publish($opcr_ID, $details)
	// {}

	/**
	 * Submit form
	 */
	// public function submit($opcr_ID, $details)
	// {}

	/**
	 * Delete form
	 */
	public function delete($opcr_ID)
	{
		$rows_deleted = DB::delete('opcrtbl')
			->where('opcr_ID', '=', $opcr_ID)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Find form outputs
	 */
	public function find_outputs($opcr_ID)
	{
		$outputs = array();

    	$result = DB::select()
			->from('opcr_outputtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->execute()
			->as_array();
	 	
		foreach ($result as $output)
		{
			$outputs[] = $output;
		}

 		return $outputs;
	}

	/**
	 * Add form output
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
	 * Edit form output
	 */
	// public function edit_output($opcr_ID, $output_ID, $details)
	// {}

	/**
	 * Delete form output
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

	/**
	 * Get output categories
	 */
	public function get_categories()
	{
		$categories = array();

    	$result = DB::select()
			->from('opcr_categorytbl')
	 		->execute()
	 		->as_array();
	 	
		foreach ($result as $category)
		{
			$categories[] = $category;
		}

 		return $categories;
	}

} // End Opcr