<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo ($identifier == 'dean'
		? URL::site('faculty/accom_coll').'>Accomplishment Reports - College'
		: URL::site('faculty/accom_dept').'>Accomplishment Reports - Department'); ?></a></li>
	<li class="active">View Accomplishment Report</li>
</ol>

<?php if ($evaluate): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully evaluated.
	</p>
</div>
<?php endif; ?>

<?php
// Evaluate Form
echo View::factory('faculty/accom/form/evaluate')
	->bind('evaluate_url', $evaluate_url);
?>

<div class="row">
	<div class="col-sm-9">
		<div class="pdf-viewer text-center">
			<embed src="<?php echo URL::base().'application/'.$accom_details['document']; ?>" width="850" height="500">
		</div>
	</div>

	<div class="col-md-3">
		<div class="bs-sidebar hidden-print affix" role="complementary">
			<ul class="nav nav-pills nav-stacked">
				<li> 
					<a data-toggle="modal" data-target="#modal_evaluate" role="button" href="">Evaluate Report</a>
				</li>
				<hr style="border-top: dotted 1px;">
				<li style="padding:10 15">
					<form role="form">
						<div class="form-group">
							<label style="font-weight: 500;">Faculty</label>
							<p class="form-control-static"><?php echo $user; ?></p>
						</div>
						<div class="form-group">
							<label style="font-weight: 500;">Period</label>
							<p class="form-control-static"><?php echo date_format(date_create($accom_details['yearmonth']), 'F Y'); ?></p>
						</div>
						<div class="form-group">
							<label style="font-weight: 500;">Status</label>
							<p class="form-control-static"><?php echo $accom_details['status']; ?></p>
						</div>
						<div class="form-group">
							<label style="font-weight: 500;">Remarks</label>
							<p class="form-control-static"><?php echo $accom_details['remarks']; ?></p>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>