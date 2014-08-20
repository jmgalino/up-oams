<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active"><?php echo ($identifier == 'dean'
		? 'Accomplishment Reports - College'
		: 'Accomplishment Reports - Department'); ?></li>
</ol>

<h3>
	Accomplishment Reports <small><?php echo $group; ?></small>
	<!-- <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_consolidate">Consolidate Reports</button> -->
</h3>
<br>

<?php
// Consolidate Form
// echo View::factory('faculty/accom/form/consolidate')
// 	->bind('consolidate_url', $consolidate_url);
?>

<?php if ($accom_reports): ?>
<!-- Table -->
<table class="table table-hover" id="accom_group_table">
	<thead>
		<tr>
			<th>Period</th>
			<th>Faculty</th>
			<th>Degree Program</th>
			<th>Date Submitted</th>
			<th>Status</th>
			<th>Remarks</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($accom_reports as $accom)
	{
		echo '<tr>';
		echo '<td>', date_format(date_create($accom['yearmonth']), 'F Y'), '</td>';
		
		foreach ($users as $user)
		{
			if ($accom['user_ID'] == $user['user_ID'])
			{
				echo '<td>', $user['last_name'], ', ', $user['first_name'], ' ', $user['middle_initial'], '.</td>';

				foreach ($programs as $program)
				{
					if($user['program_ID'] == $program['program_ID'])
						echo '<td>', $program['short'], '</td>';	
				}

				echo '<td>', date_format(date_create($accom['date_submitted']), 'F d, Y'), '</td>';
				echo '<td>', $accom['status'], '</td>';
				echo '<td>', $accom['remarks'], '</td>';

				if ($user['employee_code'] !== $employee_code)
				{
					echo '<td class="dropdown">
							<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href='.URL::site('faculty/accom/download/'.$accom['accom_ID']).'>
									<span class="glyphicon glyphicon-download"></span> Download Report</a>
								</li>
								<li>
					 				<a href='.URL::site('faculty/accom_dept/view/'.$accom['accom_ID']).'>
									<span class="glyphicon glyphicon-file"></span> View Report</a>
								</li>
							</ul>
						</td>';
				}
				else
					echo '<td>Disabled</td>';
			}
		}

		echo '</tr>';
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>