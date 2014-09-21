<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Ipcr extends Model {

	/**
	 * Get forms (by faculty)
	 */
	public function get_faculty_ipcr($user_ID)
	{
		$result = DB::select()
			->from('ipcrtbl')
			->where('user_ID', '=', $user_ID)
			->execute()
			->as_array();
	
		$ipcr_forms = array();
		foreach ($result as $form)
		{
			$ipcr_forms[] = $form;
		}

		return $ipcr_forms;
	}

	/**
	 * Get forms (by department/college)
	 */
	public function get_group_ipcr($userIDs)
	{
		$result = DB::select()
			->from('ipcrtbl')
			->where('user_ID', 'IN', $userIDs)
			->where('status', 'IN', array('Checked', 'Accepted', 'Pending', 'Saved'))
	 		->execute()
	 		->as_array();

		$ipcrs = array();
	 	foreach ($result as $ipcr)
	 	{
	 		$ipcrs[] = $ipcr;
	 	}

	 	return $ipcrs;
	}

	/**
	 * Get forms (by OPCR - department)
	 */
	public function get_opcr_ipcr($opcr_ID)
	{
		$result = DB::select()
			->from('ipcrtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->execute()
			->as_array();

		$ipcrs = array();
	 	foreach ($result as $ipcr)
	 	{
	 		$ipcrs[] = $ipcr;
	 	}

	 	return $ipcrs;
	}

	/**
	 * Get form details
	 */
	public function get_details($ipcr_ID)
	{
		$details = DB::select()
			->from('ipcrtbl')
			->where('ipcr_ID', '=', $ipcr_ID)
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
		$result = DB::select()
			->from('ipcrtbl')
			->where('opcr_ID', '=', $details['opcr_ID'])
			->where('user_ID', '=', $details['user_ID'])
		    ->execute()
			->as_array();

		// Existing
		if ($result)
 		{
 			if (($result[0]['status'] == 'Checked') OR ($result[0]['status'] == 'Accepted') OR ($result[0]['status'] == 'Pending'))
 			{
 				return 'IPCR Form is locked for editing.';
 			}
 			else
 			{
 				return array('ipcr_ID' => $result[0]['ipcr_ID'], 'message' => 'This form has been generated.');
 			}
 		}
 		else
 		{
 			$insert_ipcr = DB::insert('ipcrtbl')
	 			->columns(array_keys($details))
	 			->values($details)
	 			->execute();

	 		return $insert_ipcr[0];
 		}
	}

	/**
	 * Submit form
	 */
	public function submit($ipcr_ID, $details)
	{
		$rows_updated = DB::update('ipcrtbl')
 			->set($details)
 			->where('ipcr_ID', '=', $ipcr_ID)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Evaluate report
	 */
	public function evaluate($ipcr_ID, $details)
	{
		$ipcr = $this->get_details($ipcr_ID);

		if($ipcr['remarks'] != 'None')
			$details['remarks'] = $details['remarks'].'<br>'.$ipcr['remarks'];
		
		$rows_updated = DB::update('ipcrtbl')
 			->set($details)
 			->where('ipcr_ID', '=', $ipcr_ID)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

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
	 * Get targets (by ipcr - faculty)
	 */
	public function get_targets($ipcr_ID)
	{
    	$result = DB::select()
			->from('ipcr_targettbl')
			->where('ipcr_ID', '=', $ipcr_ID)
			->execute()
			->as_array();
	
		// $targets = array();	
		// foreach ($result as $target)
		// {
		// 	$targets[] = $target;
		// }

 		// return $targets;
 		return $result;
	}

	/**
	 * Get targets (by category - faculty)
	 */
	public function get_category_targets($ipcr_ID, $category_ID)
	{
		$result = DB::select('ipcr_targettbl.target_ID', 'ipcr_targettbl.target')
			->from('ipcr_targettbl')
			->join('opcr_outputtbl', 'INNER')
			->on('ipcr_targettbl.output_ID', '=', 'opcr_outputtbl.output_ID')
			->where('ipcr_targettbl.ipcr_ID', '=', $ipcr_ID)
			->where('opcr_outputtbl.category_ID', '=', $category_ID)
			->execute()
			->as_array();

		return $result;
	}

	/**
	 * Get targets (by output - department)
	 */
	public function get_output_targets($outputs)
	{
		$outputIDs = array();
		foreach ($outputs as $output) {
			$outputIDs[] = $output['output_ID'];
		}

		$result = DB::select()
			->from('ipcr_targettbl')
			->where('output_ID', 'IN', $outputIDs)
			->execute()
			->as_array();

		$targets = array();
	 	foreach ($result as $target)
	 	{
	 		$targets[] = $target;
	 	}

	 	return $targets;
	}

	/**
	 * Get target details
	 */
	public function get_target_details($target_ID)
	{
    	$details = DB::select()
			->from('ipcr_targettbl')
			->where('target_ID', '=', $target_ID)
			->execute()
			->as_array();

 		return $details[0];
	}

	/**
	 * Add target
	 */
	public function add_target($details)
	{
		// Check if target is existing
		$result = DB::select()
			->from('ipcr_targettbl')
			->where('output_ID', '=', $details['output_ID'])
			->where('ipcr_ID', '=', $details['ipcr_ID'])
			->execute()
			->as_array();

		if(!$result)
		{
			$insert_target = DB::insert('ipcr_targettbl')
				->columns(array_keys($details))
				->values($details)
				->execute();
		}
		else
		{
			$session = Session::instance();
			$session->set('error', 'Error: Output is already included.');
		}
		// return $insert_target[0]; -- target_ID
	}

	/**
	 * Update target
	 */
	public function update_target($details)
	{
		$rows_updated = DB::update('ipcr_targettbl')
 			->set($details)
 			->where('target_ID', '=', $details['target_ID'])
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Delete target
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