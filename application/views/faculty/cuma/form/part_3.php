<?php
$univ = new Model_Univ;
$session = Session::instance();

$department_details = $univ->get_department_details(NULL, $session->get('program_ID'));
$department_programs = $univ->get_department_programIDs($department_details['department_ID']);
$programs = $univ->get_programs();

$program_IDs = array();
foreach ($department_programs as $program) {
	$program_IDs[] = $program['program_ID'];
}
?>

Table 1.2
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th rowspan="3">Academic Program</th>
			<th colspan="4">Average Age of Faculty Complement</th>
			<th colspan="4">Research Activities</th>
		</tr>
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Senior<br>(Associate &<br>Full Professors)</th>
			<th rowspan="2">No.</th>
			<th rowspan="2">Junior<br>(Instructor &<br>Assistant<br>Professors)</th>
			<th colspan="2">Researches in the past 3 years</th>
			<th colspan="2">Publications</th>
		</tr>
		<tr>
			<th>No.</th>
			<th>Nature</th>
			<th>No.</th>
			<th>ISI/<br>Peer-reviewed</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($programs as $program)
	{
		if (in_array($program['program_ID'], $program_IDs))
		{
			echo '<tr>
				<td>', $program['program_short'], '</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>';
		}
	}
	?>
	</tbody>
</table>