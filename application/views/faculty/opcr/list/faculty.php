<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li class="active">Office Performance Commitment and Review</li>
</ol>

<h3>
	My OPCR Forms
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filtered): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/opcr/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($opcr_rows)> 0): ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_filter">Filter Forms</button>
		</div>
		<?php endif; ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_opcr">New Form</button>
		</div>
	</div>
</h3>
<br>

<?php
if (count($opcr_rows)>0)
{
	echo '<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Period</th>
	<th>Date Submitted</td>
	<th>Status</th>
	<th>Comment</th>
	<th colspan="3">Action</th>
	</tr>
	</thead>
	<tbody>';

	foreach ($opcr_rows as $opcr)
	{
		$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
		$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);
		$date = DateTime::createFromFormat('Y-m-d', $opcr->date_submitted);

		echo '<tr>';
		echo '<td><a href='.url::site('opcr/view/'.$opcr->opcr_ID).'>', $pfrom->format('F Y'), ' - ', $pto->format('F Y').'</a></td>';

		// Date Submitted
		if ($opcr->date_submitted !== NULL)
			echo '<td>', $date->format('F d, Y'), '</td>';
		else
			echo '<td>Not submitted</td>';

		echo '<td>', $opcr->status;
		if($opcr->status == 'Pending') echo ' (Published)', '</td>';
		else '</td>';

		// Comment
		if ($opcr->comment !== NULL)
			echo '<td>', $opcr->comment, '</td>';
		else
			echo '<td>None</td>';

		if (($opcr->status == 'Draft') OR ($opcr->status == 'Rejected') OR (is_null($opcr->date_submitted)) OR ($this->site->session->get('identifier') == 'dean'))
		{
			echo '<td title="Download Form">
			<a href='.url::site('opcr/download/'.$opcr->opcr_ID).'>
			<span class="glyphicon glyphicon-download"></span></a>
			</td>';
			echo '<td title="Edit Form">
			<a href='.url::site('opcr/edit/'.$opcr->opcr_ID).'>
			<span class="glyphicon glyphicon-pencil"></span></a>
			</td>';
			echo '<td title="Delete Form">
			<a onclick="return confirm(\'Are you sure you want to delete this form?\');" href='.url::site('opcr/delete/'.$opcr->opcr_ID).'>
			<span class="glyphicon glyphicon-trash"></span></a>
			</td>';
		}

		else
		{
			echo '<td title="Download Form">
			<a href='.url::site('opcr/download/'.$opcr->opcr_ID).'>
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

	echo '</table></div>';
}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}

// Init Modal
$view = new View('faculty/opcr/form/_initialize/_modals/init');
$view->bind('opcrs', $opcr_rows);
$view->render(TRUE);

// Filter Modal
echo View::factory('faculty/opcr/form/filter')->render();
?>

