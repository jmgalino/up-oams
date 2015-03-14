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
$this->session->set('attachment', 0);
$this->session->set('attachments', $array);

echo '<h1 class="text-center">Accomplishment Report</h1>';
echo '<h2 class="text-center">', $period, '</h2><br>';
// echo '<h2>', $this->session->get('fullname'), '</h2>';

// if ($this->session->get('accom_type') == 'faculty')
// 	echo '<h3>', $this->session->get('rank'), '</h3>';
// else
// 	echo '<h3> Unit Head, ', $this->session->get_once('unit'), '</h3>';
// echo '<br>';

echo View::factory('mpdf/accom/fragments/publication')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/award')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/research')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/paper')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/creative')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/participation')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/material')->bind('session', $this->session);
echo View::factory('mpdf/accom/fragments/other')->bind('session', $this->session);

echo '<br><br><br>
<table>
	<tr>
		<td>
			<table width="200">
				<tbody>
					<tr><td>Prepared by:</td></tr>
					<tr><td height="50"></td></tr>
					<tr><td class="text-center" style="border-bottom:0.25px solid black;"></td></tr>
					<tr><td class="text-center">', $this->session->get('title'), ' ', $this->session->get('fullname'), $this->session->get('suffix'), '</td></tr>
					<tr><td class="text-center">', $this->session->get('rank'), '</td></tr>
				</tbody>
			</table>
		</td>
	</tr>';

	if ($this->session->get('identifier') == 'chair')
	{
		echo '<tr><td height="50"></td></tr>
			<tr>
				<table width="200">
						<tbody>
							<tr><td>Approved by:</td></tr>
							<tr><td height="50"></td></tr>
							<tr><td class="text-center" style="border-bottom:0.25px solid black"></td></tr>
							<tr><td class="text-center">', $this->session->get('college_details')['title'], ' ', $this->session->get('college_details')['first_name'], ' ', $this->session->get('college_details')['middle_name'][0], '. ', $this->session->get('college_details')['last_name'], $this->session->get('college_details')['suffix'], '</td></tr>
							<tr><td class="text-center">Dean, ', $this->session->get('college_details')['short'], '</td></tr>
						</tbody>
					</table>
				</td>
			</tr>';
	}

echo '</table>';

$attachment = $this->session->get_once('attachment');
if ($attachment)
{
	echo '<pagebreak />';

	$attachments = $this->session->get_once('attachments');

	echo '<h2>Attachments</h2><br>';

	for ($i = 1; $i <= $attachment; $i++)
	{
		echo '<p><a name="attachment_'.$i.'">[', $i, ']<a/> ',
			'<img src="'.URL::base().'files/upload_attachments/'.$attachments[$i].'" max-height="750" max-width="500" style="vertical-align: text-top;"></p>';
	}
}
?>