<?php
function redate($start, $end)
{
	$duration = Request::factory('extras/reconstructor/redate')
		->post(array(
			'start' => $start,
			'end' => $end))
		->execute()
		->body;

	return $duration;
}
?>

<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/accom'); ?>>Accomplishment Report</a></li>
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
<?php elseif ($accom): ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($session->get('position') == 'dean') ? 'save' : 'submit'); ?></strong>.
	</p>
</div>
<?php endif; ?>

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
				echo '<br>';
				$session->set('attachment', 0);

				echo View::factory('faculty/accom/form/fragments/publication')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/award')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/research')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/paper')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/creative')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/participation')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/material')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/other')->bind('session', $session);
			?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a id="addAccomplishment" data-toggle="modal" data-target="#modal_accom" role="button" href="">Add Accomplishment</a>
			</li>
			<?php if ($accom): ?>
			<hr style="border-top: dotted 1px;">
			<li> 
				<a href=<?php echo URL::site('faculty/accom/submit/'.$session->get('accom_details')['accom_ID']); ?>>
				<?php echo (($session->get('identifier') == 'faculty') ? 'Submit' : 'Save'); ?>
				</a>
				<?php if ($session->get('attachment') != 0)
					echo '<span class="help-block" style="padding: 10px 15px;">Tip: Click on the paper clips to view attachments.</span>';
				?>
			</li>
			<?php endif; ?>
			<?php if ($session->get('accom_details')['status'] == 'Returned'): ?>
			<br><br><br>
			<li style="padding:10px 15px; border: 1px dashed #003619"><br>
				<dl style="padding:15px;">
					<dt>Remarks</dt>
					<dd><?php echo $session->get('accom_details')['remarks']; ?></dd>
				</dl>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
