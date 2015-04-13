<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><a href="<?php echo URL::site('faculty/cuma'); ?>">CU Management Assessment Forms</a></li>
	<li class="active">View CUMA Form</li>
</ol>

<!-- Display -->
<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo ($cuma_details['draft']
			? URL::base().'files/tmp/'.$cuma_details['draft']
			: URL::base().'files/document_cuma/'.$cuma_details['document']);?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li style="padding:10 15">
				<dl>
					<dt>Period</dt>
					<dd><?php echo 'AY ', date('Y', strtotime($cuma_details['period_from'])), ' - ', date('Y', strtotime($cuma_details['period_to'])); ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<?php echo ($cuma_details['status'] != 'Draft'
						? '<dd>'.$cuma_details['status'].'</dd>'
						: '<dd style="color:#015d2d;"><em>'.$cuma_details['status'].'</em></dd>'); ?>
				</dl>
			</li>
		</ul>
	</div>
</div>