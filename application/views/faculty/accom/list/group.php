<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active"><?php echo ($identifier == 'chair'
		? 'Accomplishment Reports - Department'
		: 'Accomplishment Reports - College'); ?></li>
</ol>

<h3>
	<div class="row">
		<div class="col-md-9">Accomplishment Reports <small><?php echo $group; ?></small></div>

		<?php if ($accom_reports): ?>
		<div class="col-md-3">
			<div class="btn-group pull-right">
		        <button class="btn btn-default" data-toggle="modal" data-target="#modal_consolidate" id="consolidate-report">Consolidate Reports</button>
		        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
		        <ul class="dropdown-menu">
					<li><a href="<?php echo ($identifier == 'chair'
						? URL::site('faculty/dept/accom/all')
						: URL::site('faculty/coll/accom/all')); ?>">View All Accomplishments</a></li>
		        </ul>
			</div>
		</div>
		<?php endif; ?>

	</div>
</h3>
<br>

<?php
// Consolidate Form
echo View::factory('faculty/accom/form/consolidate')
	->bind('consolidate_url', $consolidate_url);
?>

<?php if ($accom_reports): ?>
<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>
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
		$yearmonth = date('F Y', strtotime($accom['yearmonth']));

		echo '<tr>
			<td>', $yearmonth, '</td>';
		
		foreach ($users as $user)
		{
			if ($accom['user_ID'] == $user['user_ID'])
			{
				echo '<td>', $user['last_name'], ', ', $user['first_name'], ' ', $user['middle_name'][0], '.</td>';

				foreach ($programs as $program)
				{
					if($user['program_ID'] == $program['program_ID'])
						echo '<td>', $program['short'], '</td>';	
				}

				echo '<td>', date('F d, Y', strtotime($accom['date_submitted'])), '</td>';
				echo '<td>', $accom['status'], '</td>';
				echo '<td>', $accom['remarks'], '</td>';

				echo '<td class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href='.URL::base().'files/document_accom/'.$accom['document'].' download="', $user['last_name'],' - ' , $yearmonth, '">
								<span class="glyphicon glyphicon-download"></span> Download Report</a>
							</li>
							<li>
				 				<a href='.URL::site('faculty/dept/accom/view/'.$accom['accom_ID']).'>
								<span class="glyphicon glyphicon-file"></span> View Report</a>
							</li>
						</ul>
					</td>';
			}
		}

		echo '</tr>';
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>