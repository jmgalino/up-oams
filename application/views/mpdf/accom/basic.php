<?php
$session = Session::instance();

echo '<h1 class="text-center">Accomplishment Report</h1>';
echo '<h2 class="text-center">', date_format(date_create($accom_details['yearmonth']), 'F Y'), '</h2><br>';
echo '<h2>', $session->get('fullname'), '</h2>';
echo '<h3>', $session->get('rank'), '</h3>';
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
?>