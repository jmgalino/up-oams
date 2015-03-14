<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/accom'); ?>>Accomplishment Report</a></li>
	<li class="active">View Accomplishment Report</li>
</ol>

<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo ($accom_details['document']
			? URL::base().'files/document_accom/'.$accom_details['document']
			: URL::base().'files/tmp/'.$accom_details['draft']);?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li style="padding:10 15">
				<dl>
					<dt>Period</dt>
					<dd><?php echo date('F Y', strtotime($accom_details['yearmonth'])); ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<?php echo ($accom_details['status'] != 'Draft'
						? '<dd>'.$accom_details['status'].'</dd>'
						: '<dd style="color:#015d2d;"><em>'.$accom_details['status'].'</em></dd>'); ?>
				</dl>
				<dl>
					<dt>Remarks</dt>
					<dd><?php echo $accom_details['remarks']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>