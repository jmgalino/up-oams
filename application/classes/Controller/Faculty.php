<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller {

	private $view;

	public function before()
    {
    	$session = Session::instance();
		$fcode = $session->get('fcode');

		$this->view = View::factory('templates/template');
		$this->view->page_title = null;
		$this->view->navbar = View::factory('templates/fragments/faculty')
			->bind('fcode', $fcode);
    }

	public function action_index()
	{
        $oams = new Model_Oams;
		$title = $oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

} // End Faculty
