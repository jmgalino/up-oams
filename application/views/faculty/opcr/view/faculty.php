<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/opcr'); ?>>Office Performance Commitment and Review</a></li>
	<li class="active">View OPCR Form</li>
</ol>

<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo ($opcr_details['document']
			? URL::base().'files/document_opcr/'.$opcr_details['document']
			: URL::base().'files/tmp/'.$opcr_details['draft']);?>" style="width:100%; height:500px">
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
					<dt>Period</dt>
					<dd><?php echo $period; ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<?php echo ($opcr_details['status'] != 'Draft'
						? '<dd>'.$opcr_details['status'].'</dd>'
						: '<dd style="color:#015d2d;"><em>'.$opcr_details['status'].'</em></dd>'); ?>
				</dl>
				<dl>
					<dt>Remarks</dt>
					<dd><?php echo $opcr_details['remarks']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>