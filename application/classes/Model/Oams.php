<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Oams extends Model {

	public function get_title()
	{
		$result = DB::select('content')
			->from('oamstbl')
			->where('name', '=', 'title')
			->execute();

		return $result[0]['content'];
	}

	public function get_about()
	{
		$result = DB::select('content')
			->from('oamstbl')
			->where('name', '=', 'about')
			->execute();
			
		return $result[0]['content'];
	}

	public function get_messages()
	{
		$messages = array();

		$result = DB::select()
			->from('oams_messagetbl')
			->execute()
			->as_array();

		foreach ($result as $message) {
			$messages[] = $message;
		}

		return $messages;
	}

	public function get_categories()
	{
		$categories = array();

		$result = DB::select()
			->from('oams_categorytbl')
			->execute()
			->as_array();

		foreach ($result as $category)
		{
			$categories[] = $category;
		}

		return $categories;
	}
	
} // End Oams