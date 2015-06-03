<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_App extends Controller_Admin {

	/**
	 * App Settings
	 */
	public function action_index()
	{
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');

		$titles['title'] = $this->app->get_title();
		$titles['initials'] = $this->app->get_initials();
		$titles['page_title'] = $this->app->get_page_title();
		$about = $this->app->get_about();
		$announcements = $this->app->get_announcements(NULL, 'univ', FALSE);
		$categories = $this->app->get_categories();

		$this->view->content = View::factory('admin/app')
			->bind('titles', $titles)
			->bind('success', $success)
			->bind('error', $error)
			->bind('about', $about)
			->bind('announcements', $announcements)
			->bind('categories', $categories);
		$this->response->body($this->view->render());
	}

	/* ==================================== *
    *                                       *
    *			  Announcements				*
    *                                       *
    * ===================================== */

	/**
	 * List announcements
	 */
	public function action_announcements()
	{
		$announcement_ID = $this->request->param('id');

		switch ($this->request->param('type'))
		{
			case 'new':
				$this->announcement_new();
				break;

			case 'update':
				$this->announcement_update();
				break;

			case 'archived':
				$this->announcement_archived();
				break;

			case 'archive':
				$this->announcement_archive($announcement_ID);
				break;

			case 'restore':
				$this->announcement_restore($announcement_ID);
				break;

			case 'delete':
				$this->announcement_delete($announcement_ID);
				break;

			default:
				$initials = $this->app->get_initials();
				$success = $this->session->get_once('success');
				$announcements = $this->app->get_announcements(NULL, 'univ', FALSE);

				$new_url = 'admin/app/announcements/new';
				$archive_url = URL::site('admin/app/announcements/archived');
				$ajax_url = URL::site('extras/ajax/announcement_details');
				$update_url = URL::site('admin/app/announcements/update');
				$delete_url = URL::site('admin/app/announcements/archive');
				
				$this->view->content = View::factory('admin/app/announcements')
					->bind('initials', $initials)
					->bind('new_url', $new_url)
					->bind('archive_url', $archive_url)
					->bind('success', $success)
					->bind('announcements', $announcements)
					->bind('ajax_url', $ajax_url)
					->bind('update_url', $update_url)
					->bind('delete_url', $delete_url);
				$this->response->body($this->view->render());
				break;
		}
	}

	/**
	 * Create announcement
	 */
	private function announcement_new()
	{
		$details = $this->request->post();
		$details['user_ID'] = NULL;
		$details['type'] = 'univ';
		$details['date_created'] = date('Y-m-d H:i:s');
		
		$add_success = $this->app->add_announcement($details);
		$this->session->set('success', $add_success);
		$this->redirect('admin/app/announcements', 303);	
	}

	/**
	 * Update announcements
	 */
	private function announcement_update()
	{
		$details = $this->request->post();
		$details['edited'] = 1;
		
		$update_success = $this->app->update_announcement($details);
		$this->session->set('success', $update_success);
		$this->redirect('admin/app/announcements', 303);
	}

	/**
	 * List archived announcements
	 */
	private function announcement_archived()
	{
		$initials = $this->app->get_initials();
		$success = $this->session->get_once('success');
		$announcements = $this->app->get_announcements(NULL, 'univ', TRUE);

		$announcement_url = URL::site('admin/app/announcements');
		$ajax_url = URL::site('extras/ajax/announcement_details');
		$restore_url = URL::site('admin/app/announcements/restore');
		$delete_url = URL::site('admin/app/announcements/delete');
		
		$this->view->content = View::factory('admin/app/archive')
			->bind('initials', $initials)
			->bind('announcement_url', $announcement_url)
			->bind('success', $success)
			->bind('announcements', $announcements)
			->bind('ajax_url', $ajax_url)
			->bind('restore_url', $restore_url)
			->bind('delete_url', $delete_url);
		$this->response->body($this->view->render());
	}

	/**
	 * Archive Announcement
	 */
	public function announcement_archive($announcement_ID)
	{
		$details['announcement_ID'] = $announcement_ID;
		$details['date_deleted'] = date('Y-m-d H:i:s');
		$details['deleted'] = 1;

		$archive_success = ($this->app->update_announcement($details) ? 'The announcement was successfully archived.' : $archive_success);
		$this->session->set('success', $archive_success);
		$this->redirect('admin/app/announcements', 303);
	}
	
	/**
	 * Restore Announcement
	 */
	private function announcement_restore($announcement_ID)
	{
		$details['announcement_ID'] = $announcement_ID;
		$details['deleted'] = 0;

		$restore_success = ($this->app->update_announcement($details) ? 'The announcement was successfully restored.' : $restore_success);
		$this->session->set('success', $restore_success);
		$this->redirect('admin/app/announcements/archived', 303);
	}

	/**
	 * Delete Announcement
	 */
	private function announcement_delete($announcement_ID)
	{
		$details['announcement_ID'] = $announcement_ID;
		
		$delete_success = ($this->app->delete_announcement($details) ? 'The announcement was successfully deleted.' : $delete_success);
		$this->session->set('success', $delete_success);
		$this->redirect('admin/app/announcements/archived', 303);
	}

	/* ==================================== *
    *                                       *
    *			  App Settings				*
    *                                       *
    * ===================================== */

	/**
	 * Save changes in App Settings
	 */
	public function action_update()
	{
		switch ($this->request->param('type'))
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
	 * Update App Title
	 */
	private function update_title()
	{
		$update_success = $this->app->update_titles($this->request->post());
		$this->session->set('success', $update_success);
		$this->redirect('admin/app', 303);
	}

	/**
	 * Update App Description
	 */
	private function update_about()
	{
		$update_success = $this->app->update_about($this->request->post('about'));
		$this->session->set('success', $update_success);
		$this->redirect('admin/app', 303);
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
		$categories = $this->app->get_categories();
		
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
					$update_success = $this->app->update_categories($update);
					break;
				}
			}
		}

		// Inserts new categories if any
		if ($new)
			$add_success = $this->app->add_category($new);

		// Check for deleted categories
		foreach ($categories as $category)
		{
			// Category doesn't exist in the new list, archived
			if (!array_key_exists($category['category_ID'], $categoryArr))
				$delete_success = $this->app->delete_category($category['category']);
		}

		if (!array_diff($current, $categoryArr) && !array_diff($categoryArr, $current))
			$this->redirect('admin/app', 303);
		elseif ($update_success AND $add_success AND $delete_success)
			$this->session->set('success', 'The categories were updated successfully.');	
		else 
			$this->session->set('error', 'One or more categories were not successfully added/updated.');
		
		$this->redirect('admin/app', 303);
	}

} // End App
