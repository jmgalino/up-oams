<?php
/**
 * Return names
 */
function reuser($user_IDs, $users)
{
	$name = '';

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

	return $name;
}

/**
 * Change and improve date format
 */
function redate($start, $end)
{
	$date = '';

	$stime = strtotime($start);
	$sdate = date('d', $stime);
	$smonth = date('F', $stime);
	$syear = date('Y', $stime);

	$etime = strtotime($end);
	$edate = date('d', $etime);
	$emonth = date('F', $etime);
	$eyear = date('Y', $etime);

	if (($smonth == $emonth) AND ($syear == $eyear))
	{
		if ($sdate == $edate)
		{
			$date = date('F d, Y', strtotime($start));
		}
		else
		{
			$date = $smonth.' '.$sdate.'-'.$edate.', '.$syear;
		}
	}
	else
		$date = date('F d, Y', strtotime($start)).' - '.date('F d, Y', strtotime($end));

	return $date;
}

$array = array();
$session = Session::instance();
$session->set('attachment', 0);
$session->set('attachments', $array);

echo '<h1 class="text-center">Accomplishment Report</h1>';
echo '<h2 class="text-center">', $session->get('accom_period'), '</h2><br>';
echo '<h2>', $session->get('fullname'), '</h2>';

if ($session->get('accom_type') == 'faculty')
	echo '<h3>', $session->get('rank'), '</h3>';
else
	echo '<h3> Unit Head, ', $session->get_once('unit'), '</h3>';
echo '<br>';

echo View::factory('mpdf/accom/fragments/publication')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/award')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/research')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/paper')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/creative')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/participation')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/material')->bind('session', $session);
echo View::factory('mpdf/accom/fragments/other')->bind('session', $session);

echo '<br><br><br>
<table width="200" align="right">
	<tbody>
		<tr><td class="text-center" style="border-bottom:1pt solid black"></td></tr>
		<tr><td class="text-center">', $session->get('fullname'), '</td></tr>
	</tbody>
</table>';

$attachment = $session->get_once('attachment');
if ($attachment)
{
	echo '<pagebreak />';

	$attachments = $session->get_once('attachments');

	echo '<h2>Attachments</h2><br>';

	for ($i = 1; $i <= $attachment; $i++)
	{
		echo '<p><a name="attachment_'.$i.'">[', $i, ']<a/> ',
			'<img src="'.URL::base().'files/upload_attachments/'.$attachments[$i].'" max-height="750" max-width="500" style="vertical-align: text-top;"></p>';
	}
}
?>