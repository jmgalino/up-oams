<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/cuma_college'); ?>>College's CU Management Assessment Forms</a></li>
	<li class="active">View CU Management Assessment Form</li>
</ol>

<?php if(isset($filepath)): ?>
<h3><?php echo $label; ?></h3>
<br>
<div class="pdf-viewer text-center">
<embed src="../../../<?php echo $filepath; ?>" width="850" height="500">
</div>

<?php else: ?>
<div class="alert alert-danger">
	<p class="text-center">
		File is missing.
	</p>
</div>
<?php endif; ?>