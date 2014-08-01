<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">My Accomplishment Report</li>
</ol>

<?php if ((isset($delete) AND $delete == 1)): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully deleted.
	</p>
</div>
<?php endif; ?>

<h3>
	My Accomplishment Reports
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($accom_reports) : ?>
		<button type="button" class="btn btn-default" id="filter">Filter</button>
		<?php endif; ?>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_accom">New Report</button>
	</div>
</h3>
<br><br>

<?php if ($accom_reports): ?>
<div class="row">

	<!-- Filter -->
	<div class="col-sm-3" id="filter_form" role="complementary" style="display: none;">
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
						<th>Date Submitted</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
		<?php foreach ($accom_reports as $accom)
		{
			$yearmonth = DateTime::createFromFormat('Y-m-d', $accom['yearmonth']);

			echo '<tr>';
			echo '<td>', $yearmonth->format('F Y'), '</td>';

			// Date Submitted
			if (isset($accom['date']))
			{
				$date = DateTime::createFromFormat('Y-m-d', $accom['date']);
				echo '<td>', $date->format('F d, Y'), '</td>';
			}
			else
				echo '<td>Not submitted</td>';

			echo '<td>', $accom['status'], '</td>';

			echo '<td class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href='.URL::site('faculty/accom/download/'.$accom['accom_ID']).'>
							<span class="glyphicon glyphicon-download"></span> Download Report</a>
						</li>';
			// if ($accom['document'])
			// {
			// 	echo	'<li>
			// 				<a href='.URL::site('faculty/accom/view/'.$accom['accom_ID']).'>
			// 				<span class="glyphicon glyphicon-download"></span> View Report</a>
			// 			</li>';
			// else
			if (($accom['status'] == 'Draft') OR (is_null($accom['date'])) OR ($identifier == 'dean'))
			{
				echo 	'<li>
							<a href='.URL::site('faculty/accom/edit/'.$accom['accom_ID']).'>
							<span class="glyphicon glyphicon-pencil"></span> Edit Report</a>
						</li>
						<li>
							<a onclick="return confirm(\'Are you sure you want to delete this report?\');" href='.URL::site('faculty/accom/delete/'.$accom['accom_ID']).'>
							<span class="glyphicon glyphicon-trash"></span> Delete Report</a>
						</li>';
			}

			echo '	</ul>
				</td>
				</tr>';
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
// Add Form (Initialize)
echo View::factory('faculty/accom/form/initialize');
?>
