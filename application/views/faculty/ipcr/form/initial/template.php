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
<?php elseif ($targets): ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($session->get('identifier') == 'faculty') ? 'save' : 'submit'); ?></strong>.
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

			// echo '<p>I, <span style="text-decoration: underline;">', $session->get('fullname'), '</span>',
			// 	 ' of the <span style="text-decoration: underline;">', $department, '</span>',
			// 	' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
			// 	'<span style="text-decoration: underline;">', date_format(date_create($session->get('opcr_details')['period_from']), 'F Y'), '</span> to ',
			// 	'<span style="text-decoration: underline;">', date_format(date_create($session->get('opcr_details')['period_to']), 'F Y'), '</span>.</p>';
			// echo '<br>';
			
			// echo '<table style="font-size:14px" width="200" align="right">
			// 	<tbody>
			// 		<tr><td class="text-center" style="border-bottom:1pt solid black">', $session->get('fullname'), '</td></tr>
			// 		<tr><td class="text-center">','Unit Head, ', $title, '</td></tr>
			// 		<tr><td class="text-center">Date: ', date('F d, Y'), '</td></tr>
			// 	</tbody>
			// </table><br><br><br><br>';

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
			<?php if ($targets): ?>
			<hr>
			<li>
				<a href=<?php echo URL::site('faculty/ipcr/submit/'.$ipcr_details['ipcr_ID']); ?>>
				<?php echo (($session->get('identifier') == 'dean') ? 'Save' : 'Submit'); ?>
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
