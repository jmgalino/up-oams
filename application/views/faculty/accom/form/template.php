<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/accom'); ?>>Accomplishment Report</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<?php if ($session->get('position') !== 'dean'): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to submit before leaving the page.
	</p>
</div>
<?php endif; ?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block">
			<?php
				echo '<h2 class="text-center">Accomplishment Report</h2>';
				echo '<h4 class="text-center">', $label, '</h4>';
				echo '<br>';
				echo '<h4>', $session->get('fullname'), '</h4>';
				echo '<h6>', $session->get('rank'), '</h6>';
				echo '<br>';

				// echo View::factory('faculty/accom/form/fragments/publication');
				// echo View::factory('faculty/accom/form/fragments/award');
				// echo View::factory('faculty/accom/form/fragments/research');
				// echo View::factory('faculty/accom/form/fragments/paper');
				// echo View::factory('faculty/accom/form/fragments/creative');
				// echo View::factory('faculty/accom/form/fragments/participation');
				// echo View::factory('faculty/accom/form/fragments/material');
				// echo View::factory('faculty/accom/form/fragments/other');
			?>
		</pre>
	</div>

	<div class="col-sm-3">
		<div class="bs-sidebar hidden-print affix" role="complementary">
			<ul class="nav nav-pills nav-stacked">
				<li><a data-toggle="modal" data-target="#modal_accom" role="button" href="">Add Accomplishment</a></li>
				<hr>
				<?php if ($session->get('position') !== 'dean'): ?>
				<li><a href=<?php echo url::site('accom/submit'); ?>>Submit</a></li>
				<?php else: ?>
				<li><a href=<?php echo url::site('accom/submit'); ?>>Save</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>

<?php
// Choose accomplishment type
echo View::factory('faculty/accom/form/modals/accom_type')
	->bind('session', $session);
?>
