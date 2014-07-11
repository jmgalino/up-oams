<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/ipcr_dept'); ?>>Department's IPCRs</a></li>
	<li class="active">View IPCR</li>
</ol>

<h3>
	<?php echo $label; ?>
	<div class="btn-toolbar pull-right" role="toolbar">
	  <div class="btn-group">
	  	<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('ipcr/evaluate/'.$ipcr_ID); ?>>
	  		Evaluate
	  	</a>
	  </div>
	</div>
</h3>
<br>

<div class="pdf-viewer text-center">
<embed src="../../../<?php echo $filepath; ?>" width="850" height="500">
</div>