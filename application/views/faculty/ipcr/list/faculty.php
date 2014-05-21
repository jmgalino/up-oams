<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li class="active">Individual Performance Commitment and Review</li>
</ol>

<h3>
	My IPCR Forms
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filtered): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/ipcr/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($ipcr_rows)>0): ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_filter">Filter Forms</button>
		</div>
		<?php endif; ?>
		<?php if (count($opcrs) > 0): ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_ipcr">New Form</button>
		</div>
		<?php endif; ?>
	</div>
</h3>
<br>

<?php
if (count($ipcr_rows)>0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Period</th>
					<th>Status</th>
					<th>Comment</th>
					<th colspan="3">Actions</th>
				</tr>
			</thead>
			<tbody>';

	foreach ($ipcr_rows as $ipcr)
	{
		echo '<tr>';

		foreach ($opcrs as $opcr) {

			if ($ipcr->opcr_ID == $opcr->opcr_ID)
			{
				$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
				$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);

				echo '<td>
				<a href='.url::site('ipcr/view/'.$ipcr->ipcr_ID).'>
				'.$pfrom->format('F Y').' - '.$pto->format('F Y').'
				</a></td>';
			}
		}

		// Date Submitted
		$date = DateTime::createFromFormat('Y-m-d', $ipcr->date_submitted);
		if ($ipcr->date_submitted !== NULL)
			echo '<td>', $date->format('F d, Y'), '</td>';
		else
			echo '<td>Not submitted</td>';

		echo '<td>', $ipcr->status, '</td>';

		// Comment
		if ($ipcr->comment !== NULL)
			echo '<td>', $ipcr->comment, '</td>';
		else
			echo '<td>None</td>';

		if (($ipcr->status == 'Draft') OR ($ipcr->status == 'Rejected') OR (is_null($ipcr->date_submitted)) OR ($this->site->session->get('identifier') == 'dean'))
		{
			echo '<td title="Download Form">
			<a href='.url::site('ipcr/download/'.$ipcr->ipcr_ID).'>
			<span class="glyphicon glyphicon-download"></span></a>
			</td>';
			echo '<td title="Edit Form">
			<a href='.url::site('ipcr/edit/'.$ipcr->ipcr_ID).'>
			<span class="glyphicon glyphicon-pencil"></span></a>
			</td>';
			echo '<td title="Delete Form">
			<a onclick="return confirm(\'Are you sure you want to delete this form?\');" href='.url::site('ipcr/delete/'.$ipcr->ipcr_ID).'>
			<span class="glyphicon glyphicon-trash"></span></a>
			</td>';
		}

		else
		{
			echo '<td title="Download Form">
			<a href='.url::site('ipcr/download/'.$ipcr->ipcr_ID).'>
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
$view = new View('faculty/ipcr/form/_create/init');
$view->bind('opcrs', $opcrs);
$view->render(TRUE);

// Filter Modal
// echo View::factory('faculty/ipcr/form/filter')->render();
?>
