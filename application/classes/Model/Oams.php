<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Oams extends Model {

	public function get_title()
	{
		$query = DB::select('content')
			->from('oamstbl')
			->where('name', '=', 'title');
		$result = $query->execute();
		return $result[0]['content'];
	}

	public function get_about()
	{
		$query = DB::select('content')
			->from('oamstbl')
			->where('name', '=', 'about');
		$result = $query->execute();
		return $result[0]['content'];
	}

	public function get_categories()
	{
		$query = DB::select()
			->from('oams_categorytbl');
		$result = $query->execute()->as_array();

		foreach ($result as $category) {
			$categories[] = $category;
		}

		return $categories;
	}
	
} // End Oams