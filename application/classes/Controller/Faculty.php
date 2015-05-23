<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty extends Controller_User {

	/**
	 * Check authorization
	 */
	public function before()
	{
		parent::before();

		if (!in_array($this->session->get('identifier'), array('faculty', 'chair', 'dean')))
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect('admin/error');
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
		$announcements = $this->oams->get_announcements(NULL, NULL, FALSE);
		
		$general = 'faculty';

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

		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$announcements = $this->oams->get_announcements(NULL, NULL, FALSE);

		$this->view->content = View::factory('profile/announcements')
			->bind('announcements', $announcements)
			->bind('identifier', $identifier)
			->bind('college_details', $college_details)
			->bind('department_details', $department_details);
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

		$reset = $this->session->get_once('reset');
		$update = $this->session->get_once('update');
		$fullname = $this->session->get('fullname2');

		$user_details = $user->get_details($this->session->get('user_ID'), NULL);		
		$accom_reports = $accom->get_faculty_accom($this->session->get('user_ID'), NULL, NULL, TRUE);
		
		$education = $user->get_education($user_details['user_ID'], NULL);
		$program_details = $univ->get_program_details($user_details['program_ID']);
		$user_details['program_short'] = $program_details['program_short'];

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
		
		$this->view->content = View::factory('profile/myprofile/faculty')
			->bind('user', $user_details)
			->bind('education', $education)
			->bind('accom_reports', $reports)
			->bind('fullname', $fullname)
			->bind('accom_pub', $pub)
			->bind('accom_awd', $awd)
			->bind('accom_rch', $rch)
			->bind('accom_ppr', $ppr)
			->bind('accom_ctv', $ctv)
			->bind('accom_par', $par)
			->bind('accom_mat', $mat)
			->bind('accom_oth', $oth)
			->bind('reset', $reset)
			->bind('update', $update);
		$this->response->body($this->view->render());
	}

	/**
	 * Update SATE scores or no. of students mentored
	 */
	public function action_update_myprofile()
	{
		$user = new Model_User;

		$key = $this->request->param('id');
		$value = $this->request->post($key);

		$user->update_details(array(
			'user_ID' => $this->session->get('user_ID'),
			 $key => $value));

		echo $value;
	}

	/**
	 * Show contact admin form
	 */
	public function action_contact()
	{
		if ($this->request->post())
		{
			$details = $this->request->post();

			if ($details['subject'] AND $details['message'])
				$this->send_message($details);
			else
			{
				$error = ($details['subject'] ? 'Please enter a message' : 'Please enter a subject');
				$this->session->set('error', $error);
				$this->session->set('details', $details);
				$this->redirect('faculty/contact', 303);
			}
		}
		else
		{
			$success = $this->session->get_once('success');
			$error = $this->session->get_once('error');
			$details = $this->session->get_once('details');
			$fullname = $this->session->get('fullname');

			$this->view->content = View::factory('profile/form/contact')
				->bind('error', $error)
				->bind('success', $success)
				->bind('fullname', $fullname)
				->bind('details', $details);
			$this->response->body($this->view->render());
		}
	}

	/**
	 * Show latest published OPCR
	 */
	public function action_opcr()
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$opcr_details = $opcr->get_department_opcr($this->session->get('program_ID'), 1);
		$ipcr_details = $ipcr->get_faculty_ipcr($this->session->get('user_ID'), $opcr_details['opcr_ID']);

		$period_from = date('F Y', strtotime($opcr_details['period_from']));
		$period_to = date('F Y', strtotime($opcr_details['period_to']));
		$period = $period_from.' - '.$period_to;
	
		$this->view->content = View::factory('faculty/opcr/view/latest')
			->bind('opcr_details', $opcr_details)
			->bind('ipcr_details', $ipcr_details)
			->bind('period', $period);

		$this->response->body($this->view->render());
	}

	/**
	 * Check ownership
	 */
	protected function action_check($user_ID)
	{
		if ($this->session->get('user_ID') !== $user_ID)
		{
			$this->session->set('error', 'Unauthorized access.');
			$this->redirect('faculty/error');
		}
	}

	/**
	 * Get department/college accomplishments
	 */
	protected function get_group_accom($users, $start, $end)
	{
		$accom = new Model_Accom;
		$accom_reports = $accom->get_group_accom($users, $start, $end, TRUE);

		if ($accom_reports)
		{
			if ($start AND $end)
				$accom_IDs = $accom_reports;
			else
			{
				if ($accom_reports)
				{
					$accom_IDs = array();
					foreach ($accom_reports as $report)
					{
						$accom_IDs[] = $report['accom_ID'];
					}
				}
			}

			if ($accom_IDs)
			{
				$pub = $accom->get_accoms($accom_IDs, 'pub'); $accom_pub = $this->rearray_accoms($pub, 'publication_ID');
				$awd = $accom->get_accoms($accom_IDs, 'awd'); $accom_awd = $this->rearray_accoms($awd, 'award_ID');
				$rch = $accom->get_accoms($accom_IDs, 'rch'); $accom_rch = $this->rearray_accoms($rch, 'research_ID');
				$ppr = $accom->get_accoms($accom_IDs, 'ppr'); $accom_ppr = $this->rearray_accoms($ppr, 'paper_ID');
				$ctv = $accom->get_accoms($accom_IDs, 'ctv'); $accom_ctv = $this->rearray_accoms($ctv, 'creative_ID');
				$par = $accom->get_accoms($accom_IDs, 'par'); $accom_par = $this->rearray_accoms($par, 'participation_ID');
				$mat = $accom->get_accoms($accom_IDs, 'mat'); $accom_mat = $this->rearray_accoms($mat, 'material_ID'); 
				$oth = $accom->get_accoms($accom_IDs, 'oth'); $accom_oth = $this->rearray_accoms($oth, 'other_ID');
			}

			$accoms['accom_reports'] = $accom_reports;
			$accoms['pub'] = $accom_pub;
			$accoms['awd'] = $accom_awd;
			$accoms['rch'] = $accom_rch;
			$accoms['ppr'] = $accom_ppr;
			$accoms['ctv'] = $accom_ctv;
			$accoms['par'] = $accom_par;
			$accoms['mat'] = $accom_mat;
			$accoms['oth'] = $accom_oth;

			return $accoms;
		}

		return FALSE;
	}

	/**
	 * Merge duplicates
	 */
	protected function rearray_accoms($accoms, $name_ID)
	{
		$rearray_accoms = array();

		foreach ($accoms as $accom)
		{			
			$flag=0;
			// if new array contains at least one accom, check for duplicate
			if ($rearray_accoms)
			{
				foreach ($rearray_accoms as &$new_accom)
				{
					// duplicate
					if ($accom[$name_ID] == $new_accom[$name_ID])
					{
						$flag = 1;

						$user_IDs = $new_accom['user_ID'];	// get current users

						if (is_array($user_IDs))
						{
							array_push($user_IDs, $accom['user_ID']);	// add new user to array
							$new_accom['user_ID'] = $user_IDs;			// update user_ID
						}
						else
						{
							$users = array();						// init array
							array_push($users, $user_IDs);			// add current to array
							array_push($users, $accom['user_ID']);	// add new user to array
							$new_accom['user_ID'] = $users;			// update user_ID
						}

						break;
					}
				}

				if (!$flag)
					$rearray_accoms[] = $accom;
			}

			// new array is empty
			else
			{
				$rearray_accoms[] = $accom;
			}
		}
		
		return $rearray_accoms;
	}

	/**
	 * Send message
	 */
	private function send_message($details)
	{
		$message_details['name'] = $this->session->get('fullname');
	    $message_details['contact'] = $this->session->get('employee_code');
		$message_details['subject'] = $details['subject'];
		$message_details['message'] = $details['message'];
		$message_details['date'] = date('Y-m-d', strtotime("now"));

		$insert_success = $this->oams->new_message($message_details);
		$this->session->set('success', $insert_success);
			
		$this->redirect('faculty/contact', 303);
	}

} // End Faculty
