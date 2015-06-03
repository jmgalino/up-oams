<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">OPCR Forms - College</li>
</ol>

<h3>
	OPCR Forms <small><?php echo $group; ?></small>
	<?php if ($opcr_forms): ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_consolidate">Consolidate Forms</button>
	<?php else: ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="bottom" title="No OPCR Form available">Consolidate Forms</button>
	<?php endif; ?>
</h3>
<br>

<?php
// Consolidate Form
echo View::factory('faculty/opcr/form/modals/consolidate');
?>

<?php if ($opcr_forms): ?>
<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

<!-- Table -->
<table class="table table-hover" id="opcr_group_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th></th>
			<th>Period</th>
			<th>Unit Head</th>
			<th>Department</th>
			<th>Date Submitted</td>
			<th>Status</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($opcr_forms as $opcr)
	{
		foreach ($users as $user)
		{
			if ($opcr['user_ID'] == $user['user_ID'])
			{
				$period_from = date('F Y', strtotime($opcr['period_from']));
				$period_to = date('F Y', strtotime($opcr['period_to']));
				$period = $period_from.' - '.$period_to;

				foreach ($departments as $department)
				{
					if($user['user_ID'] == $department['user_ID'])
					{
						$unit = $department['short'];
						break;
					}
				}

				echo '<tr>
					<td>', $opcr['period_from'], '</td>
					<td>', $period, '</td>
					<td>', $user['last_name'], ', ', $user['first_name'], ' ', $user['middle_name'][0], '.</td>
					<td>', $unit, '</td>
					<td>', date('F d, Y', strtotime($opcr['date_submitted'])), '</td>
					<td>', $opcr['status'], '</td>
					<td>', $opcr['remarks'], '</td>

					<td class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="', URL::base(), 'files/document_opcr/'.$opcr['document'], '" download="', $unit,' [' , $period, ']">
								<span class="glyphicon glyphicon-download"></span> Download Form</a>
							</li>
							<li>
				 				<a href="', URL::site('faculty/coll/opcr/view/'.$opcr['opcr_ID']), '">
								<span class="glyphicon glyphicon-file"></span> View Form</a>
							</li>
						</ul>
					</td>
				</tr>';
			}
		}
	}
	?>
	</tbody>
</table></div>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>
