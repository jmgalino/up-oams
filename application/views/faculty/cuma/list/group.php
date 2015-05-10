<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">CUMA Forms - College</li>
</ol>

<h3>
	CUMA Forms <small><?php echo $group; ?></small>
</h3>
<br>

<?php if ($cuma_forms): ?>
<!-- Table -->
<table class="table table-hover" id="cuma_group_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Department</th>
			<th>Period</th>
			<th>Date of Submission</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($cuma_forms as $cuma)
	{

		foreach ($users as $user)
		{
			foreach ($programs as $program)
			{
				if ($user['program_ID'] == $program['program_ID'])
				{
					$department = $program['department'];
					break;
				}
			}
		}

		$start = date('Y', strtotime($cuma['period_from']));
		$end = date('Y', strtotime($cuma['period_to']));

		echo
		'<tr>
			<td>', $department, '</td>
			<td>AY ', $start, ' - ', $end, '</td>
			<td>', date('F d, Y', strtotime($cuma['date_submitted'])), '</td>
			<td>', $cuma['status'], '</td>
			<td width="100">
				<a class="btn btn-default" href="', URL::site('faculty/coll/cuma/view/'.$cuma['cuma_ID']), '">
					View Form
				</a>
			</td>
		</tr>';
	}
	?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>
