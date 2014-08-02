<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Accomplishment Report</li>
</ol>

<h3>
	Accomplishment Reports <small><?php echo $department; ?></small>
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($accom_reports) : ?>
		<button type="button" class="btn btn-default" id="filter">Filter</button>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_accom">Consolidate Reports</button>
		</div>
		<?php endif; ?>
	</div>
</h3>
<br><br>

<?php if ($accom_reports): ?>
<div class="row">

	<!-- Filter -->
	<div class="col-sm-3" id="filter_form" role="complementary" style="display:none;">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">

				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#accom_filter">Filter</a>
					</h4>
				</div>

				<div id="accom_filter" class="panel-collapse collapse in">
					<div class="panel-body">
						<?php print form::open('faculty/accom', array('class'=>'form-horizontal', 'role'=>'form'));?>
						Comming soon.<br><br>
						<?php print form::submit(NULL, 'Apply Filter', array('type'=>'submit', 'class'=>'btn btn-default pull-right', 'disabled' => 'disabled'));
						print form::close();?>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Table -->
	<div class="col-md-12" id="display_table" role="main">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Month & Year</th>
						<th>Faculty</th>
						<th>Degree Program</th>
						<th>Date Submitted</th>
						<th>Status</th>
						<th>Remarks</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
		<?php foreach ($accom_reports as $accom)
		{
			if (($accom['status'] == 'Pending') OR ($accom['status'] == 'Approved'))
			{
				$yearmonth = DateTime::createFromFormat('Y-m-d', $accom['yearmonth']);
				$date = DateTime::createFromFormat('Y-m-d', $accom['date']);

				echo '<tr>';
				echo '<td>', $yearmonth->format('F Y'), '</td>';
				echo '<td>faculty</td><td>degree</td>';
				// foreach ($users as $user)
				// {
				// 	if ($user->user_ID == $accom['user_ID'])
				// 	{
				// 		echo '<td>', $user->faculty_code, '</td>';

				// 		foreach ($programs as $program)
				// 		{
				// 			if($user->program_ID == $program->program_ID)
				// 				echo '<td>', $program->short, '</td>';	
				// 		}
				// 	}
				// }

				echo '<td>', $date->format('F d, Y'), '</td>';
				echo '<td>', $accom['status'], '</td>';
				echo '<td>', $accom['remarks'], '</td>';

				echo '<td class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href='.URL::site('faculty/accom/download/'.$accom['accom_ID']).'>
							<span class="glyphicon glyphicon-download"></span> Download Report</a>
						</li>
						<li>
			 				<a href='.URL::site('faculty/accom_dept/view/'.$accom['accom_ID']).'>
							<span class="glyphicon glyphicon-download"></span> View Report</a>
						</li>
					</ul>
					<td>';
				echo '</tr>';
			}
		}?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>

<?php
// Consolidate Form
echo View::factory('faculty/accom/form/consolidate')
	->bind('consolidate_url', $consolidate_url);
?>