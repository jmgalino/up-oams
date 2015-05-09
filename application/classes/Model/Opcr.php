<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Opcr extends Model {

	/**
	 * Get forms (by faculty)
	 */
	public function get_faculty_opcr($user_ID)
	{
		$opcr_forms = DB::select()
			->from('opcrtbl')
			->where('user_ID', '=', $user_ID)
			->order_by('period_from', 'DESC')
			->order_by('period_to', 'DESC')
			->execute()
			->as_array();

		return $opcr_forms;
	}

	/**
	 * Get forms (foreach department - as guide/parent for faculty IPCR)
	 */
	public function get_department_opcr($program_ID, $limit)
	{
		$user = new Model_User;
		$univ = new Model_Univ;

		$department = $univ->get_department_details(NULL, $program_ID);

		if ($limit == 1)
		{
			$opcr_forms = DB::select()
				->from('opcrtbl')
				->where('user_ID', '=', $department['user_ID'])
				->where('status', 'IN', array('Published', 'Pending', 'Returned', 'Accepted'))
				->order_by('period_from', 'DESC')
				->order_by('period_to', 'DESC')
				->limit(1)
				->execute()
				->as_array();

			return $opcr_forms[0];
		}
		else
		{
			$opcr_forms = DB::select()
				->from('opcrtbl')
				->where('user_ID', '=', $department['user_ID'])
				->where('status', 'IN', array('Published', 'Pending', 'Returned', 'Accepted'))
				->order_by('period_from', 'DESC')
				->order_by('period_to', 'DESC')
				->execute()
				->as_array();

			return $opcr_forms;
		}
	}

	/**
	 * Get forms
	 */
	public function get_group_opcr($userIDs, $start, $end, $strict)
	{
		$query = DB::select()
				->from('opcrtbl')
				->where('user_ID', 'IN', $userIDs);

		if ($strict)
				$query
				->where('status', 'IN', array('Published', 'Pending', 'Returned', 'Accepted'));
			
		if ($start AND $end)
				$query
				->where('period_from', '>=', $start)
				->where('period_to', '<=', $end);
			
		$group_opcrs = $query
				->order_by('period_from', 'DESC')
				->order_by('period_to', 'DESC')
		 		->execute()
		 		->as_array();

	 	return $group_opcrs;
	}

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
		$result = DB::select()
			->from('opcrtbl')
			->where('user_ID', '=', $details['user_ID'])
			->where('period_from', '=', $details['period_from'])
			->where('period_to', '=', $details['period_to'])
		    ->execute()
	 		->as_array();

		// Existing
		if ($result)
 		{
 			if (in_array($result[0]['status'], array('Published', 'Pending', 'Returned', 'Accepted')))
	 			return 'OPCR Form is locked for editing.';
 			else
	 			return array('opcr_ID' => $result[0]['opcr_ID'], 'message' => 'This form has been generated.');	
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
	 * Update form
	 */
	public function update($opcr_ID, $details)
	{
		$opcr_details = $this->get_details($opcr_ID);

		if($details['remarks'] AND $opcr_details['remarks'] !== 'None')
			$details['remarks'] .= '<br>'.$ipcr_details['remarks'];

		$rows_updated = DB::update('opcrtbl')
 			->set($details)
 			->where('opcr_ID', '=', $opcr_ID)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
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
 			if ($details['status'] == 'Saved')
 				$message = 'OPCR was successfully saved.';
 			elseif ($details['status'] == 'Published')
 				$message = 'OPCR was successfully published.';
 			else
 				$message = 'OPCR was successfully submitted.';

 			return $message;
 		}
 		else return FALSE; //do something
	}

	/**
	 * Evaluate report
	 */
	public function evaluate($opcr_ID, $details)
	{
		$opcr = $this->get_details($opcr_ID);

		if($opcr['remarks'] != 'None')
		{
			$details['remarks'] .= '<br>'.$opcr['remarks'];

			// Check if remarks is not over 255 chars
			while(strlen($details['remarks']) > 255)
			{
				$last_remark = strrpos($details['remarks'], '<br>');
				$details['remarks'] = substr($details['remarks'], 0, $last_remark);
			}
		}
		
		$rows_updated = DB::update('opcrtbl')
 			->set($details)
 			->where('opcr_ID', '=', $opcr_ID)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

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
    	$opcr_outputs = DB::select()
			->from('opcr_outputtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->order_by('output')
			->execute()
			->as_array();

 		return $opcr_outputs;
	}

	/**
	 * Get outputs (by category)
	 */
	public function get_category_outputs($opcr_ID, $category_ID)
	{
		$category_outputs = DB::select('opcr_outputtbl.output_ID', 'opcr_outputtbl.output')
			->from('opcr_outputtbl')
			->where('opcr_ID', '=', $opcr_ID)
			->where('category_ID', '=', $category_ID)
			->order_by('output')
			->execute()
			->as_array();

		return $category_outputs;
	}

	/**
	 * Get output details
	 */
	public function get_output_details($output_ID)
	{
		$details = DB::select('opcr_outputtbl.*, opcrtbl.user_ID')
			->from('opcr_outputtbl')
			->join('opcrtbl')
			->on('opcr_outputtbl.opcr_ID', '=', 'opcrtbl.opcr_ID')
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
		$insert_output = DB::insert('opcr_outputtbl')
			->columns(array_keys($details))
			->values($details)
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
 		else return FALSE;
	}

	/**
	 * Delete output
	 */
	public function delete_output($output_ID)
	{
		$rows_deleted = DB::delete('opcr_outputtbl')
			->where('output_ID', '=', $output_ID)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE;
	}

	/**
	 * Check if output is linked to other forms
	 */
	// private function check_output_users($output_ID)
	// {}

} // End Opcr