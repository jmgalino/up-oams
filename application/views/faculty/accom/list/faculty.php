<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">My Accomplishment Report</li>
</ol>

<h3>
	My Accomplishment Reports
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filter): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/accom/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($accom_reports)>0) : ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_filter">Filter Reports</button>
		</div>
		<?php endif; ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_ar">New Report</button>
		</div>
	</div>
</h3>
<br><br>

<?php
if (count($accom_reports)>0)
{
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Month & Year</th>
	<th>Date Submitted</th>
	<th>Status</th>
	<th>Remarks</th>
	<th colspan="3">Action</th>
	</tr>
	</thead>
	<tbody>';

	foreach ($accom_reports as $accom)
	{
		$date = DateTime::createFromFormat('Y-m-d', $report['date']);
		$month = DateTime::createFromFormat('n', $report['month']);
		$month_year = $month->format('F').' '.$report['year'];

		echo '<tr>';
		echo '<td><a href='.url::site('accom/view/'.$report['accom_ID']).'>', $month_year, '</a></td>';

		// Date Submitted
		if (isset($report['date']))
			echo '<td>', $date->format('F d, Y'), '</td>';
		else
			echo '<td>Not submitted</td>';

		echo '<td>', $report['status'], '</td>';

		if (isset($report['remarks']))
			echo '<td>', $report['remarks'], '</td>';
		else
			echo '<td>None</td>';

		if (($report['status'] == 'Draft') OR ($report['status'] == 'Rejected') OR (is_null($report['date'])) OR ($identifier == 'dean'))
		{
			echo '<td title="Download Report">
			<a href='.url::site('accom/download/'.$report['accom_ID']).'>
			<span class="glyphicon glyphicon-download"></span></a>
			</td>';
			echo '<td title="Edit Report">
			<a href='.url::site('accom/edit/'.$report['accom_ID']).'>
			<span class="glyphicon glyphicon-pencil"></span></a>
			</td>';
			echo '<td title="Delete Report">
			<a onclick="return confirm(\'Are you sure you want to delete this report?\');" href='.url::site('accom/delete/'.$report['accom_ID']).'>
			<span class="glyphicon glyphicon-trash"></span></a>
			</td>';
		}

		else
		{
			echo '<td title="Download Report">
			<a href='.url::site('accom/download/'.$report['accom_ID']).'>
			<span class="glyphicon glyphicon-download"></span></a>
			</td>';
			echo '<td title="Not allowed">
			<span class="glyphicon glyphicon-pencil"></span>
			</td>
			<td title="Not allowed">
			<span class="glyphicon glyphicon-trash"></span>
			</td>';
		}

		echo '</tr>';
	}

	echo '</tbody></table></div>';
}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}


// Init Modal
echo View::factory('faculty/accom/form/init')->bind('accom_reports', $accom_reports);
?>
