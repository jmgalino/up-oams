<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active">View IPCR Form</li>
</ol>

<div class="row">
	<div class="col-sm-9">
		<embed src="<?php echo URL::base().'files/document_ipcr/'.$ipcr_details['document']; ?>" width="850" height="500">
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
					<dd><?php echo $ipcr_details['status']; ?></dd>
				</dl>
				<dl>
					<dt>Remarks</dt>
					<dd><?php echo $ipcr_details['remarks']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>