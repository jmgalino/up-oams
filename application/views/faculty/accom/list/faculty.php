<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Accomplishment Reports</li>
</ol>

<h3>
	My Accomplishment Reports
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_accom">New Report</button>
</h3>
<br>

<?php if ($submit): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully submitted.
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully deleted.
	</p>
</div>
<?php endif; ?>

<?php
// New Form (Initialize)
echo View::factory('faculty/accom/form/initialize')
	->bind('accom_reports', $accom_reports);
?>

<?php if ($accom_reports): ?>
<!-- Table -->
<table class="table table-hover" id="accom_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Date Submitted</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($accom_reports as $accom)
	{
		echo '<tr>';
		echo '<td>', date_format(date_create($accom['yearmonth']), 'F Y'), '</td>';
		
		echo ($accom['date_submitted']
			? '<td>'.date_format(date_create($accom['date_submitted']), 'F d, Y').'</td>'
			: '<td>Not submitted</td>');

		echo '<td>', $accom['status'], '</td>';
		echo '<td>', $accom['remarks'], '</td>';
		echo '<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">';

		if ($accom['document'])
		{
				echo '<li>
						<a href='.URL::site('faculty/accom/preview/'.$accom['accom_ID']).'>
						<span class="glyphicon glyphicon-file"></span> Preview PDF</a>
					</li>
					<li>
						<a href='.URL::base().'application/'.$accom['document'].' download="', date_format(date_create($accom['yearmonth']), 'F Y'), '">
						<span class="glyphicon glyphicon-download"></span> Download Report</a>
					</li>';
		}
		else
		{
				echo '<li>
						<a href='.URL::site('faculty/accom/download/'.$accom['accom_ID']).'>
						<span class="glyphicon glyphicon-download"></span> Download Report</a>
					</li>';
		}
				
		if (($accom['status'] == 'Draft') OR ($accom['status'] == 'Saved') OR ($accom['status'] == 'Rejected'))
		{
			echo 	'<li>
						<a href='.URL::site('faculty/accom/update/'.$accom['accom_ID']).'>
						<span class="glyphicon glyphicon-pencil"></span> Edit Report</a>
					</li>
					<li>
						<a id="deleteReport" href='.URL::site('faculty/accom/delete/'.$accom['accom_ID']).'>
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