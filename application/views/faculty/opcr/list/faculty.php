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

<?php if ($submit): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $submit; ?>
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert <?php echo (is_bool($delete) ? 'alert-success' : 'alert-danger' ); ?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo (is_bool($delete) ? 'OPCR was successfully deleted.' : $delete ); ?>
	</p>
</div>
<?php elseif ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

<?php
// Init Modal
echo View::factory('faculty/opcr/form/modals/initialize')
	->bind('opcr_forms', $opcr_forms);
?>

<?php if ($opcr_forms): ?>
<!-- Table -->
<table class="table table-hover" id="opcr_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Date Published</td>
			<th>Date Submitted</td>
			<th>Status</th>
			<th>Remarks</th>
			<th class="action">Action</th>
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

		echo ($opcr['date_published']
			? '<td>'.date_format(date_create($opcr['date_published']), 'F d, Y').'</td>'
			: '<td>Not published</td>');

		echo ($opcr['date_submitted']
			? '<td>'.date_format(date_create($opcr['date_submitted']), 'F d, Y').'</td>'
			: '<td>Not submitted</td>');

		echo '<td>', $opcr['status'], '</td>';
		echo '<td>', $opcr['remarks'], '</td>';
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
						<span class="glyphicon glyphicon-download"></span> Download PDF</a>
					</li>';
		}

		if ($opcr['status'] == 'Draft')
		{
			echo 	'<li>
						<a href='.URL::site('faculty/opcr/update/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-pencil"></span> Edit Form</a>
					</li>
					<li>
						<a id="deleteForm" href='.URL::site('faculty/opcr/delete/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-trash"></span> Delete Form</a>
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