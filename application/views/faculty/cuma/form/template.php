<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><a href="<?php echo URL::site('faculty/cuma'); ?>">CU Management Assessment Forms</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<!-- Alerts -->
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
<?php else: ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong>publish</strong>.
	</p>
</div>
<?php endif; ?>

<!-- Diplay Row -->
<div class="row">
	<div class="col-sm-9 form">
		<pre class="center-block pre-scrollable form">
			<?php
				echo View::factory('faculty/cuma/form/part_'.$cuma_details['current']);
			?>
		</pre>
	</div>
	<div class="col-sm-9 publish" style="display:none"></div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<div class="progress">
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo number_format((($cuma_details['current']-1)/8)*100, 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo number_format((($cuma_details['current']-1)/8)*100, 1); ?>%;">
						<?php echo number_format((($cuma_details['current']-1)/8)*100, 1); ?>%
					</div>
				</div>
			</li>
			<li>
				<input id="inputData" cuma-id="<?php echo $cuma_details['cuma_ID']; ?>" current="<?php echo $cuma_details['current']; ?>" ajax-url="<?php echo URL::site('ajax/update_current') ?>" hidden>
				<nav>
				  <ul class="pager">
				    <li class="<?php echo ($cuma_details['current'] == 1 ? 'previous disabled' : 'previous'); ?>">
				    	<a id="prev" href="#">
				    		<span aria-hidden="true">&larr;</span> Previous
				    	</a>
				    </li>
				    <li class="next">
				    	<a id="next" final="<?php echo URL::base().'files/document_cuma/'; ?>" href="#">
				    		Next <span aria-hidden="true">&rarr;</span>
				    	</a>
				    </li>
				  </ul>
				</nav>
			</li>
			<hr class="publish" style="border-top: dotted 1px; display:none">
			<li class="publish" style="display:none">
				<a href="<?php echo URL::site('faculty/cuma/publish/'.$cuma_details['cuma_ID']); ?>">Publish</a>
			</li>
		</ul>
	</div>
</div>
