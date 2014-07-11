<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/accom_college'); ?>>College's Accomplishment Report</a></li>
	<li class="active">View Accomplishment Report</li>
</ol>

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