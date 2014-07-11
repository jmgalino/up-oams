<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller {

	private $view;

	public function before()
    {
    	$session = Session::instance();
		$fname = $session->get('fname');

		$this->view = View::factory('templates/template');
		$this->view->page_title = null;
		$this->view->navbar = View::factory('templates/fragments/admin')
			->bind('fname', $fname);
    }

	public function action_index()
	{
        $oams = new Model_Oams;
		$title = $oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

} // End Admin
