<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller_User {

	protected $view;

	public function before()
    {
    	$identifier = Session::instance()->get('identifier');
		
        if (is_null($identifier))
        	$this->redirect();
		else {
			$session = Session::instance();
			$fcode = $session->get('fcode');

			$this->view = View::factory('templates/template');
			$this->view->page_title = null;
				
    		if ($identifier == 'dean')
		    {
		    	$this->view->navbar = View::factory('templates/fragments/dean')
					->bind('fcode', $fcode);
			}
			elseif ($identifier == 'dept_chair')
		    {
		    	$this->view->navbar = View::factory('templates/fragments/dept_chair')
					->bind('fcode', $fcode);
			}
			else
			{
				$this->view->navbar = View::factory('templates/fragments/faculty')
					->bind('fcode', $fcode);
			}
		}
    }

	public function action_index()
	{
        $oams = new Model_Oams;
		$title = $oams->get_title();

		$this->view->content = View::factory('profile/index')
			->bind('title', $title);
		$this->response->body($this->view->render());
	}

	public function action_accom()
	{
	}

	/**
	 * Contact admin
	 */
	public function action_contact()
	{}

} // End Faculty
