<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><a href="<?php echo URL::site('faculty/cuma'); ?>">CU Management Assessment Forms</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<!-- Alerts -->
<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php elseif ($warning): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $warning; ?>
	</p>
</div>
<?php else: ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong>publish</strong>.
	</p>
</div>
<?php endif; ?>

<!-- Diplay Row -->
<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<embed src="<?php echo ($cuma_details['document']
			? URL::base().'files/tmp/'.$cuma_details['document']
			: URL::base().'files/tmp/'.$cuma_details['draft']);?>" style="width:100%; height:500px">
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li> 
				<a href="<?php echo URL::site('faculty/cuma/publish/'.$cuma_details['cuma_ID']); ?>">Publish</a>
			</li>
			<li>
				<span class="help-block" style="padding: 10px 15px;">
					Note: Double click values to edit; press save to keep the changes;
					 and press the esc button to cancel.</span>
			</li>
		</ul>
	</div>
</div>
