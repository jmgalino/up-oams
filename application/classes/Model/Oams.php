<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Oams extends Model {

	/**
	 * Get title
	 */
	public function get_title()
	{
		$result = DB::select('value')
			->from('oamstbl')
			->where('name', '=', 'title')
			->execute();

		return $result[0]['value'];
	}

	/**
	 * Get initials
	 */
	public function get_initials()
	{
		$result = DB::select('value')
			->from('oamstbl')
			->where('name', '=', 'initials')
			->execute();

		return $result[0]['value'];
	}

	/**
	 * Get page title
	 */
	public function get_page_title()
	{
		$result = DB::select('value')
			->from('oamstbl')
			->where('name', '=', 'page_title')
			->execute();

		return $result[0]['value'];
	}

	/**
	 * Update titles
	 */
	public function update_titles($details)
	{
		$rows_updated = 0;

		$query = DB::query(Database::UPDATE, 'UPDATE oamstbl SET value = :value WHERE name = :name')
		    ->bind(':name', $name)
		    ->bind(':value', $value);
		 
		foreach ($details as $name => $value)
		{
		    $result = $query->execute();
		    if ($result == 1) $rows_updated++;
		}

 		if ($rows_updated == 1) return 'The title was successfully updated.';
 		elseif ($rows_updated > 1) return 'The titles were successfully updated.';
 		else return FALSE; //do something
	}

	/**
	 * Get About
	 */
	public function get_about()
	{
		$result = DB::select('value')
			->from('oamstbl')
			->where('name', '=', 'about')
			->execute();
			
		return $result[0]['value'];
	}

	/**
	 * Update About
	 */
	public function update_about($about)
	{
		$rows_updated = DB::update('oamstbl')
 			->set(array('value' => $about))
			->where('name', '=', 'about')
 			->execute();

 		if ($rows_updated == 1) return '"About" was successfully updated.';
 		else return FALSE; //do something
	}

	/**
	 * Get IPCR/OPCR categories
	 */
	public function get_categories()
	{
		$result = DB::select()
			->from('opcr_categorytbl')
			->execute()
			->as_array();

		$categories = array();
		foreach ($result as $category)
		{
			$categories[] = $category;
		}

		return $categories;
	}

	/**
	 * Get admin messages
	 */
	public function get_messages()
	{
		$result = DB::select()
			->from('oams_messagetbl')
			->execute()
			->as_array();

		$messages = array();
		foreach ($result as $message) {
			$messages[] = $message;
		}

		return $messages;
	}

	/**
	 * New message
	 */
	public function new_message($details)
	{
		$result = DB::select()
			->from('oams_messagetbl')
			->where('name', '=', $details['name'])
			->where('contact', '=', $details['contact'])
			->where('subject', '=', $details['subject'])
			->where('message', '=', $details['message'])
			->execute()
			->as_array();

		// No similar entry in the database
		if (!$result)
 		{
			// Prepare column names and values
	 		foreach ($details as $column_name => $value) {
				$columns[] = $column_name;
				$values[] = $value;
			}

			$insert_target = DB::insert('oams_messagetbl')
				->columns($columns)
				->values($values)
				->execute();

			return $insert_target;
		}
	}
	
} // End Oams