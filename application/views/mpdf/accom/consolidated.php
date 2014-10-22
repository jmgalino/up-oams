<?php
$array = array();
$session = Session::instance();
$session->set('attachment', 0);
$session->set('attachments', $array);

echo '<h1 class="text-center">Accomplishment Report</h1>';
echo '<h2 class="text-center">', $session->get('accom_period'), '</h2><br>';
echo '<h2>', $session->get('fullname'), '</h2>';
echo '<h3>', $session->get('rank'), '</h3>';
echo '<br>';

// if ($level == 'faculty')
// 	echo '<h5>', $this->site->session->get('rank'), '</h5>';
// elseif ($level == 'department')
// 	echo '<h5> Unit Head, ', $department[0]->short, '</h5>';
// echo '<br>';

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