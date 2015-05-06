<pagebreak />
Table 1.5
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th rowspan="2">Academic Programs</th>
			<th rowspan="2">No. of freshmen<br>students</th>
			<th rowspan="2">No. of graduates</th>
			<th rowspan="2">No. of graduates<br>with honors</th>
			<th rowspan="2">No. of graduates<br>on time</th>
			<th rowspan="2">Ave. GWA of<br>honor graduates</th>
			<th rowspan="2">% honor grads<br>(graduating class)</th>
		</tr>
		<tr>
			<th>ISI</th>
			<th>Refereed</th>
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
			</tr>';
		}
	}
	?>
	</tbody>
</table>