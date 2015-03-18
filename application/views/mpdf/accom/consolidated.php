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
$session->set('attachment', 0);
$session->set('attachments', $array);

echo '<h1 class="text-center">Accomplishment Report</h1>';
echo '<h2 class="text-center">', $period, '</h2>';
echo '<br>';

echo View::factory('mpdf/accom/fragments/publication')
	->bind('accom_pub', $pub)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/award')
	->bind('accom_awd', $awd)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/research')
	->bind('accom_rch', $rch)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/paper')
	->bind('accom_ppr', $ppr)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/creative')
	->bind('accom_ctv', $ctv)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/participation')
	->bind('accom_par', $par)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/material')
	->bind('accom_mat', $mat)
	->bind('session', $session);

echo View::factory('mpdf/accom/fragments/other')
	->bind('accom_oth', $oth)
	->bind('session', $session);

echo '<br><br><br>
<table class="signatures">
	<tr>
		<td>
			<table width="200">
				<tbody>
					<tr><td>Prepared by:</td></tr>
					<tr><td height="50"></td></tr>
					<tr><td class="text-center" style="border-bottom:0.25px solid black;"></td></tr>
					<tr><td class="text-center">', $session->get('title'), ' ', $session->get('fullname'), $session->get('suffix'), '</td></tr>
					<tr><td class="text-center">', $session->get('rank'), '</td></tr>
				</tbody>
			</table>
		</td>
	</tr>';

	if ($session->get('accom_type') == 'faculty')
	{
		echo '<tr><td height="50"></td></tr>
			<tr>
				<td>
					<table width="200">
						<tbody>
							<tr><td>Noted by:</td></tr>
							<tr><td height="50"></td></tr>
							<tr><td class="text-center" style="border-bottom:0.25px solid black"></td></tr>
							<tr><td class="text-center">', $department_details['title'], ' ', $department_details['first_name'], ' ', $department_details['middle_name'][0], '. ', $department_details['last_name'], ' ', $department_details['suffix'], '</td></tr>
							<tr><td class="text-center">Department Chair, ', $department_details['short'], '</td></tr>
						</tbody>
					</table>
				</td>
				<td width="200"></td>
				<td>
					<table width="200">
						<tbody>
							<tr><td>Approved by:</td></tr>
							<tr><td height="50"></td></tr>
							<tr><td class="text-center" style="border-bottom:0.25px solid black"></td></tr>
							<tr><td class="text-center">', $college_details['title'], ' ', $college_details['first_name'], ' ', $college_details['middle_name'][0], '. ', $college_details['last_name'], ' ', $college_details['suffix'], '</td></tr>
							<tr><td class="text-center">Dean, ', $college_details['short'], '</td></tr>
						</tbody>
					</table>
				</td>
			</tr>';
	}

	elseif ($session->get('identifier') == 'chair')
	{
		echo '<tr><td height="50"></td></tr>
			<tr>
				<td>
					<table width="200">
						<tbody>
							<tr><td>Approved by:</td></tr>
							<tr><td height="50"></td></tr>
							<tr><td class="text-center" style="border-bottom:0.25px solid black"></td></tr>
							<tr><td class="text-center">', $college_details['title'], ' ', $college_details['first_name'], ' ', $college_details['middle_name'][0], '. ', $college_details['last_name'], ' ', $college_details['suffix'], '</td></tr>
							<tr><td class="text-center">Dean, ', $college_details['short'], '</td></tr>
						</tbody>
					</table>
				</td>
			</tr>';
	}

echo '</table>';

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