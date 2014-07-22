<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Oams extends Controller_Admin {

	/**
	 * OAMS Settings
	 */
	public function action_index()
	{
		$title = $this->oams->get_title();
		$about = $this->oams->get_about();
		// $types = array("0" => array("type" => "sample type 1"), "1" => array("type" => "sample type 2"));
		//$types = $this->oams->get_types();
		$categories = $this->oams->get_categories();

		$this->view->content = View::factory('admin/oams')
			->bind('title', $title)
			->bind('about', $about)
			// ->bind('types', $types)
			->bind('categories', $categories);
		$this->response->body($this->view->render());
	}

} // End Oams
