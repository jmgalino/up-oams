<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Oams extends Model {

	/**
	 * Check for duplicates/uniquess
	 */
	public static function unique_record($details, $table, $exclude)
	{
		// Check if the username already exists in the database
		$query = DB::select()->from($table);
		
		foreach ($details as $key => $value)
		{
			if (!in_array($key, $exclude))
				$query->or_where($key, '=', $value); // shows record that matches any value
		}
		
		$result = $query->execute()->as_array();
		
		return count($result);
	}

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
	public function update_titles($titles)
	{
		$rows_updated = 0;

		$query = DB::query(Database::UPDATE, 'UPDATE oamstbl SET value = :value WHERE name = :name')
		    ->bind(':name', $name)
		    ->bind(':value', $value);
		 
		foreach ($titles as $name => $value)
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
			->where('deleted', '=', '0')
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
	 * New IPCR/OPCR category
	 */
	public function add_category($categories)
	{
		$flag = 0;

		foreach ($categories as $category)
		{
			$check = DB::select()
				->from('opcr_categorytbl')
				->where('category', '=', $category)
				->execute()
				->as_array();

			if (!$check)
			{
				$insert_category = DB::insert('opcr_categorytbl')
		 			->columns(array('category'))
		 			->values(array($category))
		 			->execute();
			}
			else if ($check[0]['deleted'] == '1')
			{
				$rows_updated = DB::update('opcr_categorytbl')
		 			->set(array('deleted' => '0'))
					->where('category', '=', $category)
		 			->execute();
			}
			else
			{
				$flag++;
			}
		}

		if ($flag == 0) return TRUE;
		else return FALSE;
	}

	/**
	 * Update IPCR/OPCR categories
	 */
	public function update_categories($categories)
	{
 		$rows_updated = 0;

		$query = DB::query(Database::UPDATE, 'UPDATE opcr_categorytbl SET category = :category WHERE category_ID = :id')
		    ->bind(':category', $category)
		    ->bind(':id', $id);
		 
		foreach ($categories as $id => $category)
		{
		    $result = $query->execute();
		    if ($result == 1) $rows_updated++;
		}

 		if ($rows_updated) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Delete IPCR/OPCR category
	 */
	public function delete_category($category)
	{
		// "Archives" categories -- it may be used and deletion can cause conflicts
 		$rows_updated = DB::update('opcr_categorytbl')
 			->set(array('deleted' => '1'))
			->where('category', '=', $category)
 			->execute();

 		if ($rows_updated == 1) return TRUE;
 		else return FALSE; //do something
	}

	/**
	 * Get admin messages
	 */
	public function get_messages()
	{
		$messages = DB::select()
			->from('oams_messagetbl')
			->execute()
			->as_array();

		return $messages;
	}

	/**
	 * Get message details
	 */
	public function get_message_details($message_ID)
	{
		$details = DB::select()
			->from('oams_messagetbl')
			->where('message_ID', '=', $message_ID)
			->execute()
			->as_array();

		return $details[0];
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
			$insert_target = DB::insert('oams_messagetbl')
				->columns(array_keys($details))
				->values($details)
				->execute();

			if ($insert_target[1] == 1)
				return 'Got it. We\'ll get back to you ASAP!';
			else
			{
				$session = Session::instance();
				$session->set('error', 'Something went wrong. Please try again.');
				$session->set('details', $details);
				return FALSE;
			}
		}
		else
		{
			return 'We got your message the first time. We\'ll get back to you ASAP!';
		}
	}

	/**
	 * Update message
	 */
	public function update_message($details)
	{
		$rows_updated = DB::update('oams_messagetbl')
 			->set($details)
			->where('message_ID', '=', $details['message_ID'])
 			->execute();

 		// if ($rows_updated == 1) return TRUE;
 		// else return FALSE; //do something
	}

	/**
	 * Delete message
	 */
	public function delete_message($message_ID)
	{
		$rows_deleted = DB::delete('oams_messagetbl')
 			->where('message_ID', '=', $message_ID)
 			->execute();

 		if ($rows_deleted == 1) return 'Message was successfully deleted.';
 		else return FALSE; //do something
	}
	
} // End Oams