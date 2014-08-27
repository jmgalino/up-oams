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
		<embed src="<?php echo URL::base().'files/document_accom/'.$accom_details['document']; ?>" width="850" height="500">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li> 
				<a data-toggle="modal" data-target="#modal_evaluate" role="button" href="">Evaluate Report</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<li style="padding:10 15">
				<dl>
					<dt>Faculty</dt>
					<dd><?php echo $user; ?></dd>
				</dl>
				<dl>
					<dt>Period</dt>
					<dd><?php echo date_format(date_create($accom_details['yearmonth']), 'F Y'); ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<dd><?php echo $accom_details['status']; ?></dd>
				</dl>
				<dl>
					<dt>Remarks</dt>
					<dd><?php echo $accom_details['remarks']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>