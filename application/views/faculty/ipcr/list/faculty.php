<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Individual Performance Commitment and Review</li>
</ol>

<h3>
	My IPCR Forms
	<button type="button"
	<?php echo ($opcr_forms
		? 'class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_ipcr"'
		: 'class="btn btn-default pull-right disabled button-tip" data-toggle="tooltip" data-placement="bottom" title="No OPCR available"');
	?>>New Form</button>
</h3>
<br>

<?php if ($submit): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		IPCR was successfully <?php echo (($session->get('identifier') == 'faculty') ? 'submitted' : 'saved'); ?>.
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		IPCR was successfully deleted.
	</p>
</div>
<?php elseif ($error): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

<?php
// Init Modal
echo View::factory('faculty/ipcr/form/modals/initialize')
	->bind('opcr_forms', $opcr_forms);
?>

<?php if ($ipcr_forms): ?>
<!-- Table -->
<table class="table table-hover" id="ipcr_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Date Submitted</td>
			<th>Status</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($ipcr_forms as $ipcr)
	{
		foreach ($opcr_forms as $opcr)
		{
			if ($ipcr['opcr_ID'] == $opcr['opcr_ID'])
			{
				$period_from = DateTime::createFromFormat('Y-m-d', $opcr['period_from']);
				$period_to = DateTime::createFromFormat('Y-m-d', $opcr['period_to']);
				$period = $period_from->format('F Y').' - '.$period_to->format('F Y');

				echo '<tr>';
				echo '<td>', $period, '</a></td>';

				echo ($ipcr['date_submitted']
					? '<td>'.date_format(date_create($ipcr['date_submitted']), 'F d, Y').'</td>'
					: '<td>Not submitted</td>');

				echo '<td>', $ipcr['status'], '</td>';
				echo '<td>', $ipcr['remarks'], '</td>';
				echo '<td class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
						<ul class="dropdown-menu">';

				if ($ipcr['document'])
				{
						echo '<li>
								<a href='.URL::site('faculty/ipcr/preview/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-file"></span> Preview PDF</a>
							</li>
							<li>
								<a href='.URL::base().'application/'.$ipcr['document'].' download=', $period, '>
								<span class="glyphicon glyphicon-download"></span> Download Form</a>
							</li>';
				}
				else
				{
						echo '<li>
								<a href='.URL::site('faculty/ipcr/download/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-download"></span> Download PDF</a>
							</li>';
				}

				if (($ipcr['status'] == 'Draft') OR ($ipcr['status'] == 'Saved') OR ($ipcr['status'] == 'Rejected'))
				{
					echo 	'<li>
								<a href='.URL::site('faculty/ipcr/update/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-pencil"></span> Edit Form</a>
							</li>
							<li>
								<a id="deleteForm" href='.URL::site('faculty/ipcr/delete/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-trash"></span> Delete Form</a>
							</li>';
				}

				elseif ($ipcr['status'] == 'Approved')
				{
					echo 	'<li>
								<a href='.URL::site('faculty/ipcr/rate/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-star"></span> Rate Outputs</a>
							</li>';
				}

				echo '	</ul>
					</td>
					</tr>';
			}
		}
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>