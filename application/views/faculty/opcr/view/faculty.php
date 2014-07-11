<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/opcr'); ?>>Office Performance Commitment and Review</a></li>
	<li class="active">View <?php echo $label; ?></li>
</ol>

<?php if(isset($filepath)): ?>
<div class="pdf-viewer text-center">
	<embed src="../../../<?php echo $filepath; ?>" width="1100" height="500">';
</div>

<?php else: ?>
	<div class="alert alert-danger">
		<p class="text-center">
			<?php if ($this->site->session->get('identifier') == 'dean'): ?>
			You didn't save this report, ergo this report is not available.
			<?php else: ?>
			You didn't submit this report, ergo this report is not available.
			<?php endif; ?>
		</p>
	</div>
<?php endif; ?>