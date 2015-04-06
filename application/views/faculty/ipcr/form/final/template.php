<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php elseif ($warning): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $warning; ?>
	</p>
</div>
<?php elseif ($flag == 0): ?>
<div class="alert alert-reminder alert-dismissable" id="flag">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($identifier == 'faculty') ? 'submit' : 'save'); ?></strong>.
	</p>
</div>
<?php endif; ?>

<?php
// Rate target
echo View::factory('faculty/ipcr/form/modals/rate')
	->bind('ipcr_ID', $ipcr_ID)
	->bind('categories', $categories)
	->bind('targets', $targets);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<?php
			echo '<h1 class="text-center">Individual Performance Commitment and Review (IPCR)</h1>';
			echo '<br>';

			echo View::factory('faculty/ipcr/form/final/fragment')
				->bind('categories', $categories)
				->bind('targets', $targets)
				->bind('outputs', $outputs);

			echo 'Legend: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
				'1 - <em>Quantity</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
				'2 - <em>Efficiency</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
				'3 - <em>Timeliness</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
				'4 - <em>Average</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a data-toggle="modal" data-target="#modal_rate" role="button" href="">Rate Target</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<li>
				<a href="<?php echo URL::site('faculty/ipcr/preview/'.$ipcr_ID); ?>">Preview</a>
			</li>
			<li <?php if ($flag > 0) echo 'class="disabled"' ?>>
				<a href=<?php echo URL::site('faculty/ipcr/submit/'.$ipcr_ID); ?>>
					<?php echo (($identifier == 'faculty') ? 'Submit' : 'Save'); ?>
				</a>
			</li>
			<li style="padding: 10px 15px;">
				<span class="help-block">
					Note: You have to complete the ratings for all targets to enable the <?php echo (($identifier == 'faculty') ? 'submit' : 'save'); ?> function.
				</span>
			</li>
		</ul>
	</div>
</div>
