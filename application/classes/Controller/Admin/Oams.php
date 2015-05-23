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
		$announcements = $this->oams->get_announcements(NULL, 'univ', FALSE);
		$categories = $this->oams->get_categories();

		$this->view->content = View::factory('admin/oams')
			->bind('titles', $titles)
			->bind('success', $success)
			->bind('error', $error)
			->bind('about', $about)
			->bind('announcements', $announcements)
			->bind('categories', $categories);
		$this->response->body($this->view->render());
	}

	/**
	 * List announcements
	 */
	public function action_announcements()
	{
		$initials = $this->oams->get_initials();
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		$announcements = $this->oams->get_announcements(NULL, 'univ', FALSE);
		
		$this->view->content = View::factory('admin/oams/announcements')
			->bind('initials', $initials)
			->bind('success', $success)
			->bind('error', $error)
			->bind('announcements', $announcements);
		$this->response->body($this->view->render());
	}

	/**
	 * Something new
	 */
	public function action_new()
	{
		switch ($this->request->param('id'))
		{
			case 'announcement':
				$this->new_announcement();
				break;
		}
	}

	/**
	 * Create announcement
	 */
	private function new_announcement()
	{
		$details = $this->request->post();
		$details['user_ID'] = NULL;
		$details['type'] = 'univ';
		$details['date_created'] = date('Y-m-d H:i:s');
		
		$add_success = $this->oams->add_announcement($details);
		$this->session->set('success', $add_success);
		$this->redirect('admin/oams/announcements', 303);	
	}

	/**
	 * Save changes in OAMS Settings
	 */
	public function action_update()
	{
		switch ($this->request->param('id'))
		{
			case 'title':
				$this->update_title();
				break;
			
			case 'about':
				$this->update_about();
				break;

			case 'announcement':
				$this->update_announcement();
				break;

			case 'categories':
				$this->update_categories();
				break;
		}
	}

	/**
	 * Update OAMS Title
	 */
	private function update_title()
	{
		$update_success = $this->oams->update_titles($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/oams', 303);
	}

	/**
	 * Update OAMS About
	 */
	private function update_about()
	{
		$update_success = $this->oams->update_about($this->request->post('about'));
		$this->session->set('success', $update_success);
		$this->redirect('admin/oams', 303);
	}

	/**
	 * Update Announcements
	 */
	private function update_announcement()
	{
		$details = $this->request->post();
		$details['edited'] = 1;
		
		$update_success = $this->oams->update_announcement($details);
		$this->session->set('success', $update_success);
		$this->redirect('admin/oams/announcements', 303);
	}

	/**
	 * Update IPCR/OPCR Categories
	 * Note: Cannot verify if unique
	 */
	private function update_categories()
	{
		$new = array();
		$update = array();
		$add_success = TRUE;
		$update_success = TRUE;
		$delete_success = TRUE;
		$categoryArr = $this->request->post();
		$categories = $this->oams->get_categories();
		
		// Get current categories
		$current = array();
		foreach ($categories as $category)
		{
			$current[] = $category['category'];
		}

		// Separates new and current categories
		foreach ($categoryArr as $key => $value)
		{
			if (is_numeric($key))
				$update[$key] = $value;
			else
				$new[] = $value;
		}
		
		// Updates old categories if necessary
		if ($update)
		{
			// Check for any changes in current categories
			foreach ($update as $category)
			{
				if (!in_array($category, $current))
				{
					$update_success = $this->oams->update_categories($update);
					break;
				}
			}
		}

		// Inserts new categories if any
		if ($new)
			$add_success = $this->oams->add_category($new);

		// Check for deleted categories
		foreach ($categories as $category)
		{
			// Category doesn't exist in the new list, archived
			if (!array_key_exists($category['category_ID'], $categoryArr))
				$delete_success = $this->oams->delete_category($category['category']);
		}

		if (!array_diff($current, $categoryArr) && !array_diff($categoryArr, $current))
			$this->redirect('admin/oams', 303);
		elseif ($update_success AND $add_success AND $delete_success)
			$this->session->set('success', 'The categories were updated successfully.');	
		else 
			$this->session->set('error', 'One or more categories were not successfully added/updated.');
		
		$this->redirect('admin/oams', 303);
	}

} // End Oams
