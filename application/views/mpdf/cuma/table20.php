<pagebreak>
	
<p><strong>2. Relevance and flexibility of programs to respond to new developments</strong></p>

Table 2.1
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th rowspan="2">Academic Programs</th>
			<th rowspan="2">Date Instituted</th>
			<th rowspan="2">Date last reviewed</th>
			<th rowspan="2" min-width="50">No. of times<br>reviewed</th>
			<th colspan="3">% passing<br>(Licensure exams,<br>if applicable)</th>
			<th rowspan="2">Describe revisions made and why</th>
		</tr>
		<tr>
			<th width="50">Y1</th>
			<th width="50">Y2</th>
			<th width="50">Y3</th>
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
			<th min-width="50">No. in<br>Philippine Univ.</th>
			<th min-width="50">No. in<br>Foreign Univ.</th>
			<th width="50">Academe</th>
			<th width="50">Industry</th>
			<th width="50">Research<br>Institutions</th>
			<th width="50">KPO</th>
			<th width="50">Contact<br>Centers</th>
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
				<td></td>
				<td></td>
			</tr>';
		}
	}
	?>
	</tbody>
</table>
