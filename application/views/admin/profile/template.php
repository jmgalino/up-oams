<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/users'); ?>>User Accounts</a></li>
  <li class="active">View <?php echo $user->faculty_code; ?>'s Profile</li>
</ol>

<div class="container">
	<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('admin/edit_profile/'.$user->user_ID); ?>>Update Profile</a>
	<br><br>
	<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('admin/reset/'.$user->user_ID); ?>>Reset Password</a>
	<br><br>

	<?php
	$view = new View('admin/profile/fragment');
	$view->bind('user', $user);
	$view->bind('ar_rows', $ar_rows);
	$view->bind('ipcr_rows', $ipcr_rows);
	$view->bind('opcr_rows', $opcr_rows);
	$view->bind('cuma_rows', $cuma_rows);
	$view->bind('pub_rows', $pub_rows);
	$view->bind('rch_rows', $rch_rows);

	$view->render(TRUE);
	?>
</div>