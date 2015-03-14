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
<?php elseif ($outputs): ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($session->get('identifier') == 'chair') ? 'save' : 'publish'); //dean ?></strong>.
	</p>
</div>
<?php endif; ?>

<?php
// Add output
echo View::factory('faculty/opcr/form/modals/output')->bind('categories', $categories);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<?php
			echo '<h1 class="text-center">Office Performance Commitment and Review (OPCR)</h1>';
			echo '<h4 class="text-center">(Template for Faculty)</h4>';
			echo '<br>';

			echo View::factory('faculty/opcr/form/initial/fragment')
				->bind('outputs', $outputs)
				->bind('categories', $categories);
		?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a data-toggle="modal" data-target="#modal_output" role="button" href="">Add Output</a>
			</li>
			<?php if ($outputs): ?>
			<hr>
			<li> 
				<a href=<?php echo URL::site('faculty/opcr/publish/'.$session->get('opcr_details')['opcr_ID']); ?>>
				<?php echo (($session->get('identifier') == 'chair') ? 'Save' : 'Publish'); // dean ?>
				</a>
			</li>
			<li>
				<span class="help-block" style="padding: 10px 15px;">
					Note: Double click values to edit; press save to keep the changes;
					 and press the esc button to cancel.</span>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
