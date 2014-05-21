<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/profile'); ?>>My Profile</a></li>
	<li class="active">View <?php echo $label; ?></li>
</ol>

<?php if(isset($filepath)): ?>
<div class="pdf-viewer text-center">
	<embed src="../../../<?php echo $filepath; ?>" width="1100" height="500">
</div>

<?php else: ?>
<div class="alert alert-danger">
	<p class="text-center">
		You didn't submit this report, ergo this report is not available.
	</p>
</div>
<?php endif; ?>