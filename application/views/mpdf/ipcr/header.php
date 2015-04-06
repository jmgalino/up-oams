<?php
echo '<h1 class="text-center">INDIVIDUAL PERFORMANCE COMMITMENT REPORT (IPCR)</h1>';
echo '<br>';

echo '<p style="text-indent: 20px;">I, <span style="text-decoration: underline;">', $fullname, '</span>',
	 ' of the <span style="text-decoration: underline;">', $department, '</span>',
	' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
	'<span style="text-decoration: underline;">', date('F Y', strtotime($opcr_details['period_from'])), '</span> to ',
	'<span style="text-decoration: underline;">', date('F Y', strtotime($opcr_details['period_to'])), '</span>.</p>';
echo '<br>';

echo '<table width="200" align="right">
	<tbody>
		<tr><td class="text-center" style="border-bottom:1px solid #000;">', $fullname, '</td></tr>
		<tr><td class="text-center">', $title, '</td></tr>
		<tr><td class="text-center">Date: ', date('F d, Y', strtotime($opcr_details['date_published'])), '</td></tr>
	</tbody>
</table><br>';
?>