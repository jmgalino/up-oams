<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">CUMA Forms - College</li>
</ol>

<h3>
	<div class="row">
		<div class="col-md-9">CUMA Forms <small><?php echo $group; ?></small></div>

		<?php if (TRUE == FALSE)://($cuma_forms): ?>
		<div class="col-md-3">
			<button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_consolidate" id="consolidate-form">Consolidate Forms</button>
		</div>
		<?php endif; ?>

	</div>
</h3>
<br>

<?php
// Consolidate Form
echo View::factory('faculty/cuma/form/consolidate')
	->bind('consolidate_url', $consolidate_url);
?>

<?php if ($cuma_forms): ?>
<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

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
