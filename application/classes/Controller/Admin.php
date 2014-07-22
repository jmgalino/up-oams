<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_User {

	protected $oams;
	protected $univ;
	protected $user;
	protected $session;
	protected $view;

	public function before()
    {
        $identifier = Session::instance()->get('identifier');
		
        if (is_null($identifier))
        	$this->redirect();
		
    	$this->oams = new Model_Oams;
		$this->user = new Model_User;
		$this->univ = new Model_Univ;
    	$this->session = Session::instance();

		$fname = $this->session->get('fname');

		$this->view = View::factory('templates/template');
		$this->view->page_title = null;
		$this->view->navbar = View::factory('templates/fragments/admin')
			->bind('fname', $fname);
    }

	/**
	 * List messages
	 */
	public function action_messages()
	{
		$messages = $this->oams->get_messages();

		$this->view->content = View::factory('admin/messages')
			->bind('messages', $messages);
		$this->response->body($this->view->render());
	}

} // End Admin
