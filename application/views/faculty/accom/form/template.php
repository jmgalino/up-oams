<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/accom'); ?>>Accomplishment Report</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($session->get('position') == 'dean') ? 'save' : 'submit'); ?></strong>.
	</p>
</div>

<?php
// Choose accomplishment type
echo View::factory('faculty/accom/form/modals/accom_type')->bind('session', $session);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block">
			<?php
				echo '<h1 class="text-center">Accomplishment Report</h1>';
				echo '<h2 class="text-center">', $label, '</h2><br>';
				echo '<h2>', $session->get('fullname'), '</h2>';
				echo '<h3>', $session->get('rank'), '</h3>';
				echo '<br>';

				echo View::factory('faculty/accom/form/fragments/publication')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/award')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/research')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/paper')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/creative')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/participation')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/material')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/other')->bind('session', $session);

				echo '<br><br><br>
				<table width="200" align="right">
					<tbody>
						<tr><td class="text-center" style="border-bottom:1pt solid black"></td></tr>
						<tr><td class="text-center">', $session->get('fullname'), '</td></tr>
					</tbody>
				</table>';
			?>
		</pre>
	</div>

	<div class="col-sm-3">
		<div class="bs-sidebar hidden-print affix" role="complementary">
			<ul class="nav nav-pills nav-stacked">
				<li>
					<a data-toggle="modal" data-target="#modal_accom" role="button" href="">Add Accomplishment</a>
				</li>
				<?php if ($accom): ?>
				<hr>
				<li> 
					<a href=<?php echo URL::site('faculty/accom/submit/'.$session->get('accom_details')['accom_ID']); ?>>
					<?php echo (($session->get('position') == 'dean') ? 'Save' : 'Submit'); ?>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
