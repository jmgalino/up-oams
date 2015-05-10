<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<h3>
	IPCR Forms <small><?php echo $group; ?></small>

	<?php if (TRUE): //($opcr_forms AND $ipcr_forms): ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_consolidate">Consolidate Forms</button>
	<?php else: ?>
	<button type="button" class="btn btn-default pull-right disabled" data-toggle="tooltip" data-placement="bottom" title="No OPCR/IPCR Form available">Consolidate Forms</button>
	<?php endif; ?>
</h3>
<br>

<?php
// Consolidate Form
echo View::factory($consolidate_form)
	->bind('consolidate_url', $consolidate_url)
	->bind('opcr_forms', $opcr_forms);
?>


<?php if ($ipcr_forms): ?>
<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

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
	<?php foreach ($opcr_forms as $opcr)
	{
		foreach ($ipcr_forms as $ipcr)
		{
			if ($opcr['opcr_ID'] == $ipcr['opcr_ID'])
			{
				$period_from = date('F Y', strtotime($opcr['period_from']));
				$period_to = date('F Y', strtotime($opcr['period_to']));
				$period = $period_from.' - '.$period_to;

				foreach ($users as $user)
				{
					if ($ipcr['user_ID'] == $user['user_ID'])
					{
						foreach ($programs as $program)
						{
							if($user['program_ID'] == $program['program_ID'])
							{
								$degree = $program['short'];
								break;
							}
						}
						
						$name = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'][0].'.';
						break;
					}
				}

				echo '<tr>
					<td>', $opcr['period_from'], '</td>
					<td>', $period, '</td>
					<td>', $name, '</td>
					<td>', $degree, '</td>
					<td>', date('F d, Y', strtotime($ipcr['date_submitted'])), '</td>
					<td>', $ipcr['status'], '</td>
					<td>', $ipcr['remarks'], '</td>
					<td class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="', URL::base(), 'files/document_ipcr/', $ipcr['document'], '" download="', $user['last_name'],' - [' , $period, ']">
								<span class="glyphicon glyphicon-download"></span> Download Form</a>
							</li>
							<li>
				 				<a href="', $ipcr_url, '/', $ipcr['ipcr_ID'], '">
								<span class="glyphicon glyphicon-file"></span> View Form</a>
							</li>
						</ul>
					</td>
				</tr>';
			}
		}
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>