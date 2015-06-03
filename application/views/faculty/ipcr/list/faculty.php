<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Individual Performance Commitment and Review</li>
</ol>

<h3>
	My IPCR Forms
	<?php if ($opcr_forms): ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_ipcr">New Form</button>
	<?php else: ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="bottom" title="No OPCR Form available">New Form</button>
	<?php endif; ?>
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
			<th></th>
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
					<td>', $opcr['period_from'], '</td>
					<td>', $period, '</td>';

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

				if ($ipcr['status'] == 'Returned')
				{
					// Download PDF
					echo '<li>
							<a href='.URL::base().'files/document_ipcr/'.$ipcr['document'].' download="', $period, '">
							<span class="glyphicon glyphicon-download"></span> Download Form (Returned)</a>
						</li>';
					// Download draft
					echo '<li>
							<a href='.URL::site('extras/mpdf/download/ipcr/'.$ipcr['ipcr_ID']).'>
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
								<a href='.URL::site('extras/mpdf/download/ipcr/'.$ipcr['ipcr_ID']).'>
								<span class="glyphicon glyphicon-download"></span> Download Form</a>
							</li>';
					}
				}

				if (($ipcr['status'] == 'Draft') OR ($ipcr['status'] == 'Saved') OR ($ipcr['status'] == 'Returned'))
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

				if (($ipcr['status'] == 'Accepted') OR (($ipcr['status'] == 'Saved') AND $identifier != 'faculty'))
				{
					if ($ipcr['version'] == 1) // First accept - targets only
						echo '<li>
								<a href="'.URL::site('faculty/ipcr/rate/'.$ipcr['ipcr_ID']).'">
								<span class="glyphicon glyphicon-star"></span> Rate Targets</a>
							</li>';
					else // Final accept - with rating
						echo '<li class="disabled">
								<a href="">
								<span class="glyphicon glyphicon-star"></span> Done Rating</a>
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