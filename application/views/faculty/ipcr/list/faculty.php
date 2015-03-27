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
		IPCR was successfully <?php echo ($identifier == 'faculty' ? 'submitted' : 'saved'); ?>.
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
<div class="alert alert-danger alert-dismissable">
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
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($ipcr_forms as $ipcr)
	{
		foreach ($opcr_forms as $opcr)
		{
			if ($ipcr['opcr_ID'] == $opcr['opcr_ID'])
			{
				$period_from = date('F Y', strtotime($opcr['period_from']));
				$period_to = date('F Y', strtotime($opcr['period_to']));
				$period = $period_from.' - '.$period_to;

				echo '<tr>
					<td>', $period, '</a></td>';

				echo ($ipcr['date_submitted']
					? '<td>'.date('F d, Y', strtotime($ipcr['date_submitted'])).'</td>'
					: '<td>Not submitted</td>');

				echo '<td>', $ipcr['status'], '</td>
					<td>', $ipcr['remarks'], '</td>
					<td class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href='.URL::site('faculty/ipcr/preview/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-file"></span> Preview Form</a>
							</li>';

				if ($ipcr['status'] == 'Rejected')
				{
					// Download PDF
					echo '<li>
							<a href='.URL::base().'files/document_ipcr/'.$ipcr['document'].' download="', $period, '">
							<span class="glyphicon glyphicon-download"></span> Download Form (Rejected)</a>
						</li>';
					// Download draft
					echo '<li>
							<a href='.URL::site('faculty/mpdf/download/ipcr/'.$ipcr['ipcr_ID']).'>
							<span class="glyphicon glyphicon-download"></span> Download Form (Current)</a>
						</li>';
				}
				else
				{
					if ($ipcr['document'])
					{
						// Download PDF
						echo '<li>
								<a href='.URL::base().'files/document_ipcr/'.$ipcr['document'].' download="', $period, '">
								<span class="glyphicon glyphicon-download"></span> Download Form</a>
							</li>';
					}
					else
					{
						// Download draft
						echo '<li>
								<a href='.URL::site('faculty/mpdf/download/ipcr/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-download"></span> Download Form</a>
							</li>';
					}
				}

				if (($ipcr['status'] == 'Draft') OR ($ipcr['status'] == 'Saved') OR ($ipcr['status'] == 'Rejected'))
				{
					echo	'<li>
								<a href='.URL::site('faculty/ipcr/update/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-pencil"></span> Edit Form</a>
							</li>
							<li>
								<a id="deleteForm" href='.URL::site('faculty/ipcr/delete/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-trash"></span> Delete Form</a>
							</li>';
				}

				if (($ipcr['status'] == 'Checked') OR (($ipcr['status'] == 'Saved') AND $identifier != 'faculty'))
				{
					echo 	'<li>
								<a href='.URL::site('faculty/ipcr/rate/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-star"></span> Rate Targets</a>
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