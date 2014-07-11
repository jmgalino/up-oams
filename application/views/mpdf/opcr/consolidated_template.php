<?php
$opcr_ID = $this->opcr->get_opcrID();
$opcr = $this->opcr->get_details($opcr_ID);

$department = $this->site->session->get('department');
$college = $this->site->session->get('college');
$pfrom = DateTime::createFromFormat('Y-m-d', $opcr[0]->period_from);
$pto = DateTime::createFromFormat('Y-m-d', $opcr[0]->period_to);

echo '<h4 class="text-center">Office Performance Commitment and Review (OPCR)</h4>';
echo '<br>';
echo '<p>I, <span style="text-decoration: underline;">', $this->site->session->get('fullname'), '</span>',
	 ' of the <span style="text-decoration: underline;">', $department->department, '</span>',
	' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
	'<span style="text-decoration: underline;">', $pfrom->format('F Y'), '</span> to ',
	'<span style="text-decoration: underline;">', $pto->format('F Y'), '</span>.</p>';

echo '<table width="200" align="right">
	<tbody>
		<tr><td class="text-center" style="border-bottom:1pt solid black">', $this->site->session->get('fullname'), '</td></tr>
		<tr><td class="text-center">';

	if ($this->site->session->get('identifier') == 'faculty')
		echo 'Faculty, ', $department->short;
	elseif ($this->site->session->get('identifier') == 'dept_chair')
		echo 'Unit Head, ', $department->short;
	else
		echo 'Unit Head, ', $college->short;

echo	'</td></tr>
		<tr><td class="text-center">Date: ', date('F d, Y'), '</td></tr>
	</tbody>
</table><br>';
?>