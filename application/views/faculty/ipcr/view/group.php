<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo ($identifier == 'dean'
		? URL::site('faculty/ipcr_coll').'>IPCR Forms - College'
		: URL::site('faculty/ipcr_dept').'>IPCR Forms - Department'); ?></a></li>
	<li class="active">View IPCR Form</li>
</ol>

<?php if ($evaluation): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		IPCR Form was successfully <?php echo $evaluation; ?>.
	</p>
</div>
<?php endif; ?>

<?php
// Evaluate Form
echo View::factory('faculty/ipcr/form/modals/evaluate')
	->bind('evaluate_url', $evaluate_url);
?>

<div class="row">
	<div class="col-sm-9">
		<div class="pdf-viewer text-center">
			<embed src="<?php echo URL::base().'application/'.$ipcr_details['document']; ?>" width="850" height="500">
		</div>
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li> 
				<?php echo (($ipcr_details['status'] == 'Pending' AND $ipcr_details['remarks'] != 'None')
						? '<a href="">Mark as Checked'
						: '<a data-toggle="modal" data-target="#modal_evaluate" role="button" href="">Evaluate (Initial)') ?>
				</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<li style="padding:10 15">
				<dl>
					<dt>Faculty</dt>
					<dd><?php echo $user; ?></dd>
				</dl>
				<dl>
					<dt>Period</dt>
					<dd><?php echo $label; ?></dd>
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