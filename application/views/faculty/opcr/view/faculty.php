<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/opcr'); ?>>Office Performance Commitment and Review</a></li>
	<li class="active">View <?php echo $label; ?></li>
</ol>

<div class="pdf-viewer text-center">
	<embed src="<?php echo URL::base().'application/'.$filepath; ?>" width="850" height="500">
</div>