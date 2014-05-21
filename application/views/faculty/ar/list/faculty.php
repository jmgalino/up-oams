<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li class="active">My Accomplishment Report</li>
</ol>

<h3>
	My Accomplishment Reports
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filtered): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/accom/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($ar_rows)>0) : ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_filter">Filter Reports</button>
		</div>
		<?php endif; ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_ar">New Report</button>
		</div>
	</div>
</h3>
<br>

<?php
if (count($ar_rows)>0)
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

	foreach ($ar_rows as $accom)
	{
		$date = DateTime::createFromFormat('Y-m-d', $accom->date);
		$month = DateTime::createFromFormat('n', $accom->month);
		$month_year = $month->format('F').' '.$accom->year;

		echo '<tr>';
		echo '<td><a href='.url::site('accom/view/'.$accom->accom_ID).'>', $month_year, '</a></td>';

		// Date Submitted
		if (isset($accom->date))
			echo '<td>', $date->format('F d, Y'), '</td>';
		else
			echo '<td>Not submitted</td>';

		echo '<td>', $accom->status, '</td>';

		if (isset($accom->remarks))
			echo '<td>', $accom->remarks, '</td>';
		else
			echo '<td>None</td>';

		if (($accom->status == 'Draft') OR ($accom->status == 'Rejected') OR (is_null($accom->date)) OR ($identifier == 'dean'))
		{
			echo '<td title="Download Report">
			<a href='.url::site('accom/download/'.$accom->accom_ID).'>
			<span class="glyphicon glyphicon-download"></span></a>
			</td>';
			echo '<td title="Edit Report">
			<a href='.url::site('accom/edit/'.$accom->accom_ID).'>
			<span class="glyphicon glyphicon-pencil"></span></a>
			</td>';
			echo '<td title="Delete Report">
			<a onclick="return confirm(\'Are you sure you want to delete this report?\');" href='.url::site('accom/delete/'.$accom->accom_ID).'>
			<span class="glyphicon glyphicon-trash"></span></a>
			</td>';
		}

		else
		{
			echo '<td title="Download Report">
			<a href='.url::site('accom/download/'.$accom->accom_ID).'>
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
$view = new View('faculty/ar/form/init');
$view->bind('ar_rows', $ar_rows);
$view->render(TRUE);

// Filter Modal
echo View::factory('faculty/ar/form/filter')->render();
?>
