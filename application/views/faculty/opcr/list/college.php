<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li class="active">College's OPCR Forms</li>
</ol>

<h3>
	My OPCR Forms <small><?php echo $college; ?></small>
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filtered): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/opcr_college/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($opcr_college)>0): ?>
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
if (count($opcr_college)>0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Period</th>
				<th>Author</th>
				<th>Department</th>
			</tr>
		</thead>
		<tbody>';

	foreach ($opcr_college as $opcr)
	{
		if (($opcr->status == 'Pending') OR ($opcr->status == 'Approved'))
		{
			$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
			$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);
			$date = DateTime::createFromFormat('Y-m-d', $opcr->date_submitted);

			echo '<tr>';
			echo '<td><a href='.url::site('opcr/view_college/'.$opcr->opcr_ID).'>', $pfrom->format('F Y'), ' - ', $pto->format('F Y').'</a></td>';
			
			foreach ($users as $user)
			{
				if ($user->user_ID == $opcr->user_ID)
				{
					echo '<td>'.$user->faculty_code.'</td>';

					foreach ($programs as $program)
					{
						if($user->program_ID == $program->program_ID)
							echo '<td>'.$program->short.'</td>';	
					}
				}
			}

			echo '<td>', $date->format('F d, Y'), '</td>';
			echo '<td>', $opcr->status, '</td>';

			if ($opcr->comment !== NULL)
				echo '<td>', $opcr->comment, '</td>';
			else
				echo '<td>None</td>';

			echo '</tr>';
		}
	}
	
	echo '</tbody></table></div>';
}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}

// Filter Modal
echo View::factory('faculty/opcr/form/filter')->render();

// Consolidate Modal
// echo View::factory('faculty/opcr/form/consolidate')->render();

?>