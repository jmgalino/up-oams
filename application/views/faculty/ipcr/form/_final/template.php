<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong>submit</strong>.
	</p>
</div>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<?php
			echo '<h1 class="text-center">Office Performance Commitment and Review (OPCR)</h1>';
			echo '<br>';

			echo '<p style="text-indent: 20px;">I, <span style="text-decoration: underline;">', $this->session->get('fullname'), '</span>',
				 ' of the <span style="text-decoration: underline;">', $department['department'], '</span>',
				' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
				'<span style="text-decoration: underline;">', $period_from->format('F Y'), '</span> to ',
				'<span style="text-decoration: underline;">', $period_to->format('F Y'), '</span>.</p>';
			echo '<br>';

			echo '<table width="200" align="right">
				<tbody>
					<tr><td class="text-center" style="border-bottom:1pt solid black">', $this->session->get('fullname'), '</td></tr>
					<tr><td class="text-center">Unit Head, ', $department['short'], '</td></tr>
					<tr><td class="text-center">Date: ', date_format(date_create($opcr_details['date_published']), 'F d, Y'), '</td></tr>
				</tbody>
			</table><br>';

			echo View::factory('faculty/opcr/form/final/fragment')
				->bind('outputs', $outputs)
				->bind('categories', $categories);
		?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a data-toggle="modal" data-target="#" role="button" href="">Submit</a>
			</li>
			<?php if ($outputs): ?>
			<hr>
			<li> 
				<a href=<?php echo URL::site('faculty/opcr/publish/'.$session->get('opcr_details')['opcr_ID']); ?>>
				<?php echo (($session->get('position') == 'dean') ? 'Save' : 'Publish'); ?>
				</a>
			</li>
			<li>
				<span class="help-block" style="padding: 10px 15px;">Note: Double click values to edit; press save to keep the changes; and pres the esc button to cancel.</span>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
