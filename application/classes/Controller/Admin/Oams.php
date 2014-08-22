<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Oams extends Controller_Admin {

	/**
	 * OAMS Settings
	 */
	public function action_index()
	{
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');

		$titles['title'] = $this->oams->get_title();
		$titles['initials'] = $this->oams->get_initials();
		$titles['page_title'] = $this->oams->get_page_title();
		$about = $this->oams->get_about();
		$categories = $this->oams->get_categories();

		$this->view->content = View::factory('admin/oams')
			->bind('titles', $titles)
			->bind('success', $success)
			->bind('error', $error)
			->bind('about', $about)
			->bind('categories', $categories);
		$this->response->body($this->view->render());
	}

	/**
	 * Save changes in OAMS Settings
	 */
	public function action_update()
	{
		switch ($this->request->param('id'))
		{
			case 'title':
				$this->action_update_title();
				break;
			
			case 'about':
				$this->action_update_about();
				break;

			case 'categories':
				$this->action_update_categories();
				break;
		}
	}

	/**
	 * Update OAMS Title
	 */
	private function action_update_title()
	{
		$update_success = $this->oams->update_titles($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/oams');
	}

	/**
	 * Update OAMS About
	 */
	private function action_update_about()
	{
		$update_success = $this->oams->update_about($this->request->post('about'));
		$this->session->set('success', $update_success);
		$this->redirect('admin/oams');
	}

	/**
	 * Update OAMS (IPCR/OPCR) Categories
	 */
	private function action_update_categories()
	{
		print_r($this->request->post());
		$this->redirect('admin/oams');
	}

} // End Oams
