<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Cuma extends Model {

	/**
	 * Get forms (by faculty)
	 */
	public function get_faculty_cuma($user_ID)
	{
		$cuma_forms = DB::select()
			->from('cumatbl')
			->where('user_ID', '=', $user_ID)
			->order_by('period_from', 'DESC')
			->order_by('period_to', 'DESC')
			->execute()
			->as_array();

		return $cuma_forms;
	}

	/**
	 * Get forms (by college)
	 */
	public function get_group_cuma($userIDs)
	{
		$cuma_forms = DB::select()
			->from('cumatbl')
			->where('user_ID', 'IN', $userIDs)
			->where('status', '=', 'Submitted')
			->order_by('period_from', 'DESC')
			->order_by('period_to', 'DESC')
	 		->execute()
	 		->as_array();
		
	 	return $cuma_forms;
	}

	/**
	 * Get cuma details
	 */
	public function get_details($cuma_ID)
	{
		$details = DB::select()
			->from('cumatbl')
			->where('cuma_ID', '=', $cuma_ID)
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
		$check = DB::select()
			->from('cumatbl')
			->where('user_ID', '=', $details['user_ID'])
			->where('period_from', '=', $details['period_from'])
			->where('period_to', '=', $details['period_to'])
			->execute()
			->as_array();

		// Existing
		if ($check)
 		{
 			if ($check[0]['status'] == 'Published')
 			{
 				return 'CUMA Form is locked for editing.';
 			}
 			else
 			{
 				return array('cuma_ID' => $check[0]['cuma_ID'], 'warning' => 'This form has been generated.');
 			}
 		}
 		else
 		{
 			$insert_cuma = DB::insert('cumatbl')
	 			->columns(array_keys($details))
	 			->values($details)
	 			->execute();

	 		return $insert_cuma[0];
 		}
	}

	/**
	 * Update form (includes publish)
	 */
	public function update($details)
	{
		$rows_updated = DB::update('cumatbl')
 			->set($details)
 			->where('cuma_ID', '=', $details['cuma_ID'])
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Delete form
	 */
	public function delete($cuma_ID)
	{
		$cuma_details = $this->get_details($cuma_ID);
		
		if ($cuma_details['document'])
			$delete = unlink(DOCROOT.'files/document_cuma/'.$cuma_details['document']);

		$rows_deleted = DB::delete('cumatbl')
			->where('cuma_ID', '=', $cuma_ID)
	 		->execute();

	 	if ($cuma_details['document'] AND $delete AND $rows_deleted == 1) return TRUE;
 		elseif ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}


} // End Cuma