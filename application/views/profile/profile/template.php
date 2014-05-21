<ol class="breadcrumb">
  <li><a href=<?php echo url::site($this->site->session->get('user_type').'/index'); ?>>Home</a></li>
  <li class="active">My Profile</li>
</ol>

<h3>
	My Profile
	<div class="btn-toolbar pull-right" role="toolbar">
	  <div class="btn-group">
		<a class="btn btn-default pull-right" role="button" href=<?php echo url::site($this->site->session->get('user_type').'/edit/'); ?>>Update Profile</a>
	  </div>
	</div>
</h3>
<br>

<div class="container">
	<?php
	$view = new View('profile/profile/fragment');
	$view->bind('user', $user);
	$view->bind('ar_rows', $ar_rows);
	$view->bind('ipcr_rows', $ipcr_rows);
	$view->bind('opcr_rows', $opcr_rows);
	$view->bind('cuma_rows', $cuma_rows);
	$view->bind('pub_rows', $pub);
	$view->bind('rch_rows', $rch);
	$view->render(TRUE);
	?>
</div>