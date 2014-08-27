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
	{echo 'add';
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
	{echo 'update';
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
	{echo 'delete';
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