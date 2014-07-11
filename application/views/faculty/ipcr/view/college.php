<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/ipcr_college'); ?>>College's IPCRs</a></li>
	<li class="active">View IPCR</li>
</ol>

<?php if(isset($filepath)): ?>
<h3><?php echo $label; ?></h3>
<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('ipcr/evaluate/'.$ipcr_ID); ?>>
	<span class="glyphicon glyphicon-stats"></span> Evaluate
</a>
<br><br>

<div class="pdf-viewer text-center">
<embed src="../../../<?php echo $filepath; ?>" width="850" height="1100">
</div>

<?php else: ?>
<div class="alert alert-danger">
	<p class="text-center">
		File is missing.
	</p>
</div>
<?php endif; ?>