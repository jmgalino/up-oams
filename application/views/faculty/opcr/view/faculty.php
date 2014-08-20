<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/opcr'); ?>>Office Performance Commitment and Review</a></li>
	<li class="active">View OPCR Form</li>
</ol>

<div class="row">
	<div class="col-sm-9">
		<div class="pdf-viewer text-center">
			<embed src="<?php echo URL::base().'application/'.$opcr_details['document']; ?>" width="850" height="500">
		</div>
	</div>
	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<?php if (count($ipcr_forms) > 1): ?>
			<li>
				<a href="">Preview Consolidated</a>
			</li>
			<li> 
				<a href="">Consolidate + Submit</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<?php endif; ?>
			<li style="padding:10 15">
				<dl>
					<dt>Department</dt>
					<dd><?php echo $department; ?></dd>
				</dl>
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