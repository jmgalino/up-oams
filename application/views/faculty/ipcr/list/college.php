<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li class="active">College's IPCR Forms</li>
</ol>

<h3>
	My IPCR Forms <small><?php echo $college; ?></small>
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filtered): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/ipcr_college/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($ipcr_college)>0): ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_filter">Filter Reports</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_consolidate">Consolidate Reports</button>
		</div>
		<?php endif; ?>
	</div>
</h3>
<br>


<?php
if (count($ipcr_college)>0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Period</th>
				<th>Author</th>
				<th>Degree Program</th>
				<th>Date Submitted</td>
				<th>Status</th>
				<th>Remarks</th>
			</tr>
		</thead>
		<tbody>';

	foreach ($ipcr_college as $ipcr)
	{
		echo '<tr>';
		
		foreach ($opcrs as $opcr) {

			if ($ipcr->opcr_ID == $opcr->opcr_ID)
			{
				$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
				$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);

				echo '<td>
				<a href='.url::site('ipcr/view_dept/'.$ipcr->ipcr_ID).'>
				'.$pfrom->format('F Y').' - '.$pto->format('F Y').'
				</a></td>';
			}
		}

		foreach ($users as $user)
		{
			if ($user->user_ID == $ipcr->user_ID)
			{
				echo '<td>'.$user->faculty_code.'</td>';

				foreach ($programs as $program)
				{
					if($user->program_ID == $program->program_ID)
						echo '<td>'.$program->short.'</td>';	
				}
			}
		}

		$date = DateTime::createFromFormat('Y-m-d', $ipcr->date_submitted);
		echo '<td>', $date->format('F d, Y'), '</td>';
		echo '<td>', $ipcr->status, '</td>';

		if ($ipcr->comment !== NULL)
			echo '<td>', $ipcr->comment, '</td>';
		else
			echo '<td>None</td>';

		echo '</tr>';
	}
	
	echo '</tbody></table></div>';
}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}

// Filter Modal
$f_view = new View('faculty/ipcr/form/filter');
$f_view->bind('opcrs', $opcrs);
$f_view->render(TRUE);

// Consolidate Modal
$c_view = new View('faculty/ipcr/form/consolidate');
$c_view->bind('opcrs', $opcrs);
$c_view->render(TRUE);
?>