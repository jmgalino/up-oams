<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li class="active">College's OPCR Forms</li>
</ol>

<h3>
	OPCR Forms <small><?php echo $college; ?></small>
	<button type="button"
	<?php echo ($opcr_forms
		? 'class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_consolidate"'
		: 'class="btn btn-default pull-right disabled button-tip" data-toggle="tooltip" data-placement="bottom" title="No OPCR/IPCR available"');
	?>>Consolidate Forms</button>
</h3>
<br>

<?php
// Consolidate Form
// echo View::factory('faculty/opcr/form/modals/consolidate')
// 	->bind('consolidate_url', $consolidate_url)
// 	->bind('opcr_forms', $opcr_forms);
?>

<?php if ($opcr_forms): ?>
<!-- Table -->
<table class="table table-hover" id="opcr_college_table">
	<thead>
		<tr>
			<th>Period</th>
			<th>Author</th>
			<th>Department</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($opcr_college as $opcr)
	{
		if (($opcr['status'] == 'Pending') OR ($opcr['status'] == 'Approved'))
		{
			$period_from = date('F Y', strtotime($opcr['period_from']));
			$period_to = date('F Y', strtotime($opcr['period_to']));
			$period = $period_from.' - '.$period_to;

			echo '<tr>';
			echo '<td><a href='.URL::site('opcr/view_college/'.$opcr->opcr_ID).'>', $pfrom->format('F Y'), ' - ', $pto->format('F Y').'</a></td>';
			
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

			echo '<td>', date('F d, Y', strtotime($opcr['date_submitted'])), '</td>';
			echo '<td>', $opcr->status, '</td>';

			if ($opcr->comment !== NULL)
				echo '<td>', $opcr->comment, '</td>';
			else
				echo '<td>None</td>';

			echo '</tr>';
		}
	}
	?>
	</tbody>
</table></div>

<?php else: ?>
	<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>
