<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/accom_dept'); ?>>Department's Accomplishment Report</a></li>
	<li class="active">View Accomplishment Report</li>
</ol>

<?php if ($evaluate): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully evaluated.
	</p>
</div>
<?php endif; ?>

<h3>
	<?php echo $label; ?>
	<div class="btn-toolbar pull-right" role="toolbar">
	  <div class="btn-group">
	  	<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_evaluate" role="button" href="">
	  		Evaluate
	  	</a>
	  </div>
	</div>
</h3>
<br>

<div class="pdf-viewer text-center">
<embed src="../../../<?php echo $filepath; ?>" width="850" height="500">
</div>

<?php 
$view = new View('faculty/ar/form/_evaluate');
$view->bind('accom_ID', $accom_ID);
$view->render(TRUE);
?><!-- Evaluate Modal -->