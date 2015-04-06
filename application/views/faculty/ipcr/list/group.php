<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active"><?php echo ($identifier == 'chair'
		? 'IPCR Forms - Department'
		: 'IPCR Forms - College'); ?></li>
</ol>

<h3>
	IPCR Forms <small><?php echo $group; ?></small>
	<?php if ($identifier == 'chair'): ?>
	<button type="button"
	<?php echo (($opcr_forms AND $ipcr_forms)
		? 'class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_consolidate"'
		: 'class="btn btn-default pull-right disabled button-tip" data-toggle="tooltip" data-placement="bottom" title="No OPCR/IPCR Form available"');
	?>>Consolidate Forms</button>
	<?php endif; ?>
</h3>
<br>

<?php
// Consolidate Form
echo View::factory('faculty/ipcr/form/modals/consolidate')
	->bind('consolidate_url', $consolidate_url)
	->bind('opcr_forms', $opcr_forms);
?>

<?php if ($ipcr_forms): ?>
<!-- Table -->
<table class="table table-hover" id="ipcr_group_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th></th>
			<th>Period</th>
			<th>Faculty</th>
			<th>Degree Program</th>
			<th>Date Submitted</td>
			<th>Status</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($ipcr_forms as $ipcr)
	{
		foreach ($opcr_forms as $opcr)
		{
			if ($ipcr['opcr_ID'] == $opcr['opcr_ID'])
			{
				$period_from = date('F Y', strtotime($opcr['period_from']));
				$period_to = date('F Y', strtotime($opcr['period_to']));
				$period = $period_from.' - '.$period_to;

				echo '<tr>
					<td>', $opcr['period_from'], '</td>
					<td>', $period, '</td>';
					
				foreach ($users as $user)
				{
					if ($ipcr['user_ID'] == $user['user_ID'])
					{
						echo '<td>', $user['last_name'], ', ', $user['first_name'], ' ', $user['middle_name'][0], '.</td>';

						foreach ($programs as $program)
						{
							if($user['program_ID'] == $program['program_ID'])
								echo '<td>', $program['short'], '</td>';	
						}

						echo '<td>', date('F d, Y', strtotime($ipcr['date_submitted'])), '</td>';
						echo '<td>', $ipcr['status'], '</td>';
						echo '<td>', $ipcr['remarks'], '</td>';

						echo '<td class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href='.URL::base().'files/document_ipcr/'.$ipcr['document'].' download="', $user['last_name'],' - [' , $period, ']">
										<span class="glyphicon glyphicon-download"></span> Download Form</a>
									</li>
									<li>
						 				<a href='.URL::site('faculty/ipcr_dept/view/'.$ipcr['ipcr_ID']).'>
										<span class="glyphicon glyphicon-file"></span> View Form</a>
									</li>
								</ul>
							</td>';
					}
				}

				echo '</tr>';
			}
		}
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>