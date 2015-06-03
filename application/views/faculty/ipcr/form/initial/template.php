<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $success; ?>
	</p>
</div>
<?php elseif ($error OR $success === FALSE): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo ($error ? $error : 'Something went wrong. Please try again.'); ?>
	</p>
</div>
<?php elseif ($warning): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $warning; ?>
	</p>
</div>
<?php elseif ($targets): ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($session->get('identifier') == 'faculty') ? 'submit' : 'save'); ?></strong>.
	</p>
</div>
<?php endif; ?>

<?php
// Add output
echo View::factory('faculty/ipcr/form/modals/output')
	->bind('ipcr_details', $ipcr_details)
	->bind('categories', $categories);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<?php
			echo '<h1 class="text-center">Individual Performance Commitment and Review (IPCR)</h1>';
			echo '<br>';

			echo View::factory('faculty/ipcr/form/initial/fragment')
				->bind('categories', $categories)
				->bind('targets', $targets)
				->bind('outputs', $outputs);
		?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a data-toggle="modal" data-target="#modal_output" role="button" href="">Add Output</a>
			</li>
			<hr style="border-top: dotted 1px;">
			<li>
				<a href="<?php echo URL::site('faculty/ipcr/preview/'.$ipcr_details['ipcr_ID']); ?>">Preview</a>
			</li>
			<?php if ($targets): ?>
			<li>
				<a href="<?php echo URL::site('faculty/ipcr/submit/'.$ipcr_details['ipcr_ID']); ?>">
				<?php echo (($session->get('identifier') == 'faculty') ? 'Submit' : 'Save'); ?>
				</a>
			</li>
			<li style="padding: 10px 15px;">
				<span class="help-block">
					Note: Double click values to edit; press save to keep the changes;
					 and press the esc button to cancel.
				</span>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
