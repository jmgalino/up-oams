<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_User {

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		if ($this->session->get('identifier') != 'dean')
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect('faculty/error');
		}

		$this->univ = new Model_Univ;
		$this->user = new Model_User;

		$this->college_details = $this->univ->get_college_details(NULL, $this->session->get('program_ID'));
		$programIDs = $this->univ->get_college_programIDs($this->college_details['college_ID']);
		$this->college_users = $this->user->get_user_group($programIDs);

		$this->college_userIDs = array();
		foreach ($this->college_users as $college_user)
		{
			$this->college_userIDs[] = $college_user['user_ID'];
		}
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
