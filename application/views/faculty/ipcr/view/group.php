<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo ($identifier == 'dean'
		? URL::site('faculty/ipcr_coll').'>IPCR Forms - College'
		: URL::site('faculty/ipcr_dept').'>IPCR Forms - Department'); ?></a></li>
	<li class="active">View <?php echo $user; ?>'s IPCR Form</li>
</ol>

<h3>
	<?php echo $period; ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_evaluate">Evaluate Report</button>
</h3>
<br>

<?php if ($evaluation): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		IPCR Form was successfully <?php echo $evaluation; ?>.
	</p>
</div>
<?php endif; ?>

<?php
// Evaluate Form
// $url = $evaluate_url.$accom['accom_ID'];
// echo View::factory('faculty/ipcr/form/evaluate')
// 	->bind('evaluate_url', $url);
?>

<div class="pdf-viewer text-center">
<embed src=<?php echo URL::base().'application/'.$ipcr['document']; ?> width="850" height="500">
</div>