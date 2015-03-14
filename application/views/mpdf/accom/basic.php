<?php
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
echo '<h2 class="text-center">', date('F Y', strtotime($accom_details['yearmonth'])), '</h2><br>';
echo '<br>';

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
	</tr>
	<tr><td height="50"></td></tr>
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
	</tr>
</table>';

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