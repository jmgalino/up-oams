<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Accom extends Model {
	
	/**
	 * Get reports (by faculty)
	 */
	public function get_faculty_accom($user_ID, $start, $end, $strict)
	{
		if ($start AND $end)
		{
			if ($strict)
			{
				$accom_IDs = DB::select('accom_ID')
					->from('accomtbl')
					->where('user_ID', '=', $user_ID)
					->where('status', 'IN', array('Accepted', 'Saved'))
					->where('yearmonth', '>=', $start)
					->where('yearmonth', '<=', $end)
					->order_by('yearmonth', 'DESC')
					->execute()
					->as_array();
			}
			else
			{
				$accom_IDs = DB::select('accom_ID')
					->from('accomtbl')
					->where('user_ID', '=', $user_ID)
					->where('yearmonth', '>=', $start)
					->where('yearmonth', '<=', $end)
					->order_by('yearmonth', 'DESC')
					->execute()
					->as_array();
			}

			$accom_reports = array();
			foreach ($accom_IDs as $accom_ID)
			{
				$accom_reports[] = $accom_ID['accom_ID'];
			}
		}
		else
		{
			if ($strict)
			{
				$accom_reports = DB::select()
					->from('accomtbl')
					->where('user_ID', '=', $user_ID)
					->where('status', 'IN', array('Accepted', 'Saved'))
					->execute()
					->as_array();
			}
			else
			{
				$accom_reports = DB::select()
					->from('accomtbl')
					->where('user_ID', '=', $user_ID)
					->execute()
					->as_array();
			}
		}

		return $accom_reports;
	}

	/**
	 * Get reports (by department/college)
	 * Strict - Pending not included
	 */
	public function get_group_accom($userIDs, $start, $end, $strict)
	{
		/**
		 * With time range
		 */
		if ($start AND $end)
		{
			if ($strict)
			{
				$accom_IDs = DB::select('accom_ID')
					->from('accomtbl')
					->where('user_ID', 'IN', $userIDs)
					->where('status', 'IN', array('Accepted', 'Saved'))
					->where('yearmonth', '>=', $start)
					->where('yearmonth', '<=', $end)
					->order_by('yearmonth', 'DESC')
					->execute()
					->as_array();
			}
			else
			{
				$accom_IDs = DB::select('accom_ID')
					->from('accomtbl')
					->where('user_ID', 'IN', $userIDs)
					->where('status', 'IN', array('Accepted', 'Pending', 'Saved'))
					->where('yearmonth', '>=', $start)
					->where('yearmonth', '<=', $end)
					->order_by('yearmonth', 'DESC')
					->execute()
					->as_array();
			}

			$accom_reports = array();
			foreach ($accom_IDs as $accom_ID)
			{
				foreach ($accom_ID as $key => $value)
				{
					$accom_reports[] = $value;
				}	
			}
		}
		/**
		 * Without time range
		 */
		else
		{
			if ($strict)
			{
				$accom_reports = DB::select()
					->from('accomtbl')
					->where('user_ID', 'IN', $userIDs)
					->where('status', 'IN', array('Accepted', 'Saved'))
			 		->execute()
			 		->as_array();
			}
			else
			{
				$accom_reports = DB::select()
					->from('accomtbl')
					->where('user_ID', 'IN', $userIDs)
					->where('status', 'IN', array('Accepted', 'Pending', 'Saved'))
			 		->execute()
			 		->as_array();
			}
	 	}

	 	return $accom_reports;
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
		$check = DB::select()
			->from('accomtbl')
			->where('user_ID', '=', $details['user_ID'])
			->where('yearmonth', '=', $details['yearmonth'])
		    ->execute()
	 		->as_array();

		// Existing
		if ($check)
 		{
 			if (($check[0]['status'] == 'Accepted') OR ($check[0]['status'] == 'Pending'))
 			{
 				return 'Accomplishment Report is locked for editing.';
 			}
 			else
 			{
 				return array('accom_ID' => $check[0]['accom_ID'], 'message' => 'This report has been generated.');
 			}
 		}
 		else
 		{
 			$insert_accom = DB::insert('accomtbl')
	 			->columns(array_keys($details))
	 			->values($details)
	 			->execute();

	 		return $insert_accom[0];
 		}
	}

	/**
	 * Submit report
	 */
	public function update($accom_ID, $details)
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
		{
			$details['remarks'] .= '<br>'.$accom['remarks'];

			// Check if remarks is not over 255 chars
			while(strlen($details['remarks']) > 255)
			{
				$last_remark = strrpos($details['remarks'], '<br>');
				$details['remarks'] = substr($details['remarks'], 0, $last_remark);
			}
		}

		$rows_updated = DB::update('accomtbl')
 			->set($details)
 			->where('accom_ID', '=', $accom_ID)
 			->execute();

 		if ($rows_updated == 1) return $details['status'];
 		else return FALSE; //do something
	}

	/**
	 * Delete report
	 */
	public function delete($accom_ID)
	{
		$pub = $this->get_accoms($accom_ID, 'pub'); $accoms['pub'] = $pub;
		$awd = $this->get_accoms($accom_ID, 'awd'); $accoms['awd'] = $awd;
		$rch = $this->get_accoms($accom_ID, 'rch'); $accoms['rch'] = $rch;
		$ppr = $this->get_accoms($accom_ID, 'ppr'); $accoms['ppr'] = $ppr;
		$ctv = $this->get_accoms($accom_ID, 'ctv'); $accoms['ctv'] = $ctv;
		$par = $this->get_accoms($accom_ID, 'par'); $accoms['par'] = $par;
		$mat = $this->get_accoms($accom_ID, 'mat'); $accoms['mat'] = $mat;
		$oth = $this->get_accoms($accom_ID, 'oth'); $accoms['oth'] = $oth;

		if ($accoms)
		{
			foreach ($accoms as $type => $accom_specs)
			{
				if ($accom_specs)
				{
					foreach ($accom_specs as $accom_spec)
					{
						foreach ($accom_spec as $key => $value)
						{
							if ($key == array_keys($accom_spec)[0])
								$this->delete_accom($accom_ID, $value, $type, $key);
						}
					}
				}
			}
		}

		$accom_details = $this->get_details($accom_ID);
		$delete = unlink(DOCROOT.'files/document_accom/'.$accom_details['document']);

		$rows_deleted = DB::delete('accomtbl')
			->where('accom_ID', '=', $accom_ID)
	 		->execute();

 		if ($delete AND $rows_deleted == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Get accomplishments details
	 */
	public function get_accom_details($accom_ID, $accom_specID, $type)
	{
		// Retrive attachments if any
		$attachment = DB::select('attachment')
			->from('connect_accomtbl')
			->where('accom_ID', '=', $accom_ID)
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
			->execute()
			->as_array();
 
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

		$details = DB::select()
			->from($table)
			->where($name_ID, '=', $accom_specID)
			->execute()
			->as_array();

		// Add attachments if any
		$details[0]['attachment'] = ($attachment ? $attachment[0]['attachment'] : NULL);
		return $details[0];
	}

	/**
	 * Get report accomplishments (by type)
	 */
	public function get_accoms($accom_ID, $type)
	{
		$accoms = array();
		$accom_specs = array();

		// Find accomplishments for multiple reports -- consolidated/display all
		if (is_array($accom_ID))
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
				$accom_spec_details['attachment'] = $accom_spec['attachment'];		// Add attachment
				$accom_spec_details['user_ID'] = $accom_details['user_ID'];			// Add user_ID
				$accom_specs[] = $accom_spec_details;
			}

			// Retrieve accom details
			if ($accom_specs)
			{
				$accoms = $this->get_accom_specs($accom_specs, $type);
			}
		}

		// Find accomplishments for one report
		elseif (count($accom_ID) == 1)
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

		return $accoms;
	}

	/**
	 * Add accomplishment
	 */
	public function add_accom($accom_ID, $name_ID, $type, $details, $attachment)
	{
		$add_success = FALSE;

		// Check if linked
		$linked = $this->check_link($accom_ID, $details[$name_ID], $type);

		// Linked
		if ($linked)
		{
			$session = Session::instance();
			$session->set('warning', 'Accomplishment is already included in the report');
		}

		// Not linked
		else
		{
			// Check if existing (unless live search/suggested)
			$existing_accom_specID = $this->check_accom_exist($name_ID, $type, $details);

			// Existing
			if ($existing_accom_specID)
				$add_success = $this->link_accom($accom_ID, $existing_accom_specID, $type, $attachment);
			
			// New
			else
			{
				// Set empty values to NULL
		 		foreach ($details as $column => $value)
		 		{
					if ($value == '') $details[$column] = NULL;
				}

				// Insert into db
				$insert_accom = DB::insert('accom_'.$type.'tbl')
					->columns(array_keys($details))
					->values($details)
					->execute();

				$accom_specID = $insert_accom[0];
				$add_success = $this->link_accom($accom_ID, $accom_specID, $type, $attachment);
			}
		}

		return ($add_success ? 'Accomplishment was successfully added' : NULL);
	}

	/**
	 * Update accomplishment
	 */
	public function update_accom($accom_ID, $accom_specID, $details, $type, $name_ID)
	{
		// $update_success = FALSE;
		$accom_spec_details = $this->get_accom_details($accom_ID, $accom_specID, $type);

		// Check for other users 
		$users = $this->check_accom_users($accom_specID, $type);

		// Has other users
		if ($users > 1)
		{
			// Unlink
			$unlink_success = $this->unlink_accom($accom_ID, $accom_specID, $type);

			// Check if existing (unless live search/suggested)
			$existing_accom_specID = $this->check_accom_exist($name_ID, $type, $details);

			// Existing
			if ($existing_accom_specID)
			{
				$link_success = $this->link_accom($accom_ID, $existing_accom_specID, $type, $accom_spec_details['attachment']);
				$update_success = ($unlink_success AND $link_success ? 'Accomplishment was successfully updated' : FALSE);
			}
			
			// New entry
			else
			{
				// Set to NULL to create new entry
				$details[$name_ID] = NULL;
				$add_success = $this->add_accom($accom_ID, $name_ID, $type, $details, $accom_spec_details['attachment']);
				$update_success = ($unlink_success AND $add_success ? 'Accomplishment was successfully updated' : FALSE);
			}
		}

		// No other users
		else
		{
			// Check if existing (unless live search/suggested)
			$existing_accom_specID = $this->check_accom_exist($name_ID, $type, $details);

			// Existing
			if ($existing_accom_specID)
			{
				// Unlink and delete current, then link existing
				$unlink_success = $this->unlink_accom($accom_ID, $accom_specID, $type);
				$delete_success = $this->delete_accom($accom_ID, $accom_specID, $type, $name_ID);
				$link_success = $this->link_accom($accom_ID, $existing_accom_specID, $type, $accom_spec_details['attachment']);
				$update_success = ($unlink_success AND $delete_success AND $link_success ? 'Accomplishment was successfully updated' : FALSE);
			}

			// New
			else
			{
				$rows_updated = DB::update('accom_'.$type.'tbl')
		 			->set($details)
		 			->where($name_ID, '=', $accom_specID)
		 			->execute();

		 		$update_success = ($rows_updated == 1 ? 'Accomplishment was successfully updated' : FALSE);
			}
		}
	}

	/**
	 * Delete accomplishments
	 */
	public function delete_accom($accom_ID, $accom_specID, $type, $name_ID)
	{
		// Check for other users
		$users = $this->check_accom_users($accom_specID, $type);	

		$accom_details = $this->get_accom_details($accom_ID, $accom_specID, $type);
		$accom_attachments = (array_key_exists('attachment', $accom_details) ? $accom_details['attachment'] : NULL);
		$unlink_success = $this->unlink_accom($accom_ID, $accom_specID, $type);

		// Delete attachments if any
		if ($accom_attachments)
		{
			$attachment = explode(' ', $accom_attachments);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				unlink(DOCROOT.'files/upload_attachments/'.$attachment[$i]);
			}	
		}

		// Delete accom if no other user
		if ($users == 1)
		{
			$rows_deleted = DB::delete('accom_'.$type.'tbl')
				->where($name_ID, '=', $accom_specID)
		 		->execute();

	 		if ($unlink_success AND $rows_deleted == 1) return 'Accomplishment was successfully deleted.';
	 		else return FALSE;
		}
		else
		{
			if ($unlink_success) return 'Accomplishment was successfully deleted.';
	 		else return FALSE;
		}
	}

	/**
	 * Check if accomplishment exist
	 */
	public function check_accom_exist($name_ID, $type, $details)
	{
		$id = NULL;
		$count = 0;

		$query = DB::select()->from('accom_'.$type.'tbl');

		foreach ($details as $key => $value)
		{
			//try strpos
			if ($count == 0)
				$count++;
			else
			{
				if ($value == '')
					$query->where($key, '=', NULL);
				else
					$query->where($key, '=', $value);
			}
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
	 * Get accomplishments (with details) by type
	 */
	private function get_accom_specs($accom_specs, $type)
	{
		$additional = NULL;
		$accom_specIDs = array();
		$accoms = array();
		$newAccoms = array();

		switch ($type)
		{
			case 'pub':
				$table = 'accom_pubtbl';
				$name_ID = 'publication_ID';
				$additional = array(
					'type' => 'ASC',
					'year' => 'DESC',
					'title' => 'ASC',
					'journal_volume' => 'DESC',
					'journal_issue' => 'DESC',
					'book_publisher' => 'ASC',
					'book_place' => 'ASC',
					'page' => 'ASC',);
				break;
			
			case 'awd':
				$table = 'accom_awdtbl';
				$name_ID = 'award_ID';
				$additional = array(
					'type' => 'ASC',
					'start' => 'DESC',
					'end' => 'DESC',
					'award' => 'ASC',
					'source' => 'ASC');
				break;
			
			case 'rch':
				$table = 'accom_rchtbl';
				$name_ID = 'research_ID';
				$additional = array(
					'nature' => 'ASC',
					'start' => 'DESC',
					'end' => 'DESC',
					'title' => 'ASC');
				break;
			
			case 'ppr':
				$table = 'accom_pprtbl';
				$name_ID = 'paper_ID';
				$additional = array(
					'activity' => 'ASC',
					'start' => 'DESC',
					'end' => 'DESC',
					'author' => 'ASC',
					'title' => 'ASC');
				break;
			
			case 'ctv':
				$table = 'accom_ctvtbl';
				$name_ID = 'creative_ID';
				$additional = array(
					'start' => 'DESC',
					'end' => 'DESC',
					'author' => 'ASC',
					'title' => 'ASC');
				break;
			
			case 'par':
				$table = 'accom_partbl';
				$name_ID = 'participation_ID';
				$additional = array(
					'participation' => 'ASC',
					'start' => 'DESC',
					'end' => 'DESC',
					'title' => 'ASC');
				break;
			
			case 'mat':
				$table = 'accom_mattbl';
				$name_ID = 'material_ID';
				$additional = array(
					'year' => 'DESC',
					'author' => 'ASC',
					'title' => 'ASC');
				break;
			
			case 'oth':
				$table = 'accom_othtbl';
				$name_ID = 'other_ID';
				$additional = array(
					'participation' => 'ASC',
					'start' => 'DESC',
					'end' => 'DESC',
					'activity' => 'ASC');
				break;
		}

		// Retrive accom_specIDs
		foreach ($accom_specs as $accom_spec)
		{
			$accom_specIDs[] = $accom_spec['accom_specID'];
		}

		// Retrive accom_spec details
		$query = DB::select()
			->from($table)
			->where($name_ID, 'IN', $accom_specIDs);

			if ($additional)
			{
				foreach ($additional as $column => $direction)
				{
					$query->order_by($column, $direction);
				}
			}

		$accoms = $query->execute()->as_array();
		
		foreach ($accoms as $accom)
		{
			foreach ($accom_specs as $accom_spec)
			{
				if ($accom[$name_ID] == $accom_spec['accom_specID'])
				{
					if (array_key_exists('attachment', $accom_spec)) $accom['attachment'] = $accom_spec['attachment'];	// Add attachment	
					if (array_key_exists('user_ID', $accom_spec)) $accom['user_ID'] = $accom_spec['user_ID'];	// Add user_ID
					$newAccoms[] = $accom;
				}
			}

		}
		
		return $newAccoms;
	}

	private function check_link($accom_ID, $accom_specID, $type)
	{
		$existing = DB::select()
			->from('connect_accomtbl')
			->where('accom_ID', '=', $accom_ID)
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
			->execute()
			->as_array();

		return $existing;
	}

	/**
	 * Link accomplishment to report
	 */
	private function link_accom($accom_ID, $accom_specID, $type, $attachment)
	{
		$insert_accom = DB::insert('connect_accomtbl')
			->columns(array('accom_ID', 'accom_specID', 'type', 'attachment'))
			->values(array($accom_ID, $accom_specID, $type, $attachment))
			->execute();

		if ($insert_accom[1] == 1) return TRUE;
 		else return FALSE;
	}

	/**
	 * Unlink accomplishment from report
	 */
	private function unlink_accom($accom_ID, $accom_specID, $type)
	{
		$rows_deleted = DB::delete('connect_accomtbl')
			->where('accom_ID', '=', $accom_ID)
			->where('accom_specID', '=', $accom_specID)
			->where('type', '=', $type)
	 		->execute();

 		if ($rows_deleted == 1) return TRUE;
 		else return FALSE;
	}

} // End Accom