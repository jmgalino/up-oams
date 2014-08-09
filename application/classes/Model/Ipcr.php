<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Ipcr extends Model {

	/**
	 * Faculty
	 */
	public function get_faculty_ipcr($user_ID)
	{
		$ipcr_forms = array();

		$result = DB::select()
			->from('ipcrtbl')
			->where('user_ID', '=', $user_ID)
			->execute()
			->as_array();
	
		foreach ($result as $form)
		{
			$ipcr_forms[] = $form;
		}

		return $ipcr_forms;
	}

	/**
	 * College
	 */
	// public function get_group_ipcr($userIDs)
	// {}

	/**
	 * Get form details
	 */
	public function get_details($ipcr_ID)
	{
		$result = DB::select()
			->from('ipcrtbl')
			->where('ipcr_ID', '=', $ipcr_ID)
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
		$result = DB::select()
			->from('ipcrtbl')
			->where('opcr_ID', '=', $details['opcr_ID'])
			->where('user_ID', '=', $details['user_ID'])
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
 				return $result[0]['ipcr_ID'];
 			}
 		}
 		else
 		{
 			foreach ($details as $column_name => $value) {
 				$columns[] = $column_name;
				$values[] = $value;
			}

 			$insert_ipcr = DB::insert('ipcrtbl')
	 			->columns($columns)
	 			->values($values)
	 			->execute();

	 		return $insert_ipcr[0];
 		}
	}

	/**
	 * Publish form
	 */
	// public function publish($ipcr_ID, $details)
	// {}

	/**
	 * Submit form
	 */
	// public function submit($ipcr_ID, $details)
	// {}

	/**
	 * Delete form
	 */
	public function delete($ipcr_ID)
	{
		$rows_deleted = DB::delete('ipcrtbl')
			->where('ipcr_ID', '=', $ipcr_ID)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Find form targets
	 */
	public function find_targets($ipcr_ID)
	{
		$targets = array();

    	$result = DB::select()
			->from('ipcr_targettbl')
			->where('ipcr_ID', '=', $ipcr_ID)
			->execute()
			->as_array();
	 	
		foreach ($result as $target)
		{
			$targets[] = $target;
		}

 		return $targets;
	}

	/**
	 * Add form target
	 */
	public function add_target($details)
	{
		foreach ($details as $column_name => $value) {
			$columns[] = $column_name;
			$values[] = $value;
		}

		$insert_target = DB::insert('ipcr_targettbl')
			->columns($columns)
			->values($values)
			->execute();

		// return $insert_target[0]; -- target_ID
	}

	/**
	 * Edit form target
	 */
	// public function edit_target($ipcr_ID, $target_ID, $details)
	// {}

	/**
	 * Delete form target
	 */
	public function delete_target($target_ID)
	{
		$rows_deleted = DB::delete('ipcr_targettbl')
			->where('target_ID', '=', $target_ID)
	 		->execute();

 		// if ($rows_deleted == 1) return TRUE;
 		// else return FALSE; //do something
	}

} // End Ipcr