<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li class="active">View OPCR Form</li>
</ol>

<?php if ($opcr_details): ?>
<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo URL::base().'files/document_opcr/'.$opcr_details['document']; ?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?php if (!$ipcr_details): ?>
				<a href="<?php echo URL::site('faculty/ipcr/new'); ?>">Generate IPCR Form</a>

				<?php elseif (in_array($ipcr_details['status'], array('Draft', 'Saved', 'Returned'))): ?>
				<a href="<?php echo URL::site('faculty/ipcr/update/'.$ipcr_details['ipcr_ID']); ?>">
				
				<?php else: ?>
				<a href="<?php echo URL::site('faculty/ipcr/preview/'.$ipcr_details['ipcr_ID']); ?>">

				<?php endif; ?>
				Open IPCR Form</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<li style="padding:10px 15px">
				<dl>
					<dt>Period</dt>
					<dd><?php echo $period; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">There are no published OPCR Forms available for viewing.</p></div>
<?php endif; ?>