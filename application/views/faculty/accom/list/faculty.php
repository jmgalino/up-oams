<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Accomplishment Reports</li>
</ol>

<h3>
	<div class="row">
		<div class="col-md-6">My Accomplishment Reports</div>
		<div class="col-md-6">

			<?php if ($accom_reports): ?>
			<div class="btn-group pull-right">
		        <button class="btn btn-default" data-toggle="modal" data-target="#modal_accom" id="new-report">New Report</button>
		        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
		        <ul class="dropdown-menu">
					<li><a href="<?php echo URL::site('faculty/accom/all'); ?>">View All Accomplishments</a></li>
		        </ul>
			</div>
			<?php else: ?>
			<button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_accom" id="new-report">New Report</button>
			<?php endif; ?>
	  </div>
	</div>
</h3>
<br>

<?php
// New Form (Initialize)
echo View::factory('faculty/accom/form/initialize')
	->bind('accom_reports', $accom_reports);
?>

<?php if ($accom_reports): ?>
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
<?php elseif ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

<!-- Table -->
<table class="table table-hover" id="accom_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th></th>
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
		$yearmonth = date('F Y', strtotime($accom['yearmonth']));

		echo '<tr>
			<td>', $accom['yearmonth'], '</td>
			<td>', $yearmonth, '</td>';
		
		echo ($accom['date_submitted']
			? '<td>'.date('F d, Y', strtotime($accom['date_submitted'])).'</td>'
			: '<td>Not submitted</td>');

		echo '<td>', $accom['status'], '</td>';
		echo '<td>', $accom['remarks'], '</td>';
		echo '<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href='.URL::site('faculty/accom/preview/'.$accom['accom_ID']).'>
						<span class="glyphicon glyphicon-file"></span> Preview Report</a>
					</li>';

		if ($accom['status'] == 'Returned')
		{
			// Download PDF
			echo '<li>
					<a href='.URL::base().'files/document_accom/'.$accom['document'].' download="', $yearmonth, '">
					<span class="glyphicon glyphicon-download"></span> Download Report (Returned)</a>
				</li>';
			// Download draft
			echo '<li>
					<a href='.URL::site('extras/mpdf/download/accom/'.$accom['accom_ID']).'>
					<span class="glyphicon glyphicon-download"></span> Download Report (Current)</a>
				</li>';
		}
		else
		{
			if ($accom['document'])
			{
				// Download PDF
				echo '<li>
						<a href='.URL::base().'files/document_accom/'.$accom['document'].' download="', $yearmonth, '">
						<span class="glyphicon glyphicon-download"></span> Download Report</a>
					</li>';
			}
			else
			{
				// Download draft
				echo '<li>
						<a href='.URL::site('extras/mpdf/download/accom/'.$accom['accom_ID']).'>
						<span class="glyphicon glyphicon-download"></span> Download Report</a>
					</li>';
			}
		}

		if (($accom['status'] == 'Draft') OR ($accom['status'] == 'Saved') OR ($accom['status'] == 'Returned'))
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