<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li class="active">CU Management Assessment Forms</li>
</ol>

<!-- Header -->
<h3>
	My CU Management Assessment Forms
	<button type="button" class="btn btn-default pull-right" id="new-cuma" data-toggle="modal" data-target="#modal_cuma">New Form</button>
</h3>
<br>

<!-- Alerts -->
<?php if ($publish): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		CUMA Form was successfully published.
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		CUMA Form was successfully deleted.
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

<!-- Forms -->
<?php
// New Form (Initialize)
echo View::factory('faculty/cuma/form/initialize')
	->bind('cuma_forms', $cuma_forms);
?>

<?php if ($cuma_forms): ?>

<!-- Table -->
<table class="table table-hover" id="cuma_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Date of Submission</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($cuma_forms as $cuma)
	{
		$start = date('Y', strtotime($cuma['period_from']));
		$end = date('Y', strtotime($cuma['period_to']));
		
		$cuma['date_submitted'] = ($cuma['date_submitted']
			? date('F d, Y', strtotime($cuma['date_submitted']))
			: 'Not submitted');

		echo '<tr>
			<td>AY ', $start, ' - ', $end, '</td>
			<td>', $cuma['date_submitted'], '</td>
			<td>', $cuma['status'], '</td>
			<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href="'.URL::site('faculty/cuma/preview/'.$cuma['cuma_ID']).'">
						<span class="glyphicon glyphicon-file"></span> Preview Form</a>
					</li>';

		if ($cuma['status'] == 'Draft')
		{
			// Download draft
			echo '<li>
					<a href="'.URL::site('extras/mpdf/download/cuma/'.$cuma['cuma_ID']).'">
					<span class="glyphicon glyphicon-download"></span> Download Form</a>
				</li>
				<li>
					<a href="'.URL::site('faculty/cuma/update/'.$cuma['cuma_ID']).'">
					<span class="glyphicon glyphicon-search"></span> Review Form</a>
				</li>
				<li>
					<a id="deleteForm" href="'.URL::site('faculty/cuma/delete/'.$cuma['cuma_ID']).'">
					<span class="glyphicon glyphicon-trash"></span> Delete Form</a>
				</li>';
		}
		else
		{
			// Download PDF
			echo '<li>
					<a href='.URL::base().'files/document_cuma/'.$cuma['document'].' download="', $department, ' [', $start, ' - ', $end, ']">
					<span class="glyphicon glyphicon-download"></span> Download Form</a>
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