<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Oams extends Model {

	/**
	 * Get OAMS Title
	 */
	public function get_title()
	{
		$result = DB::select('content')
			->from('oamstbl')
			->where('name', '=', 'title')
			->execute();

		return $result[0]['content'];
	}

	/**
	 * Get OAMS About
	 */
	public function get_about()
	{
		$result = DB::select('content')
			->from('oamstbl')
			->where('name', '=', 'about')
			->execute();
			
		return $result[0]['content'];
	}

	/**
	 * Get IPCR/OPCR Categories
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
	 *
	 */
	public function send_message($details)
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