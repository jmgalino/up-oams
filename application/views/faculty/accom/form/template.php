<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/accom'); ?>>Accomplishment Report</a></li>
	<?php if (isset($label)): ?> <li class="active">View <?php echo $label; ?></li>
	<?php else: ?> <li class="active">New</li>
	<? endif; ?>
</ol>

<?php if ($this->site->session->get('position') !== 'dean'): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to submit before leaving the page.
	</p>
</div>
<?php endif; ?>

<div class="col-sm-9">
	<pre class="center-block">
		<?php
			$month = DateTime::createFromFormat('n', $this->site->session->get('accom_details')['month']);
			$month_year = $month->format('F').' '.$this->site->session->get('accom_details')['year'];

			echo '<h2 class="text-center">Accomplishment Report</h2>';
			echo '<h4 class="text-center">', $month_year, '</h4>';
			echo '<br>';
			echo '<h4>', $this->site->session->get('fullname'), '</h4>';
			echo '<h6>', $this->site->session->get('rank'), '</h6>';
			echo '<br>';

			echo View::factory('faculty/ar/form/_fragments/publication');
			echo View::factory('faculty/ar/form/_fragments/award');
			echo View::factory('faculty/ar/form/_fragments/research');
			echo View::factory('faculty/ar/form/_fragments/paper');
			echo View::factory('faculty/ar/form/_fragments/creative');
			echo View::factory('faculty/ar/form/_fragments/participation');
			echo View::factory('faculty/ar/form/_fragments/material');
			echo View::factory('faculty/ar/form/_fragments/other');
		?>
	</pre>
</div>

<div class="col-sm-3">
	<div class="bs-sidebar hidden-print affix" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li><a data-toggle="modal" data-target="#modal_ar" role="button" href="">Add Accomplishment</a></li>
			<hr>
			<?php if ($this->site->session->get('position') !== 'dean'): ?>
			<li><a href=<?php echo url::site('accom/submit'); ?>>Submit</a></li>
			<?php else: ?>
			<li><a href=<?php echo url::site('accom/submit'); ?>>Save</a></li>
			<?php endif; ?>
		</ul>
	</div>
</div>

<?php echo View::factory('faculty/ar/form/_modals/accom')->render(); ?> <!-- Choose accom -->
