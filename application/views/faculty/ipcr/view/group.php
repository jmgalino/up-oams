<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><?php echo $ipcr_url; ?></li>
	<li class="active">View IPCR Form</li>
</ol>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		IPCR Form was successfully <?php echo $success; ?>.
	</p>
</div>
<?php elseif ($success === FALSE): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Something went wrong, please try again.
	</p>
</div>
<?php endif; ?>

<?php
// Evaluate Form
echo View::factory('faculty/ipcr/form/modals/evaluate')
	->bind('evaluate_url', $evaluate_url);
?>

<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo URL::base().'files/document_ipcr/'.$ipcr_details['document']; ?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<?php if (!$user_flag): ?>
			<li> 
				<a data-toggle="modal" data-target="#modal_evaluate" role="button" href="">Evaluate Form</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<?php endif; ?>
			<li style="padding:10px 15px">
				<?php if (!$user_flag): ?>
				<dl>
					<dt>Faculty</dt>
					<dd><?php echo $faculty; ?></dd>
				</dl>
				<?php endif; ?>
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