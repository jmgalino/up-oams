<?php
$session = Session::instance();

echo '<h1 class="text-center">Office Performance Commitment and Review (OPCR)</h1>';
echo '<br>';

echo '<p style="text-indent: 20px;">I, <span style="text-decoration: underline;">', $session->get('fullname'), '</span>',
	 ' of the <span style="text-decoration: underline;">', $session->get_once('department'), '</span>',
	' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
	'<span style="text-decoration: underline;">', date_format(date_create($session->get('opcr_details')['period_from']), 'F Y'), '</span> to ',
	'<span style="text-decoration: underline;">', date_format(date_create($session->get('opcr_details')['period_to']), 'F Y'), '</span>.</p>';
echo '<br>';

echo '<table width="200" align="right">
	<tbody>
		<tr><td class="text-center" style="border-bottom:1pt solid black">', $session->get('fullname'), '</td></tr>
		<tr><td class="text-center">','Unit Head, ', $session->get_once('title'), '</td></tr>
		<tr><td class="text-center">Date: ', date_format(date_create($session->get('opcr_details')['date_published']), 'F d, Y'), '</td></tr>
	</tbody>
</table><br>';
?>