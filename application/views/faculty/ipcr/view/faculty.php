<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active">View IPCR Form</li>
</ol>

<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo ($ipcr_details['draft']
			? URL::base().'files/tmp/'.$ipcr_details['draft']
			: URL::base().'files/document_ipcr/'.$ipcr_details['document']);?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li style="padding:10 15">
				<dl>
					<dt>Period</dt>
					<dd><?php echo $period; ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<?php echo ($ipcr_details['status'] != 'Draft'
						? '<dd>'.$ipcr_details['status'].'</dd>'
						: '<dd style="color:#015d2d;"><em>'.$ipcr_details['status'].'</em></dd>'); ?>
				</dl>
				<dl>
					<dt>Remarks</dt>
					<dd><?php echo $ipcr_details['remarks']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>