<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/opcr_college'); ?>>College's OPCRs</a></li>
	<li class="active">View OPCR</li>
</ol>

<?php if(isset($filepath)): ?>
<h3><?php echo $label; ?></h3>
<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('opcr/evaluate/'.$opcr_ID); ?>>
	<span class="glyphicon glyphicon-stats"></span> Evaluate
</a>
<br><br>

<div class="pdf-viewer text-center">
<embed src="../../../<?php echo $filepath; ?>" width="1100" height="500">
</div>

<?php else: ?>
<div class="alert alert-danger">
	<p class="text-center">
		File is missing.
	</p>
</div>
<?php endif; ?>