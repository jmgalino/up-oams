<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><a href="<?php echo URL::site('faculty/opcr_coll'); ?>">OPCR Forms - College</a></li>
	<li class="active">View OPCR Form</li>
</ol>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		OPCR Form was successfully <?php echo $success; ?>.
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

<div class="row">
	<div class="col-md-9">
		<embed src="<?php echo URL::base().'files/document_opcr/'.$opcr_details['document']; ?>" style="width:100%; height:500px">
	</div>

	<div class="col-md-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li> 
				<a href="<?php echo URL::site().'faculty/opcr_coll/mark_checked/'.$opcr_details['opcr_ID']; ?>">Mark as Checked</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<li style="padding:10px 15px">
				<dl>
					<dt>Faculty</dt>
					<dd><?php echo $faculty; ?></dd>
				</dl>
				<dl>
					<dt>Department</dt>
					<dd><?php echo $unit; ?></dd>
				</dl>
				<dl>
					<dt>Period</dt>
					<dd><?php echo $period; ?></dd>
				</dl>
				<dl>
					<dt>Status</dt>
					<dd><?php echo $opcr_details['status']; ?></dd>
				</dl>
				<dl>
					<dt>Remarks</dt>
					<dd><?php echo $opcr_details['remarks']; ?></dd>
				</dl>
			</li>
		</ul>
	</div>
</div>