<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Office Performance Commitment and Review</li>
</ol>

<h3>
	My OPCR Forms
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_opcr">New Form</button>
</h3>
<br>

<?php if ($publish): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		OPCR was successfully published.
	</p>
</div>
<?php elseif ($submit): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		OPCR was successfully submitted.
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		OPCR was successfully deleted.
	</p>
</div>
<?php endif; ?>

<?php
// Init Modal
echo View::factory('faculty/opcr/form/initialize')
	->bind('opcr_forms', $opcr_forms);
?>

<?php if ($opcr_forms): ?>
<!-- Table -->
<table class="table table-hover" id="opcr_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Date Posted</td>
			<th>Date Submitted</td>
			<th>Status</th>
			<th>Comment</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($opcr_forms as $opcr)
	{
		$period_from = DateTime::createFromFormat('Y-m-d', $opcr['period_from']);
		$period_to = DateTime::createFromFormat('Y-m-d', $opcr['period_to']);
		$period = $period_from->format('F Y').' - '.$period_to->format('F Y');

		echo '<tr>';
		echo '<td>', $period, '</a></td>';

		echo ($opcr['date_posted']
			? '<td>'.date_format(date_create($opcr['date_posted']), 'F d, Y').'</td>'
			: '<td>Not posted</td>');

		echo ($opcr['date_submitted']
			? '<td>'.date_format(date_create($opcr['date_submitted']), 'F d, Y').'</td>'
			: '<td>Not submitted</td>');

		echo '<td>', $opcr['status'], '</td>';
		echo '<td>', $opcr['comment'], '</td>';
		echo '<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">';

		if ($opcr['document'])
		{
				echo '<li>
						<a href='.URL::site('faculty/opcr/preview/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-file"></span> Preview PDF</a>
					</li>
					<li>
						<a href='.URL::base().'application/'.$opcr['document'].' download=', $period, '>
						<span class="glyphicon glyphicon-download"></span> Download Form</a>
					</li>';
		}
		else
		{
				echo '<li>
						<a href='.URL::site('faculty/opcr/download/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-download"></span> Download Form</a>
					</li>';
		}

		if (($opcr['status'] == 'Draft') OR ($opcr['status'] == 'Published') OR ($opcr['status'] == 'Rejected'))
		{
			echo 	'<li>
						<a href='.URL::site('faculty/opcr/update/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-pencil"></span> Edit Report</a>
					</li>
					<li>
						<a onclick="return confirm(\'Are you sure you want to delete this report?\');" href='.URL::site('faculty/opcr/delete/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-trash"></span> Delete Report</a>
					</li>';
		}

		echo '	</ul>
			</td>
			</tr>';
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>