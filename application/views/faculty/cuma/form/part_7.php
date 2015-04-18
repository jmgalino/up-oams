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

echo '<p><strong>2. Relevance and flexibility of programs to respond to new developments</strong></p>';
echo 'Table 2.1';
?>

<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th rowspan="2">Academic Programs</th>
			<th rowspan="2">Date<br>Instituted</th>
			<th rowspan="2">Date last<br>reviewed</th>
			<th rowspan="2">No. of times<br>reviewed</th>
			<th colspan="3">% passing<br>(Licensure<br>exams,<br>if applicable)</th>
			<th rowspan="2">Describe revisions made and why</th>
		</tr>
		<tr>
			<th>Y1</th>
			<th>Y2</th>
			<th>Y3</th>
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
				<td>', date('F d, Y', strtotime($program['date_instituted'])), '</td>
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

Table 2.2
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th rowspan="2">Academic Programs</th>
			<th colspan="2">Graduates taking post<br>graduate courses</th>
			<th colspan="5">Employment opportunities<br>(No. of graduates)</th>
			<th rowspan="2">Describe institutions where<br>graduates are employed</th>
		</tr>
		<tr>
			<th>No. in<br>Phil. Univ.</th>
			<th>No. in<br>Foregin. Univ.</th>
			<th>Academe</th>
			<th>Industry</th>
			<th>Research<br>Institutions</th>
			<th>KPO</th>
			<th>Contact<br>Centers</th>
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
