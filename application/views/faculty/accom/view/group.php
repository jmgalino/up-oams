<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo ($identifier == 'dean'
		? URL::site('faculty/accom_coll').'>Accomplishment Reports - College'
		: URL::site('faculty/accom_dept').'>Accomplishment Reports - Department'); ?></a></li>
	<li class="active">View <?php echo $user; ?>'s Accomplishment Report</li>
</ol>

<h3>
	<?php echo date_format(date_create($accom['yearmonth']), 'F Y'); ?>
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_evaluate">Evaluate Report</button>
</h3>
<br>

<?php if ($evaluate): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Accomplishment Report was successfully evaluated.
	</p>
</div>
<?php endif; ?>

<?php
// Evaluate Form
$url = $evaluate_url.$accom['accom_ID'];
echo View::factory('faculty/accom/form/evaluate')
	->bind('evaluate_url', $url);
?>

<div class="pdf-viewer text-center">
<embed src=<?php echo URL::base().'application/'.$accom['document']; ?> width="850" height="500">
</div>