<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo ($identifier == 'chair'
		? URL::site('faculty/dept/accom').'>Accomplishment Reports - Department'
		: URL::site('faculty/coll/accom').'>Accomplishment Reports - College'); ?></a></li>
	<li class="active">View Accomplishment Report</li>
</ol>

<?php if ($evaluation): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully <?php echo strtolower($evaluation); ?>.
	</p>
</div>
<?php endif; ?>

<?php
// Evaluate Form
echo View::factory('faculty/accom/form/evaluate')
	->bind('evaluate_url', $evaluate_url);
?>

<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo URL::base().'files/document_accom/'.$accom_details['document']; ?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<?php if (!$user_flag): ?>
			<li> 
				<a data-toggle="modal" data-target="#modal_evaluate" role="button" href="">Evaluate Report</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<?php endif; ?>
			<li style="padding:10 15">
				<?php if (!$user_flag): ?>
				<dl>
					<dt>Faculty</dt>
					<dd><?php echo $faculty; ?></dd>
				</dl>
				<?php endif; ?>
				<dl>
					<dt>Period</dt>
					<dd><?php echo date('F Y', strtotime($accom_details['yearmonth'])); ?></dd>
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