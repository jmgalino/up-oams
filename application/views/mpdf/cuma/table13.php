Table 1.3
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
					<th rowspan="2">Name of Faculty<br>', $period, '</th>
					<th colspan="4">Educational Qualifications</th>
					<th rowspan="2">Average<br>SET<br>Scores</th>
					<th colspan="3">Publications</th>
				</tr>
				<tr>
					<th>Highest<br>Degree</th>
					<th>Date<br>Obtained</th>
					<th>Where<br>Obtained</th>
					<th>Training/<br>Continuing<br>Education</th>
					<th>No. of ISI<br>publications</th>
					<th>No. of<br>refereed<br>publications</th>
					<th>No. of<br>popular<br>publications</th>
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