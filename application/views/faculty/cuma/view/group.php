<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><a href="<?php echo URL::site('faculty/coll/cuma'); ?>">CUMA Forms - College</a></li>
	<li class="active">View CUMA Form</li>
</ol>

<!-- Display -->
<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo URL::base().'files/document_cuma/'.$cuma_details['document']; ?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li style="padding:10 15">
				<dl>
					<dt>Faculty</dt>
					<dd><?php echo $faculty; ?></dd>
				</dl>
				<dl>
					<dt>Department</dt>
					<dd><?php echo $unit; ?></dd>
				</dl>
				<dl>
					<dt>Period</dt>
					<dd><?php echo 'AY ', date('Y', strtotime($cuma_details['period_from'])), ' - ', date('Y', strtotime($cuma_details['period_to'])); ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<dd><?php echo $cuma_details['status']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>