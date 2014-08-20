<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/accom'); ?>>Accomplishment Report</a></li>
	<li class="active">View Accomplishment Report</li>
</ol>

<div class="row">
	<div class="col-sm-9">
		<div class="pdf-viewer text-center">
			<embed src="<?php echo URL::base().'application/'.$accom_details['document']; ?>" width="850" height="500">
		</div>
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li style="padding:10 15">
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