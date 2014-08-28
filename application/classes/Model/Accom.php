<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Accom extends Model {
	
	/**
	 * Get reports (by faculty)
	 */
	public function get_faculty_accom($user_ID)
	{
		$result = DB::select()
			->from('accomtbl')
			->where('user_ID', '=', $user_ID)
			->execute()
			->as_array();

		$accom_reports = array();
		foreach ($result as $report)
		{
			$accom_reports[] = $report;
		}

		return $accom_reports;
	}

	/**
	 * Get reports (by department/college)
	 */
	public function get_group_accom($userIDs)
	{
		$result = DB::select()
			->from('accomtbl')
			->where('user_ID', 'IN', $userIDs)
			->where('status', 'IN', array('Approved', 'Pending', 'Saved'))
	 		->execute()
	 		->as_array();

		$accoms = array();
	 	foreach ($result as $accom)
	 	{
	 		$accoms[] = $accom;
	 	}

	 	return $accoms;
	}

	/**
	 * Get report details
	 */
	public function get_details($accom_ID)
	{
		$details = DB::select()
			->from('accomtbl')
			->where('accom_ID', '=', $accom_ID)
	 		->execute()
	 		->as_array();

 		return $details[0];
	}

	/**
	 * Create new report
	 */
	public function initialize($details)
	{
		// Check
		$result = DB::query(Database::SELECT, 'SELECT * FROM accomtbl WHERE user_ID = :user_ID AND DATE_FORMAT(yearmonth, \'%Y %m\') = DATE_FORMAT(:yearmonth, \'%Y %m\')')
			->bind(':user_ID', $details['user_ID'])
		    ->bind(':yearmonth', $details['yearmonth'])
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
 				return $result[0]['accom_ID'];
 			}
 		}
 		else
 		{
 			foreach ($details as $column_name => $value) {
 				$columns[] = $column_name;
				$values[] = $value;
			}// print_r($values);

 			$insert_accom = DB::insert('accomtbl')
	 			->columns($columns)
	 			->values($values)
	 			->execute();

	 		return $insert_accom[0];
 		}
	}

	/**
	 * Submit report
	 */
	public function submit($accom_ID, $details)
	{
		$rows_updated = DB::update('accomtbl')
 			->set($details)
 			->where('accom_ID', '=', $accom_ID)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Evaluate report
	 */
	public function evaluate($accom_ID, $details)
	{
		$accom = $this->get_details($accom_ID);

		if($accom['remarks'] !== 'None')
			$details['remarks'] .= '<br>'.$accom['remarks'];

		$rows_updated = DB::update('accomtbl')
 			->set($details)
 			->where('accom_ID', '=', $accom_ID)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Delete report
	 */
	public function delete($accom_ID)
	{
		$rows_deleted = DB::delete('accomtbl')
			->where('accom_ID', '=', $accom_ID)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Get report accomplishments (by type)
	 */
	public function get_accoms($accom_ID, $type)
	{
		$accoms = array();
		$accom_specs = array();

		// Find accomplishments for one report
		if (count($accom_ID) == 1)
		{
			// Retrive accom_specIDs and attachments if any
			$result = DB::select('accom_specID', 'attachment')
				->from('connect_accomtbl')
				->where('accom_ID', '=', $accom_ID)
				->where('type', '=', $type)
				->execute()
				->as_array();
		
			foreach ($result as $accom_spec)
			{
				$detail['accom_specID'] = $accom_spec['accom_specID'];
				$detail['attachment'] = $accom_spec['attachment'];
				$accom_specs[] = $detail;
			}

			// Retrieve accom details
			if ($accom_specs)
			{
				$accoms = $this->get_accom_specs($accom_specs, $type);
			}
		}

		// Find accomplishments for multiple reports -- consolidated/display all
		else
		{
			// Retrive accom_specIDs, attachments etc
			$result = DB::select()
				->from('connect_accomtbl')
				->where('accom_ID', 'IN', $accom_ID)
				->where('type', '=', $type)
				->execute()
				->as_array();
		
			foreach ($result as $accom_spec)
			{
				$accom_ID = $accom_spec['accom_ID'];
				$accom_details = $this->get_details($accom_ID);
				
				$accom_spec_details['accom_specID'] = $accom_spec['accom_specID'];	// Add accom_specID
				// $accom_spec_details['attachment'] = $accom_spec['attachment'];		// Add attachment
				$accom_spec_details['user_ID'] = $accom_details['user_ID'];			// Add user_ID
				$accom_specs[] = $accom_spec_details;
			}

			// Retrieve accom details
			if ($accom_specs)
			{
				$accoms = $this->get_accom_specs($accom_specs, $type);
			}
		}

		return $accoms;
	}

	/**
	 * Add accomplishment
	 */
	public function add_accom($accom_ID, $name_ID, $type, $details, $attachment)
	{
 		// Check -- unless live search & js submit to link
		$accom_specID = $this->check_accom_exist($name_ID, $type, $details);

		// New
		if (!$accom_specID)
 		{
	 		// Prepare column names and values
	 		foreach ($details as $column_name => $value)
	 		{
				$columns[] = $column_name;
				if ($value == '')
					$values[] = NULL;
				else
					$values[] = $value;
			}

			$insert_accom = DB::insert('accom_'.$type.'tbl')
				->columns($columns)
				->values($values)
				->execute();

			$accom_specID = $insert_accom[0];
		}	

		$this->link_accom($accom_ID, $accom_specID, $type, $attachment);
	}

	/**
	 * Update accomplishment
	 */
	public function update_accom($accom_ID, $accom_specID, $details, $type, $name_ID)
	{
		// Check for other users
		$users = $this->check_accom_users($accom_specID, $type);	

		// No other users
		if ($users == 1)
		{
			$rows_updated = DB::update('accom_'.$type.'tbl')
	 			->set($details)
	 			->where($name_ID, '=', $accom_specID)
	 			->execute();

	 		// if ($rows_updated == 1) return TRUE;
	 		// else return FALSE; //do something
		}
		// Used by others
		else
		{
			$this->unlink_accom($accom_ID, $accom_specID, $type);
			$this->add_accom($accom_ID, $details, $type, $name_ID);
		}
	}

	/**
	 * Delete accomplishments
	 */
	public function delete_accom($accom_ID, $accom_specID, $type, $name_ID)
	{
		// Check for other users
		$users = $this->check_accom_users($accom_specID, $type);	

		// No other users
		if ($users == 1)
		{
			$this->unlink_accom($accom_ID, $accom_specID, $type);

			$rows_deleted = DB::delete('accom_'.$type.'tbl')
				->where($name_ID, '=', $accom_specID)
		 		->execute();

	 		// if ($rows_deleted == 1) return TRUE;
	 		// else return FALSE; //do something
		}

		// Used by others
		else
			$this->unlink_accom($accom_ID, $accom_specID, $type);
	}

	/**
	 * Check if accomplishment exist
	 */
	public function check_accom_exist($name_ID, $type, $details)
	{
		$id = NULL;
		$count = 0;
		$columns = array();
		$values = array();

		$query = DB::select()->from('accom_'.$type.'tbl');

		foreach ($details as $key => $value)
		{
			if ($value == '')
				$query->where($key, '=', NULL);
			else
				$query->where($key, '=', $value);
		}
		
		$result = $query->execute()->as_array();

		if ($result)
			$id = $result[0][$name_ID];

		return $id;
	}

	/**
	 * Check if accomplishment is linked to multiple reports
	 */
	private function check_accom_users($accom_specID, $type)
	{
		$result = DB::select()
			->from('connect_accomtbl')
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
			->execute()
			->as_array();

		return count($result);
	}

	/**
	 * Get accomplishment details
	 */
	private function get_accom_specs($accom_specs, $type)
	{
		$accoms = array();

		switch ($type)
		{
			case 'pub':
				$table = 'accom_pubtbl';
				$name_ID = 'publication_ID';
				break;
			
			case 'awd':
				$table = 'accom_awdtbl';
				$name_ID = 'award_ID';
				break;
			
			case 'rch':
				$table = 'accom_rchtbl';
				$name_ID = 'research_ID';
				break;
			
			case 'ppr':
				$table = 'accom_pprtbl';
				$name_ID = 'paper_ID';
				break;
			
			case 'ctv':
				$table = 'accom_ctvtbl';
				$name_ID = 'creative_ID';
				break;
			
			case 'par':
				$table = 'accom_partbl';
				$name_ID = 'participation_ID';
				break;
			
			case 'mat':
				$table = 'accom_mattbl';
				$name_ID = 'material_ID';
				break;
			
			case 'oth':
				$table = 'accom_othtbl';
				$name_ID = 'other_ID';
				break;
		}

		foreach ($accom_specs as $accom_spec)
		{
			$result = DB::select()
				->from($table)
				->where($name_ID, '=', $accom_spec['accom_specID'])
				->execute()
				->as_array();

			$details = array();
			foreach ($result as $detail)
			{
				foreach ($detail as $column => $value)
				{
					$details[$column]	= $value;
				}
			}

			if (array_key_exists('attachment', $accom_spec)) $details['attachment'] = $accom_spec['attachment'];	// Add attachment
			if (array_key_exists('user_ID', $accom_spec)) $details['user_ID'] = $accom_spec['user_ID'];		// Add user_ID
			$accoms[] = $details;
		}

		return $accoms;
	}

	/**
	 * Link accomplishment to report
	 */
	private function link_accom($accom_ID, $accom_specID, $type, $attachment)
	{
		$check = DB::select()
			->from('connect_accomtbl')
			->where('accom_ID', '=', $accom_ID)
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
			->execute()
			->as_array();

		if($check)
			Session::instance()->set('warning', 'This accomplishment is already included.');
		else
		{
			$insert_accom = DB::insert('connect_accomtbl')
				->columns(array('accom_ID', 'accom_specID', 'type', 'attachment'))
				->values(array($accom_ID, $accom_specID, $type, $attachment))
				->execute();
		}
	}

	/**
	 * Unlink accomplishment from report
	 */
	private function unlink_accom($accom_ID, $accom_specID, $type)
	{
		$result = DB::select()
			->from('connect_accomtbl')
			->where('accom_ID', '=', $accom_ID)
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
			->execute()
			->as_array();

		if ($result[0]['attachment'])
		{
			$attachment = explode(' ', $result[0]['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				unlink(DOCROOT.'files/upload_attachments/'.$attachment[$i]);
			}
		}

		$rows_deleted = DB::delete('connect_accomtbl')
			->where('accom_ID', '=', $accom_ID)
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}

} // End Accom