<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Chair extends Controller_Faculty {

	/**
	 * View Department Users
	 */
	public function action_profiles()
	{
		$univ = new Model_Univ;
		$user = new Model_User;

		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$programIDs = $univ->get_department_programIDs($department_details['department_ID']);
		$users = $user->get_user_group($programIDs);
		$programs = $univ->get_programs();
		
		$this->view->content = View::factory('faculty/profile/faculty')
			->bind('group', $department_details['department'])
			->bind('users', $users)
			->bind('programs', $programs);
		$this->response->body($this->view->render());
	}

	/**
	 * View User Profile
	 */
	public function action_profile()
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		$user = new Model_User;

		$employee_code = $this->request->param('id');
		$user_details = $user->get_details(NULL, $employee_code);

		$education = $user->get_education($user_details['user_ID'], NULL);
		$accom_reports = $accom->get_faculty_accom($user_details['user_ID'], NULL, NULL, TRUE);
		$program_details = $univ->get_program_details($user_details['program_ID']);
		$user_details['program_short'] = $program_details['program_short'];
		$fullname = $user_details['last_name'].', '.$user_details['first_name'].' '.$user_details['middle_name'][0].'.';
		$url = URL::site('faculty/dept/profiles');

		$reports = array();
		$accom_IDs = array();
		if ($accom_reports)
		{
			foreach ($accom_reports as $report)
			{
				if (in_array($report['status'], array('Approved', 'Pending', 'Saved')))
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
		
		$this->view->content = View::factory('faculty/profile/profile')
			->bind('url', $url)
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
			->bind('accom_oth', $oth);
		$this->response->body($this->view->render());
	}

} // End Chair
