<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_User {

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		if ($this->session->get('identifier') != 'admin')
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect($this->session->get('identifier').'/error');
		}
	}

	/**
	 * Show homepage
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		
		$identifier = $this->session->get('identifier');
		
		$title = $this->oams->get_title();
		$announcements = $this->oams->get_announcements(NULL, 'univ');
		
		$general = 'admin';

		$this->view->content = View::factory('profile/index')
			->bind('title', $title)
			->bind('announcements', $announcements)
			->bind('identifier', $general);
		$this->response->body($this->view->render());
	}

	/**
	 * Show announcements
	 */
	public function action_announcements()
	{
		$univ = new Model_Univ;

		$identifier = $this->session->get('identifier');

		$announcements = $this->oams->get_announcements(NULL, 'univ');

		$this->view->content = View::factory('profile/announcements')
			->bind('announcements', $announcements)
			->bind('identifier', $identifier);
		$this->response->body($this->view->render());
	}

	/**
	 * Show profile
	 */
	public function action_myprofile()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$user_details = $user->get_details($this->session->get('user_ID'), NULL);
		
		$this->view->content = View::factory('profile/myprofile/admin')
			->bind('user', $user_details);
		$this->response->body($this->view->render());
	}

	/**
	 * List messages
	 */
	protected function action_messages()
	{
		$success = $this->session->get_once('success');
		$messages = $this->oams->get_messages();

		$this->view->content = View::factory('admin/messages')
			->bind('success', $success)
			->bind('messages', $messages);
		$this->response->body($this->view->render());
	}

	/**
	 * Add star
	 */
	public function action_star()
	{
		$message_ID = $this->request->param('id');
		$this->oams->update_message(array('message_ID'=>$message_ID, 'star'=>'1'));
		$this->redirect('admin/messages', 303);
	}

	/**
	 * Remove star
	 */
	public function action_remove_star()
	{
		$message_ID = $this->request->param('id');
		$this->oams->update_message(array('message_ID'=>$message_ID, 'star'=>'0'));
		$this->redirect('admin/messages', 303);
	}

	/**
	 * Mark message as read
	 */
	public function action_read()
	{
		$message_ID = $this->request->param('id');
		$this->oams->update_message(array('message_ID'=>$message_ID, 'seen'=>'1'));
		$this->redirect('admin/messages', 303);
	}

	/**
	 * Mark message as unread
	 */
	public function action_unread()
	{
		$message_ID = $this->request->param('id');
		$this->oams->update_message(array('message_ID'=>$message_ID, 'seen'=>'0'));
		$this->redirect('admin/messages', 303);
	}

	/**
	 * Archive message
	 */
	public function action_archive()
	{
		$message_ID = $this->request->param('id');
		$archive_success = $this->oams->archive_message($message_ID);
		$this->session->set('success', $archive_success);
		$this->redirect('admin/messages', 303);
	}

	/**
	 * Delete message
	 */
	// public function action_delete()
	// {
	// 	$message_ID = $this->request->param('id');
	// 	$delete_success = $this->oams->delete_message($message_ID);
	// 	$this->session->set('success', $delete_success);
	// 	$this->redirect('admin/messages', 303);
	// }

} // End Admin
