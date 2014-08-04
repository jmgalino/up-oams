<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Accom extends Model {
	
	/**
	 * Faculty
	 */
	public function get_faculty_accom($user_ID)
	{
		$accom_reports = array();

		$result = DB::select()
			->from('accomtbl')
			->where('user_ID', '=', $user_ID)
			->execute()
			->as_array();
	
		foreach ($result as $report)
		{
			$accom_reports[] = $report;
		}

		return $accom_reports;
	}

	// /**
	//  * Department
	//  */
	// public function get_department_accom($user_ID, $filter)
	// {}
	
	// /**
	//  * College
	//  */
	// public function get_college_accom($user_ID, $filter)
	// {}

	/**
	 * Get report details
	 */
	public function get_details($accom_ID)
	{
		$result = DB::select()
			->from('accomtbl')
			->where('accom_ID', '=', $accom_ID)
	 		->execute()
	 		->as_array();

		foreach ($result as $detail)
		{
			$details[] = $detail;
		}

 		return $details;
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

	public function evaluate($accom_ID, $details, $identifier)
	{
		$session = Session::instance();
		$identifier = $session->get('identifier');

		if ($identifier == 'dept_chair') {
			# code...
		}
		elseif ($identifier == 'dean') {
			# code...
		}
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
	 * Find report accomplishments
	 */
	public function find_accom($accom_ID, $type)
	{
		// Find accomplishments for one report
		if (count($accom_ID) == 1)
		{
			$accoms = array();
			$accom_specIDs = array();

			// Retrive accom_specIDs
			$result = DB::select('accom_specID')
				->from('connect_accomtbl')
				->where('accom_ID', '=', $accom_ID)
				->where('type', '=', $type)
				->execute()
				->as_array();
		
			foreach ($result as $accom_specID)
			{
				$accom_specIDs[] = $accom_specID;
			}

			// Retrieve keyIDs
			if ($accom_specIDs)
			{
				$accoms = $this->find_accom_key($accom_specIDs, $type);
			}
			
			return $accoms;
		}

		// Find accomplishments for multiple reports -- consolidated
		else
		{}
	}

	/**
	 * Add report accomplishments
	 */
	public function add_accom($user_ID, $accom_ID, $details, $type, $name_ID)
	{
 		// Prepare column names and values
 		foreach ($details as $column_name => $value)
 		{
			$columns[] = $column_name;
			$values[] = $value;
		}

		// Check -- unless live search & js submit to link
		$result = DB::select()
			->from('accom_'.$type.'tbl')
			->where($columns[0], '=', $values[0])
			->execute()
			->as_array();

		// Existing
		if ($result)
			$accom_specID = $result[0][$name_ID];
 		//New
 		else
 		{
 			$columns[] = 'user_ID';
 			$values[] = $user_ID;

			$insert_accom = DB::insert('accom_'.$type.'tbl')
				->columns($columns)
				->values($values)
				->execute();

			$accom_specID = $insert_accom[0];
		}	

		$this->link_accom($accom_ID, $accom_specID, $type);
	}

	public function edit_accom($user_ID, $accom_ID, $details, $type)
	{}

	public function delete_accom($user_ID, $accom_ID, $accom_specID, $type, $name_ID)
	{
		// Check for ownership
		$result = DB::select()
			->from('accom_'.$type.'tbl')
			->where($name_ID, '=', $accom_specID)
			->execute()
			->as_array();

		// Affirmative
		if ($result[0]['user_ID'] == $user_ID)
		{
			// Check for other users
			$result = DB::select()
				->from('connect_accomtbl')
				->where('accom_specID', '=', $accom_specID)
				->where('type', '=', $type)
				->execute()
				->as_array();
				echo count($result);
			// No other users
			if (count($result) == 1)
			{
				$this->unlink_accom($accom_ID, $accom_specID, $type);

				$rows_deleted = DB::delete('accom_'.$type.'tbl')
					->where($name_ID, '=', $accom_specID)
			 		->execute();

		 		if ($rows_deleted == 1) return TRUE;
		 		else return FALSE; //do something
			}

			// Used by others
			else
				$this->unlink_accom($accom_ID, $accom_specID, $type);
		}

		// Negative
		else
			$this->unlink_accom($accom_ID, $accom_specID, $type);
	}

	/**
	 * Get accomplishment details
	 */
	private function find_accom_key($accom_specIDs, $type)
	{
		$accoms = array();

		switch ($type) {

			// Journal Publication/Book/Chapter in a Book
			case 'pub':
				foreach ($accom_specIDs as $publication_ID) {
					$result = DB::select()
					->from('accom_pubtbl')
					->where('publication_ID', '=', $publication_ID)
					->execute()
					->as_array();

					$pub = array();
					foreach ($result as $detail)
					{
						$pub['publication_ID']	= $detail['publication_ID'];
						$pub['author'] 			= $detail['author'];
						$pub['title']			= $detail['title'];
						$pub['year'] 			= $detail['year'];
						$pub['type'] 			= $detail['type'];
						$pub['book_publisher']	= $detail['book_publisher'];
						$pub['book_place']		= $detail['book_place'];
						$pub['journal_volume']	= $detail['journal_volume'];
						$pub['journal_issue']	= $detail['journal_issue'];
						$pub['page']			= $detail['page'];
						$pub['refereed']		= $detail['refereed'];
						$pub['popular']			= $detail['popular'];
						$pub['user_ID']			= $detail['user_ID'];
					}

					$accoms[] = $pub;
				}
				break;

			// Award/Grants Received
			case 'awd':
				foreach ($accom_specIDs as $award_ID) {
					$result = DB::select()
					->from('accom_awdtbl')
					->where('award_ID', '=', $award_ID)
					->execute()
					->as_array();

					$awd = array();
					foreach ($result as $detail)
					{
						$awd['award_ID']	= $detail['award_ID'];
						$awd['award']		= $detail['award'];
						$awd['type']		= $detail['type'];
						$awd['source']		= $detail['source'];
						$awd['start']		= $detail['start'];
						$awd['end']			= $detail['end'];
						$awd['user_ID']		= $detail['user_ID'];
					}

					$accoms[] = $awd;
				}
				break;

			// Research Grants/Fellowships Received
			case 'rch':
				foreach ($accom_specIDs as $research_ID) {
					$result = DB::select()
					->from('accom_rchtbl')
					->where('research_ID', '=', $research_ID)
					->execute()
					->as_array();

					$rch = array();
					foreach ($result as $detail)
					{
						$rch['research_ID']		= $detail['research_ID'];
						$rch['title']			= $detail['title'];
						$rch['nature']			= $detail['nature'];
						$rch['fund_up']			= $detail['fund_up'];
						$rch['fund_external']	= $detail['fund_external'];
						$rch['fund_amount']		= $detail['fund_amount'];
						$rch['start']			= $detail['start'];
						$rch['end']				= $detail['end'];
						$rch['user_ID']			= $detail['user_ID'];
					}

					$accoms[] = $rch;
				}
				break;

			// Oral Paper/Poster Presentation
			case 'ppr':
				foreach ($accom_specIDs as $paper_ID) {
					$result = DB::select()
					->from('accom_pprtbl')
					->where('paper_ID', '=', $paper_ID)
					->execute()
					->as_array();

					$ppr = array();
					foreach ($result as $detail)
					{
						$ppr['paper_ID']	= $detail['paper_ID'];
						$ppr['author']		= $detail['author'];
						$ppr['title']		= $detail['title'];
						$ppr['activity']	= $detail['activity'];
						$ppr['venue']		= $detail['venue'];
						$ppr['start']		= $detail['start'];
						$ppr['end']			= $detail['end'];
						$ppr['user_ID']		= $detail['user_ID'];
					}

					$accoms[] = $ppr;
				}
				break;

			// Presentation of Creative Work Output
			case 'ctv':
				foreach ($accom_specIDs as $creative_ID) {
					$result = DB::select()
					->from('accom_ctvtbl')
					->where('creative_ID', '=', $creative_ID)
					->execute()
					->as_array();

					$ctv = array();
					foreach ($result as $detail)
					{
						$ctv['creative_ID']	= $detail['creative_ID'];
						$ctv['title']		= $detail['title'];
						$ctv['venue']		= $detail['venue'];
						$ctv['start']		= $detail['start'];
						$ctv['end']			= $detail['end'];
						$ctv['user_ID']		= $detail['user_ID'];
					}

					$accoms[] = $ctv;
				}
				break;

			// Participation in Seminars/Conferences/Workshops/Training Courses/Fora
			case 'par':
				foreach ($accom_specIDs as $participation_ID) {
					$result = DB::select()
					->from('accom_partbl')
					->where('participation_ID', '=', $participation_ID)
					->execute()
					->as_array();

					$par = array();
					foreach ($result as $detail)
					{
						$par['participation_ID']	= $detail['participation_ID'];
						$par['participation']		= $detail['participation'];
						$par['title']				= $detail['title'];
						$par['venue']				= $detail['venue'];
						$par['start']				= $detail['start'];
						$par['end']					= $detail['end'];
						$par['user_ID']				= $detail['user_ID'];
					}

					$accoms[] = $par;
				}
				break;

			// Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals
			case 'mat':
				foreach ($accom_specIDs as $material_ID) {
					$result = DB::select()
					->from('accom_mattbl')
					->where('material_ID', '=', $material_ID)
					->execute()
					->as_array();

					$mat = array();
					foreach ($result as $detail)
					{
						$mat['material_ID']	= $detail['material_ID'];
						$mat['year']		= $detail['year'];
						$mat['title']		= $detail['title'];
						$mat['user_ID']		= $detail['user_ID'];
					}

					$accoms[] = $mat;
				}
				break;

			// Other Accomplishments
			case 'oth':
				foreach ($accom_specIDs as $other_ID) {
					$result = DB::select()
					->from('accom_othtbl')
					->where('other_ID', '=', $other_ID)
					->execute()
					->as_array();

					$oth = array();
					foreach ($result as $detail)
					{
						$oth['other_ID']		= $detail['other_ID'];
						$oth['participation']	= $detail['participation'];
						$oth['activity']		= $detail['activity'];
						$oth['venue']			= $detail['venue'];
						$oth['start']			= $detail['start'];
						$oth['end']				= $detail['end'];
						$oth['user_ID']			= $detail['user_ID'];
					}

					$accoms[] = $oth;
				}
				break;
		}

		return $accoms;
	}

	/**
	 * Link existing accomplishment to report
	 */
	private function link_accom($accom_ID, $accom_specID, $type)
	{
		$insert_accom = DB::insert('connect_accomtbl')
			->columns(array('accom_ID', 'accom_specID', 'type'))
			->values(array($accom_ID, $accom_specID, $type))
			->execute();
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
 		else return FALSE; //do something
	}

} // End Accom