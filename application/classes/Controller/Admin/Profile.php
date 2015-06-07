<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Profile extends Controller_Admin {

	private $user;

	/**
	 * Initialization of User_Model;
	 */
	public function before()
	{
		parent::before();

		 $this->user = new Model_User;
	}

	/**
	 * User Profiles
	 */
	public function action_index()
	{
		$univ = new Model_Univ;

		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');
		$employee_code = $this->session->get('employee_code');
		$users = $this->user->get_users();
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
			$details['position'] = NULL;
		}

		$success = $this->user->add_user($details);
		$message = $details['first_name'].'\'s profile was successfully created.';
		if ($success) $this->session->set('success', $message);
		$this->redirect('admin/profile/view/'.$details['employee_code'], 303);
	}

	/**
	 * View user profile
	 */
	public function action_view()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;

		$upload = $this->session->get_once('upload');
		$update = $this->session->get_once('update');
		$success = $this->session->get_once('success');
		$error = $this->session->get_once('error');

		$user_details = $this->user->get_details(NULL, $this->request->param('type'));
		$accom_reports = $accom->get_faculty_accom($user_details['user_ID'], NULL, NULL, TRUE);
		
		if ($user_details)
		{
			$programs = $univ->get_programs();

			if ($user_details['user_type'] == 'Faculty')
			{
				$education = $this->user->get_education($user_details['user_ID'], NULL);
				$program = $univ->get_program_details($user_details['program_ID']);
				$user_details['program_short'] = $program['program_short'];

				if ($user_details['rank'] == 'Prof.') $user_details['rank'] = 'Professor';
				elseif ($user_details['rank'] == 'Assoc. Prof.') $user_details['rank'] = 'Associate Professor';
				elseif ($user_details['rank'] == 'Asst. Prof.') $user_details['rank'] = 'Assistant Professor';
				else $user_details['rank'] = 'Instructor';

				if ($accom_reports)
				{
					$reports = array();
					$accom_IDs = array();
					foreach ($accom_reports as $report)
					{
						if (in_array($report['status'], array('Accepted', 'Pending', 'Saved')))
						{
							$reports[] = $report;
							$accom_IDs[] = $report['accom_ID'];
						}
					}

					if ($accom_IDs)
					{
						$pub = $accom->get_accoms($accom_IDs, 'pub');
						$awd = $accom->get_accoms($accom_IDs, 'awd');
						$rch = $accom->get_accoms($accom_IDs, 'rch');
						$ppr = $accom->get_accoms($accom_IDs, 'ppr');
						$ctv = $accom->get_accoms($accom_IDs, 'ctv');
						$par = $accom->get_accoms($accom_IDs, 'par');
						$mat = $accom->get_accoms($accom_IDs, 'mat');
						$oth = $accom->get_accoms($accom_IDs, 'oth');
					}
				}
			}
			else
			{
				$reports = NULL;
				$pub = NULL;
				$awd = NULL;
				$rch = NULL;
				$ppr = NULL;
				$ctv = NULL;
				$par = NULL;
				$mat = NULL;
				$oth = NULL;
				$education = NULL;
			}
			
			$this->view->content = View::factory('admin/profile/template')
				->bind('user', $user_details)
				->bind('education', $education)
				->bind('accom_reports', $reports)
				->bind('accom_pub', $pub)
				->bind('accom_awd', $awd)
				->bind('accom_rch', $rch)
				->bind('accom_ppr', $ppr)
				->bind('accom_ctv', $ctv)
				->bind('accom_par', $par)
				->bind('accom_mat', $mat)
				->bind('accom_oth', $oth)
				->bind('upload', $upload)
				->bind('update', $update)
				->bind('success', $success)
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
		$univ_updated = TRUE;

		$new_details = $this->request->post();
		$old_details = $this->user->get_details(NULL, $new_details['employee_code']);
 		$new_details['birthday'] = date('Y-m-d', strtotime($new_details['birthday']));

		if ($new_details['user_type'] == 'Admin')
		{
			$new_details['faculty_code'] = NULL;
			$new_details['rank'] = NULL;
			$new_details['program_ID'] = NULL;
			$new_details['position'] = NULL;
		}

		// University update
		elseif ($old_details['position'] != $new_details['position'])
			$univ_updated = $this->update_univ($new_details);
 
		$update_success = ($univ_updated == TRUE ? $this->user->update_details($new_details) : FALSE);
		$this->session->set('success', $update_success);

		$this->redirect('admin/profile/view/'.$new_details['employee_code'], 303);
	}

	/**
	 * Add educational attainment
	 */
	public function action_new_education()
	{
		$details = $this->request->post();
		$user_ID = $this->request->param('type');
		$user_details = $this->user->get_details($user_ID, NULL);

		$details['user_ID'] = $user_ID;
		$details['date_obtained'] = ($details['continuing'] == '1' ? NULL : date('Y-m-d', strtotime($details['date_obtained'])));
		switch ($details['qualification']) {
			case 'certificate':
				$details['value'] = 1;
				break;
				
			case 'bachelor':
				$details['value'] = 2;
				break;
				
			case 'honours':
				$details['value'] = 3;
				break;
				
			case 'master':
				$details['value'] = 4;
				break;
				
			case 'postgraduate':
				$details['value'] = 5;
				break;
				
			case 'graduate':
				$details['value'] = 6;
				break;
				
			case 'doctorate':
				$details['value'] = 7;
				break;
		}

        $add_success = $this->user->add_education($details);
		$this->session->set('success', $add_success);
		$this->redirect('admin/profile/view/'.$user_details['employee_code'], 303);
	}

	/**
	 * Update educational attainment details
	 */
	public function action_update_education()
	{
		$details = $this->request->post();
		$user_ID = $this->request->param('type');
		$user_details = $this->user->get_details($user_ID, NULL);

		$details['date_obtained'] = ($details['continuing'] == '1' ? NULL : date('Y-m-d', strtotime($details['date_obtained'])));
		switch ($details['qualification']) {
			case 'certificate':
				$details['value'] = 1;
				break;
				
			case 'bachelor':
				$details['value'] = 2;
				break;
				
			case 'honours':
				$details['value'] = 3;
				break;
				
			case 'master':
				$details['value'] = 4;
				break;
				
			case 'postgraduate':
				$details['value'] = 5;
				break;
				
			case 'graduate':
				$details['value'] = 6;
				break;
				
			case 'doctorate':
				$details['value'] = 7;
				break;
		}

		$update_success = $this->user->update_education($details);
		if ($update_success) $this->session->set('success', $user_details['first_name'].'\'s educational background was successfully updated.');
		else $this->session->set('success', $update_success);
		$this->redirect('admin/profile/view/'.$user_details['employee_code'], 303);
	}

 	/**
     * Upload user photo
     */
    public function action_upload()
    {
		$user_ID = $this->request->param('type');
		$user_details = $this->user->get_details($user_ID, NULL);
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

            $update_success = $this->user->update_details(array('user_ID'=>$user_ID, 'pic'=>$filename));
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
		$user_ID = $this->request->param('type');
		$reset_success = $this->user->reset_password($user_ID);
		$this->session->set('success', $reset_success);

		$referrer = $this->request->referrer();
		$view = strpos($referrer, 'view');
		if ($view)
		{
			$user_details = $this->user->get_details($user_ID, NULL);
			$this->redirect('admin/profile/view/'.$user_details['employee_code'], 303);
		}
		else
			$this->redirect('admin/profile', 303);
	}

	/**
	 * Delete user profile
	 */
	public function action_delete()
	{
		$delete_success = $this->user->delete_profile($this->request->param('type'));
		$this->session->set('success', $delete_success);

		$this->redirect('admin/profile', 303);
	}

 	/**
	 * Update univ users
	 */
	private function update_univ(&$user_details)
 	{
 		$univ = new Model_Univ;

		if ($user_details['position'] == 'none')
		{
			$univ_updated = TRUE;
			$college_details = $univ->get_college_details(NULL, $user_details['program_ID']);
			$department_details = $univ->get_department_details(NULL, $user_details['program_ID']);

			if ($college_details AND $college_details['user_ID'] == $user_details['user_ID'])
				$univ_updated = $univ->update_college(array('college_ID' => $college_details['college_ID'], 'user_ID' => NULL));
			
			elseif ($department_details AND $department_details['user_ID'] == $user_details['user_ID'])
				$univ_updated = $univ->update_department(array('department_ID' => $department_details['department_ID'], 'user_ID' => NULL));

			return $univ_updated;
		}
		elseif ($user_details['position'] == 'chair')
		{
			$department_details = $univ->get_department_details(NULL, $user_details['program_ID']);
			
			// User's program doesn't belong to any department
			// Thus, position can't be set to chair
			if (!$department_details)
			{
				$user_details['position'] = 'none';
				return FALSE;
			}
			elseif ($department_details['user_ID'] == $user_details['user_ID'])
				return TRUE;
			else
			{
				$user_updated = ($department_details['user_ID'] ? $this->user->update_details(array('user_ID' => $department_details['user_ID'], 'program_ID' => $user_details['program_ID'], 'position' => 'none')) : TRUE);
				$department_updated = $univ->update_department(array('department_ID' => $department_details['department_ID'], 'user_ID' => $user_details['user_ID']));
				return ($user_updated AND $department_updated);
			}
		}
 		elseif ($user_details['position'] == 'dean')
		{
			$college_details = $univ->get_college_details(NULL, $user_details['program_ID']);

			if ($college_details['user_ID'] == $user_details['user_ID'])
				return TRUE;
			else
			{
				$user_updated = ($college_details['user_ID'] ? $this->user->update_details(array('user_ID' => $college_details['user_ID'], 'program_ID' => $user_details['program_ID'], 'position' => 'none')) : TRUE);
				$college_updated = $univ->update_college(array('college_ID' => $college_details['college_ID'], 'user_ID' => $user_details['user_ID']));
				return ($user_updated AND $college_updated);
			}
		}
 	}

    /**
     * Save photo in local disk
     */
    private function save_image($image, $lastname)
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
            $filename = strtolower(Text::random('alnum', 20)).$lastname.'.jpg';
 
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
	
} // End User
