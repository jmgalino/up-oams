<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active">View IPCR Form</li>
</ol>

<div class="row">
	<div class="col-sm-9">
		<div class="pdf-viewer text-center">
			<embed src="<?php echo URL::base().'application/'.$ipcr_details['document']; ?>" width="850" height="500">
		</div>
	</div>

	<div class="col-md-3">
		<div class="bs-sidebar hidden-print affix" role="complementary">
			<ul class="nav nav-pills nav-stacked">
				<li style="padding:10 15">
					<form role="form">
						<div class="form-group">
							<label style="font-weight: 500;">Period</label>
							<p class="form-control-static"><?php echo $label; ?></p>
						</div>
						<div class="form-group">
							<label style="font-weight: 500;">Status</label>
							<p class="form-control-static"><?php echo $ipcr_details['status']; ?></p>
						</div>
						<div class="form-group">
							<label style="font-weight: 500;">Remarks</label>
							<p class="form-control-static"><?php echo $ipcr_details['remarks']; ?></p>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>