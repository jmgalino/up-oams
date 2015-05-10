<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Ipcr extends Model {

	/**
	 * Get forms (by faculty)
	 */
	public function get_faculty_ipcr($user_ID, $opcr_ID)
	{
		if ($opcr_ID)
		{
			$ipcr_forms = DB::select()
				->from('ipcrtbl')
				->where('user_ID', '=', $user_ID)
				->where('opcr_ID', '=', $opcr_ID)
				->execute()
				->as_array();

			return $ipcr_forms[0];
		}
		else
		{
			$ipcr_forms = DB::select()
				->from('ipcrtbl')
				->where('user_ID', '=', $user_ID)
				->execute()
				->as_array();

			return $ipcr_forms;
		}
	}

	/**
	 * Get forms (by department/college)
	 */
	public function get_group_ipcr($userIDs, $start, $end, $strict)
	{
		if ($start AND $end)
		{
			$query = DB::select('ipcrtbl.*, opcrtbl.period_from, opcrtbl.period_to')
				->from('ipcrtbl')
				->where('ipcrtbl.user_ID', 'IN', $userIDs)
				->join('opcrtbl')
				->on('ipcrtbl.opcr_ID', '=', 'opcrtbl.opcr_ID')
				->where('opcrtbl.period_from', '>=', $start)
				->where('opcrtbl.period_to', '<=', $end)
				->order_by('opcrtbl.period_from', 'DESC')
				->order_by('opcrtbl.period_to', 'DESC');
		}
		else
		{
			$query = DB::select()
				->from('ipcrtbl')
				->where('ipcrtbl.user_ID', 'IN', $userIDs);
		}

		if ($strict)
				$query->where('ipcrtbl.status', 'IN', array('Saved', 'Accepted'));
		else
				$query->where('ipcrtbl.status', 'IN', array('Saved', 'Pending', 'Accepted'));

		// echo Debug::vars($query->execute());
	 	$group_ipcrs = $query->execute()->as_array();

	 	return $group_ipcrs;
	}

	/**
	 * Get forms (by OPCR - department)
	 */
	public function get_opcr_ipcr($opcr_ID)
	{
		$opcr_ipcrs = DB::select()
			->from('ipcrtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->where('status', 'IN', array('Accepted', 'Saved'))
			->execute()
			->as_array();

	 	return $opcr_ipcrs;
	}

	/**
	 * Get form details
	 */
	public function get_details($ipcr_ID)
	{
		$ipcr_details = DB::select()
			->from('ipcrtbl')
			->where('ipcr_ID', '=', $ipcr_ID)
	 		->execute()
	 		->as_array();

		return $ipcr_details[0];
	}

	/**
	 * Create new form
	 */
	public function initialize($details)
	{
		// Check
		$check = DB::select()
			->from('ipcrtbl')
			->where('opcr_ID', '=', $details['opcr_ID'])
			->where('user_ID', '=', $details['user_ID'])
		    ->execute()
			->as_array();

		// Existing
		if ($check)
 		{
 			if (($check[0]['status'] == 'Checked') OR ($check[0]['status'] == 'Accepted') OR ($check[0]['status'] == 'Pending'))
 			{
 				return 'IPCR Form is locked for editing.';
 			}
 			else
 			{
 				return array('ipcr_ID' => $check[0]['ipcr_ID'], 'message' => 'This form has been generated.');
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
	 * Update form
	 */
	public function update($ipcr_ID, $details)
	{
		$ipcr_details = $this->get_details($ipcr_ID);

		if($details['remarks'] AND $ipcr_details['remarks'] !== 'None')
			$details['remarks'] .= '<br>'.$ipcr_details['remarks'];

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
		{
			$details['remarks'] .= '<br>'.$ipcr['remarks'];

			// Check if remarks is not over 255 chars
			while(strlen($details['remarks']) > 255)
			{
				$last_remark = strrpos($details['remarks'], '<br>');
				$details['remarks'] = substr($details['remarks'], 0, $last_remark);
			}
		}
		
		$rows_updated = DB::update('ipcrtbl')
 			->set($details)
 			->where('ipcr_ID', '=', $ipcr_ID)
 			->execute();

 		if ($rows_updated == 1) return $details['status'];
 		else return FALSE;
	}

	/**
	 * Delete form
	 */
	public function delete($ipcr_ID)
	{
		$delete_success = TRUE;
		$targets = $this->get_targets($ipcr_ID);

		if ($targets)
		{
			foreach ($targets as $target)
			{
				$success = $this->delete_target($target['target_ID']);

				if (!$success)
					return FALSE;
			}
		}

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
    	$ipcr_targets = DB::select()
			->from('ipcr_targettbl')
			->where('ipcr_ID', '=', $ipcr_ID)
			->execute()
			->as_array();

 		return $ipcr_targets;
	}

	/**
	 * Get targets (by category - faculty)
	 */
	public function get_category_targets($ipcr_ID, $category_ID)
	{
		$category_targets = DB::select('ipcr_targettbl.target_ID', 'ipcr_targettbl.target')
			->from('ipcr_targettbl')
			->join('opcr_outputtbl', 'INNER')
			->on('ipcr_targettbl.output_ID', '=', 'opcr_outputtbl.output_ID')
			->where('ipcr_targettbl.ipcr_ID', '=', $ipcr_ID)
			->where('opcr_outputtbl.category_ID', '=', $category_ID)
			->execute()
			->as_array();

		return $category_targets;
	}

	/**
	 * Get targets (by output - department)
	 */
	public function get_output_targets($output_ID, $outputs)
	{
		$output_targets = NULL;

		if ($output_ID)
		{
			$output_targets = DB::select('ipcr_targettbl.*, ipcrtbl.user_ID')
				->from('ipcr_targettbl')
				->join('ipcrtbl', 'LEFT')
				->on('ipcr_targettbl.ipcr_ID', '=', 'ipcrtbl.ipcr_ID')
				->where('output_ID', '=', $output_ID)
				->execute()
				->as_array();
		}
		elseif ($outputs)
		{
			$outputIDs = array();
			foreach ($outputs as $output)
			{
				$outputIDs[] = $output['output_ID'];
			}

			$output_targets = DB::select()
				->from('ipcr_targettbl')
				->where('output_ID', 'IN', $outputIDs)
				->execute()
				->as_array();
		}

	 	return $output_targets;
	}

	/**
	 * Get target details
	 */
	public function get_target_details($target_ID)
	{
    	$target_details = DB::select('ipcr_targettbl.*, ipcrtbl.user_ID')
			->from('ipcr_targettbl')
			->join('ipcrtbl')
			->on('ipcr_targettbl.ipcr_ID', '=', 'ipcrtbl.ipcr_ID')
			->where('target_ID', '=', $target_ID)
			->execute()
			->as_array();

		return $target_details[0];
	}

	/**
	 * Add target
	 */
	public function add_target($details)
	{
		// Check if target is existing
		$target = DB::select()
			->from('ipcr_targettbl')
			->where('output_ID', '=', $details['output_ID'])
			->where('ipcr_ID', '=', $details['ipcr_ID'])
			->execute()
			->as_array();

		if(!$target)
		{
			$insert_target = DB::insert('ipcr_targettbl')
				->columns(array_keys($details))
				->values($details)
				->execute();
		}
		else
		{
			$session = Session::instance();
			$session->set('warning', 'Warning: Output is already included.');
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
 		else return FALSE;
	}

	/**
	 * Delete target
	 */
	public function delete_target($target_ID)
	{
		$rows_deleted = DB::delete('ipcr_targettbl')
			->where('target_ID', '=', $target_ID)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}

} // End Ipcr