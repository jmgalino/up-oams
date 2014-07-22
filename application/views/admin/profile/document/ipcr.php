<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/users'); ?>>User Accounts</a></li>
  <li><a href=<?php echo url::site('admin/view/'.$user->user_ID); ?>><?php echo $user->faculty_code; ?>'s Profile</a></li>
  <li class="active">View <?php echo $label; ?></li>
</ol>

<?php if(isset($filepath)): ?>
<div class="pdf-viewer text-center">
	<embed src="../../../<?php echo $filepath; ?>" width="850" height="500">
</div>

<?php else: ?>
<div class="alert alert-danger alert-dismissable">
	<p class="text-center">
		File is missing.
	</p>
</div>
<?php endif; ?>