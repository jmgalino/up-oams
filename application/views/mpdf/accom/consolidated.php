<?php
$level = $this->site->session->get('level');
$period = $this->site->session->get('period');
$program_ID = $this->site->session->get('program_ID');
$department = $this->univ->get_department($program_ID);

echo '<h2 class="text-center">Accomplishment Report</h2>';
echo '<h4 class="text-center">', $period['smy']->format('F Y'), ' - ', $period['emy']->format('F Y'), '</h4>';
echo '<br>';
echo '<h3>', $this->site->session->get('fullname'), '</h3>';

if ($level == 'faculty')
	echo '<h5>', $this->site->session->get('rank'), '</h5>';
elseif ($level == 'department')
	echo '<h5> Unit Head, ', $department[0]->short, '</h5>';
echo '<br>';

echo View::factory('mpdf/ar/fragments/publication');
echo View::factory('mpdf/ar/fragments/award');
echo View::factory('mpdf/ar/fragments/research');
echo View::factory('mpdf/ar/fragments/paper');
echo View::factory('mpdf/ar/fragments/creative');
echo View::factory('mpdf/ar/fragments/participation');
echo View::factory('mpdf/ar/fragments/material');
echo View::factory('mpdf/ar/fragments/other');

echo '<br><br><br>
<table width="200" align="right">
	<tbody>
		<tr><td class="text-center" style="border-bottom:1pt solid black"></td></tr>
		<tr><td class="text-center">', $this->site->session->get('fullname'), '</td></tr>
	</tbody>
</table><br>';
?>