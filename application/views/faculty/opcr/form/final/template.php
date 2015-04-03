<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/opcr'); ?>>Office Performance Commitment and Review</a></li>
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
<?php elseif (!$flag): ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong>submit</strong>.
	</p>
</div>
<?php endif; ?>

<?php
// Rate output
echo View::factory('faculty/opcr/form/modals/rate')
	->bind('opcr_ID', $opcr_ID)
	->bind('categories', $categories);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<?php
			echo '<h1 class="text-center">Office Performance Commitment and Review (OPCR)</h1>';
			echo '<h4 class="text-center">(Template for Faculty)</h4>';
			echo '<br>';

			echo View::factory('faculty/opcr/form/final/fragment')
				->bind('categories', $categories)
				->bind('outputs', $outputs)
				->bind('ipcr_forms', $ipcr_forms)
				->bind('targets', $targets)
				->bind('users', $users);
		?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a data-toggle="modal" data-target="#modal_rate" role="button" href="">Rate Output</a>
			</li>
			<?php if ($outputs): ?>
			<hr style="border-top: dotted 1px;">
			<li <?php if ($flag) echo 'class="disabled"' ?>> 
				<a href=<?php echo URL::site('faculty/opcr/publish/'.$opcr_ID); ?>>
					<?php echo (($identifier == 'chair') ? 'Submit' : 'Save'); ?>
				</a>
			</li>
			<li>
				<span class="help-block" style="padding: 10px 15px;">
					Note: You have to rate all outputs to enable <?php echo (($identifier == 'chair') ? 'submit' : 'save'); ?> function.
				</span>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
