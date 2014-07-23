<ol class="breadcrumb">
  <li><a href=<?php echo url::site($this->site->session->get('user_type').'/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site($this->site->session->get('user_type').'/profile'); ?>>My Profile</a></li>
  <li class="active">Update Profile</li>
</ol>

<h3>
	Update Profile
	<div class="btn-toolbar pull-right" role="toolbar">
	  <div class="btn-group">
	  	<?php print form::open($this->site->session->get('user_type').'/update', array('class'=>'form-horizontal', 'role'=>'form'));?>
		<?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-default pull-right', 'value'=>'Save Changes')); ?>
	  </div>
	  <!-- <div class="btn-group">
	  	<a class="btn btn-default pull-right" role="button" href="">Upload Photo</a>
	  </div> -->
	</div>
</h3>
<br>

<div class="container">
	<?php
	$view = new View('profile/profile/form/_edit/fragment');
	$view->bind('user', $user);
	$view->render(TRUE);
	?>
</div>