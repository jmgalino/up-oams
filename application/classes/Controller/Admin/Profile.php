<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Profile extends Controller_Admin {

	/**
	 * User Profiles
	 */
	public function action_index()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		$employee_code = $this->session->get('employee_code');
		$users = $user->get_users();
		$programs = $univ->get_programs();

		$this->view->content = View::factory('admin/profile')
			->bind('success', $success)
			->bind('error', $error)
			->bind('users', $users)
			->bind('employee_code', $employee_code)
			->bind('programs', $programs);
		$this->response->body($this->view->render());
	}

	/**
	 * Create new user profile
	 */
	public function action_new()
	{
		$details = $this->request->post();
		$details['birthday'] = date('Y-m-d', strtotime($details['birthday']));

		if ($details['user_type'] == 'Admin')
		{
			$details['faculty_code'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
			$details['department_ID'] = NULL;
			$details['position'] = NULL;
		}
		else
		{
			$univ = new Model_Univ;
			$department = $univ->get_program_details($details['program_ID']);
			$details['department_ID'] = $department['department_ID'];

	 		// Univ update
			$univ_updated = $this->update_univ($details, FALSE);
		}

		$user = new Model_User;
		if (!$user->add_user($details)) $this->session->set('success', $user->add_user($details));
		$this->redirect('admin/profile/view/'.$details['employee_code'], 303);
	}

	/**
	 * View user profile
	 */
	public function action_view()
	{
		// if ($this->request->param('document'))
		// 	$this->action_pdfviewer();

		$univ = new Model_Univ;
		$user = new Model_User;

		$upload = $this->session->get_once('upload');
		$update = $this->session->get_once('update');
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');

		$user_details = $user->get_details(NULL, $this->request->param('id'));
		
		if ($user_details)
		{
			$programs = $univ->get_programs();

			if ($user_details['user_type'] == 'Faculty')
			{
				$program = $univ->get_program_details($user_details['program_ID']);
				$user_details['program_short'] = $program['program_short'];
			}
			// $accom_rows = $accom->get_faculty_accom($user['user_ID']);
			// $ipcr_rows = NULL;
			// $opcr_rows = NULL;
			// $cuma_rows = NULL;

			$this->view->content = View::factory('admin/profile/template')
				->bind('user', $user_details)
				// ->bind('accom_rows', $accom_rows)
				// ->bind('ipcr_rows', $ipcr_rows)
				// ->bind('opcr_rows', $opcr_rows)
				// ->bind('cuma_rows', $cuma_rows)
				->bind('upload', $upload)
				->bind('success', $success)
				->bind('update', $update)
				->bind('error', $error)
				->bind('programs', $programs);
			$this->response->body($this->view->render());
		}
		else
		{
			$this->session->set('error', 'User does not exist.');
			$this->redirect('admin/error');
		}
	}

	/**
	 * Update user profile
	 */
	public function action_update()
	{
		$user = new Model_User;
		$univ_updated = TRUE;

		$details = $this->request->post();
		$details['birthday'] = date('Y-m-d', strtotime($details['birthday']));

		if ($details['user_type'] == 'Admin')
		{
			$details['faculty_code'] = NULL;
			$details['rank'] = NULL;
			$details['program_ID'] = NULL;
			$details['department_ID'] = NULL;
			$details['position'] = NULL;
		}
		else
		{
			$univ = new Model_Univ;
			$department = $univ->get_program_details($details['program_ID']);
			$details['department_ID'] = $department['department_ID'];

	 		// Univ update
			$univ_updated = $this->update_univ($details, TRUE);
		}
 
		$update_success = ($univ_updated ? $user->update_details($details) : FALSE);
		$this->session->set('success', $update_success);

		$this->redirect('admin/profile/view/'.$details['employee_code'], 303);
	}

 	/**
     * Upload user photo
     */
    public function action_upload()
    {
        $user = new Model_User;
        
        $user_ID = $this->request->param('id');
        $user_details = $user->get_details($user_ID, NULL);
        $filename = NULL;
 
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['photo']))
            {
                $filename = $this->save_image($_FILES['photo'], $user_details['last_name']);
            }
        }
 
        if (!$filename)
        {
            $this->session->set('error', 'There was a problem while uploading the image.');
        }
        else
        {
            if($user_details['pic'])
                unlink(DOCROOT.'files/upload_photos/'.$user_details['pic']);

            $update_success = $user->update_details(array('user_ID'=>$user_ID, 'pic'=>$filename));
            $success = ($update_success ? $user_details['first_name'].'\'s photo was successfully uploaded.' : FALSE);
            $this->session->set('success', $success);
            $this->redirect('admin/profile/view/'.$user_details['employee_code'], 303);
        }       
    }

	/**
	 * Reset user password
	 */
	public function action_reset()
	{
		$user = new Model_User;

		$reset_success = $user->reset_password($this->request->param('id'));
		$this->session->set('success', $reset_success);

		$referrer = $this->request->referrer();
		$view = strpos($referrer, 'view');
		if ($view) 
			$this->redirect('admin/profile/view/'.$this->request->param('id'), 303);
		else
			$this->redirect('admin/profile', 303);
	}

	/**
	 * Delete user profile
	 */
	public function action_delete()
	{
		$user = new Model_User;
		
		$delete_success = $user->delete_profile($this->request->param('id'));
		$this->session->set('success', $delete_success);

		$this->redirect('admin/profile', 303);
	}
 
    /**
     * Save photo in local disk
     */
    private function save_image($image, $surname)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'files/upload_photos/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).$surname.'.jpg';
 
            $img = Image::factory($file);
            $height = $img->height;
            $width = $img->width;

            if ($height > $width)
                $img->crop($width, $width);
            else
                $img->crop($height, $height);
    
            $img->resize(200, 200, Image::AUTO)
                ->save($directory.$filename);

            // Delete the temporary file
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }

 	/**
	 * Update univ details
	 */
	private function update_univ($user_details, $check)
 	{
 		$univ = new Model_Univ;
 		$user = new Model_User;

 		if ($user_details['position'] == 'dean')
		{
			$college_details = $univ->get_college_details(NULL, $user_details['program_ID']);
			if ($college_details['user_ID'] == $user_details['user_ID'])
				return TRUE;
			else
			{
				$user_updated = ($college_details['user_ID'] ? $user->update_details(array('user_ID' => $college_details['user_ID'], 'position' => 'none')) : TRUE);
				$college_updated = $univ->update_college(array('college_ID'=>$college_details['college_ID'], 'user_ID'=>$user_details['user_ID']));
				return ($user_updated AND $college_updated);
			}
		}
		elseif ($user_details['position'] == 'dept_chair')
		{
			$department_details = $univ->get_department_details(NULL, $user_details['program_ID']);
			if ($department_details['user_ID'] == $user_details['user_ID'])
				return TRUE;
			else
			{
				$user_updated = ($department_details['user_ID'] ? $user->update_details(array('user_ID' => $department_details['user_ID'], 'position' => 'none')) : TRUE);
				$department_updated = $univ->update_department(array('department_ID'=>$department_details['department_ID'], 'user_ID'=>$user_details['user_ID']));
				return ($user_updated AND $department_updated);
			}
		}

		if ($check AND $user_details['position'] == 'none')
		{
			$univ_updated = TRUE;
			$college_details = $univ->get_college_details(NULL, $user_details['program_ID']);
			$department_details = $univ->get_department_details(NULL, $user_details['program_ID']);

			if ($college_details['user_ID'] == $user_details['user_ID'])
				$univ_updated = $univ->update_college(array('college_ID'=>$college_details['college_ID'], 'user_ID'=>NULL));
			
			elseif ($department_details['user_ID'] == $user_details['user_ID'])
				$univ_updated = $univ->update_department(array('department_ID'=>$department_details['department_ID'], 'user_ID'=>NULL));

			return $univ_updated;
		}
 	}

	// private function action_pdfviewer()
	// {
	// 	$user = new Model_User;

	// 	$document = $this->request->param('document');
	// 	$document_ID = $this->request->param('document_ID');
	// 	$user = $user->get_details(NULL, $this->request->param('id'));

	// 	switch ($document)
	// 	{
	// 		case 'accom':
	// 			# code...
	// 			break;

	// 		case 'ipcr':
	// 			# code...
	// 			break;

	// 		case 'opcr':
	// 			# code...
	// 			break;

	// 		case 'value':
	// 			# code...
	// 			break;
	// 	}
		
	// 	$this->view->content = View::factory('admin/profile/pdfviewer')
	// 		->bind('first_name', $user['first_name'])
	// 		->bind('label', $label)
	// 		->bind('filename', $filename);
	// 	$this->response->body($this->view->render());
	// }
	
} // End User
