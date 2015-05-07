<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Extras_Reconstructor extends Controller {

	/**
	 * Change and improve date format
	 */
	public function action_redate()
	{
		$date = '';

		$start = $this->request->post('start');
		$stime = strtotime($start);
		$sdate = date('d', $stime);
		$smonth = date('F', $stime);
		$syear = date('Y', $stime);

		$end = $this->request->post('end');
		$etime = strtotime($end);
		$edate = date('d', $etime);
		$emonth = date('F', $etime);
		$eyear = date('Y', $etime);

		$date = ($smonth == $emonth AND $syear == $eyear
			? $sdate == $edate
				? date('F d, Y', strtotime($start))
				: $smonth.' '.$sdate.'-'.$edate.', '.$syear
			: date('F d, Y', strtotime($start)).' - '.date('F d, Y', strtotime($end)));
		
		$this->response->body = $date;
	}

	/**
	 * Return names
	 */
	public function action_reuser()
	{
		$name = '';
		$user_IDs = $this->request->post('user_IDs');
		$users = $this->request->post('users');

		if (count($user_IDs) == 1)
		{
			foreach ($users as $user)
			{
				if ($user_IDs == $user['user_ID'])
				{
					$name = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'][0].'.';
					break;
				}
			}
		}
		else
		{
			$names = array();
			$names2 = array();
			foreach ($user_IDs as $user_ID)
			{
				if (is_numeric($user_ID))
				{
					foreach ($users as $user)
					{
						if ($user_ID == $user['user_ID'])
						{
							$names[] = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'][0].'.';
							break;
						}
					}
				}
				else
				{
					$names2[] = $user_ID; echo $user_ID, 'in';
				}
			}

			$count = count($names);
			for ($i = 0; $i < $count; $i++)
			{
				$name .= $names[$i];

				if (($count == 2) AND ($i == $count-2) AND (!$names2))
					$name .= ' and ';
				else if (($count > 2) AND ($i == $count-2) AND (!$names2))
					$name .= ', and ';
				else if ($i == $count-1)
					$name .= '';
				else
					$name .= ', ';
			}
			
			if ($names2)
			{
				$count2 = count($names2);
				for ($i = 0; $i < $count2; $i++)
				{
					$name .= $names2[$i];

					if (($count2 == 2) AND ($i == $count2-2))
						$name .= ' and ';
					else if (($count2 > 2) AND ($i == $count2-2))
						$name .= ', and ';
					else if ($i == $count2-1)
						$name .= '';
					else
						$name .= ', ';
				}
			}
		}

		$this->response->body = $name;
	}

} // End Reconstructor
