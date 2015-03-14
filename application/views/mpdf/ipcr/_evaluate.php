<?php
$ipcr_ID = $this->ipcr->get_ipcrID();
$ipcr = $this->ipcr->get_details($ipcr_ID);
$user = $this->user->get_details($ipcr[0]->user_ID);
$dept = $this->univ->get_department($user[0]->program_ID);
$college = $this->univ->get_college($user[0]->program_ID);
$name = $user[0]->first_name.' '.$user[0]->middle_name.'. '.$user[0]->last_name;
$opcr_ID = $ipcr[0]->opcr_ID;
$opcr = $this->opcr->get_details($opcr_ID);
$pfrom = DateTime::createFromFormat('Y-m-d', $opcr[0]->period_from);
$pto = DateTime::createFromFormat('Y-m-d', $opcr[0]->period_to);

echo '<h4 class="text-center">Individual Performance Commitment and Review (IPCR)</h4>';
echo '<br>';
echo '<p>I, <span style="text-decoration: underline;">', $name, '</span>',
	 ' of the <span style="text-decoration: underline;">', $dept[0]->department, '</span>',
	' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
	'<span style="text-decoration: underline;">', $pfrom->format('F Y'), '</span> to ',
	'<span style="text-decoration: underline;">', $pto->format('F Y'), '</span>.</p>';

echo '<table width="200" align="right">
	<tbody>
		<tr><td class="text-center" style="border-bottom:1pt solid black">', $name, '</td></tr>
		<tr><td class="text-center">';

	if ($user[0]->position == 'none')
		echo 'Faculty, ', $dept->short;
	elseif ($user[0]->position == 'chair')
		echo 'Unit Head, ', $dept->short;
	else
		echo $college[0]->short;

echo	'</td></tr>
		<tr><td class="text-center">Date: ', date('F d, Y'), '</td></tr>
	</tbody>
</table><br>';

echo View::factory('mpdf/ipcr/fragment')->render();
echo View::factory('mpdf/ipcr/legend')->render();
?>