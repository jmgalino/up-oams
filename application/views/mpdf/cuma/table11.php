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
		if (in_array($program['program_ID'], $program_IDs))
		{
			$program['accreditation'] = ($program['accreditation'] ? $program['accreditation'] : 'None');

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
