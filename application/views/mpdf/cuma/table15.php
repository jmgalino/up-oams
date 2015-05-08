<pagebreak>

Table 1.5
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th>Academic Programs</th>
			<th>No. of freshmen<br>students</th>
			<th>No. of graduates</th>
			<th>No. of graduates<br>with honors</th>
			<th>No. of graduates<br>on time</th>
			<th>Ave. GWA of<br>honor graduates</th>
			<th>% honor grads<br>(graduating class)</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($programs as $program)
	{
		if (in_array($program['program_ID'], $department_programIDs))
		{
			echo '<tr>
				<td class="first">', $program['program_short'], '</td>
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