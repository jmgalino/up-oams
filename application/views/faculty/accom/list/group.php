<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<h3>
	Accomplishment Reports <small><?php echo $group; ?></small>

	<?php if ($accom_reports): ?>
	<div class="btn-group pull-right">
		<button class="btn btn-default" data-toggle="modal" data-target="#modal_consolidate" id="consolidate-report">Consolidate Reports</button>
		<button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="<?php echo $accom_all_url; ?>">View All Accomplishments</a></li>
		</ul>
	</div>
	<?php endif; ?>
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
<table class="table table-hover" id="accom_group_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Faculty</th>
			<th>Academic Program</th>
			<th>Date Submitted</th>
			<th>Status</th>
			<th>Remarks</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($accom_reports as $accom)
	{
		foreach ($users as $user)
		{
			if ($accom['user_ID'] == $user['user_ID'])
			{
				$yearmonth = date('F Y', strtotime($accom['yearmonth']));
				$name = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'][0].'.';
				
				foreach ($programs as $program)
				{
					if($user['program_ID'] == $program['program_ID'])
					{
						$degree = $program['short'];
						break;
					}
				}

				echo '<tr>
					<td>', $yearmonth, '</td>
					<td>', $name, '</td>
					<td>', $degree, '</td>
					<td>', date('F d, Y', strtotime($accom['date_submitted'])), '</td>
					<td>', $accom['status'], '</td>
					<td>', $accom['remarks'], '</td>
					<td class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href='.URL::base().'files/document_accom/'.$accom['document'].' download="', $user['last_name'],' - ' , $yearmonth, '">
								<span class="glyphicon glyphicon-download"></span> Download Report</a>
							</li>
							<li>
				 				<a href="', $accom_url, '/', $accom['accom_ID'], '">
								<span class="glyphicon glyphicon-file"></span> View Report</a>
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