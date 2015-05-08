<?php
$univ = new Model_Univ;
$session = Session::instance();

$department_details = $univ->get_department_details(NULL, $session->get('program_ID'));
$department_programs = $univ->get_department_programIDs($department_details['department_ID']);
$programs = $univ->get_programs();

$department_programIDs = array();
foreach ($department_programs as $program) {
	$department_programIDs[] = $program['program_ID'];
}
?>

<p><strong>QUANTITATIVE</strong></p>
<p><strong>1. Quality of programs</strong></p>

Table 1.1
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th>Academic Programs</th>
			<th>Type</th>
			<th>Vision</th>
			<th>Goals</th>
			<th>Describe Accreditation<br> process it underwent<br>(if applicable)</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($programs as $program)
	{
		if (in_array($program['program_ID'], $department_programIDs))
		{
			$program['accreditation'] = ($program['accreditation'] ? $program['accreditation'] : '-');

			echo '<tr>
				<td>', $program['program_short'], '</td>
				<td>', $program['type'], '</td>
				<td>', $program['vision'], '</td>
				<td>', $program['goals'], '</td>
				<td>', $program['accreditation'], '</td>
			</tr>';
		}
	}
	?>
	</tbody>
</table>
