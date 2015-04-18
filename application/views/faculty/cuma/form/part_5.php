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

Table 1.4
<?php
foreach ($programs as $program)
{
	if (in_array($program['program_ID'], $program_IDs))
	{
		echo '
		<table class="table table-bordered table-condensed cuma-table" width="100%">
			<thead>
				<tr>
					<th colspan="9" style="text-align:left">Academic Program: ', $program['program_short'], '</th>
				</tr>
				<tr>
					<th rowspan="2">Name of Faculty<br>', $session->get('period'), '</th>
					<th rowspan="2">No. of<br>researches</th>
					<th colspan="3">Funding source and amount</th>
					<th rowspan="2">No. of<br>students<br>mentored</th>
					<th colspan="3">No. of awards<br>received</th>
				</tr>
				<tr>
					<th>UP</th>
					<th>External<br>(Specify)</th>
					<th>Total</th>
					<th>Acad</th>
					<th>Natl</th>
					<th>Intl</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Faculty</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
	</table>';
	}
}
?>
