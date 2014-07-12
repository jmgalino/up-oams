<ol class="breadcrumb">
	<li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('admin/users'); ?>>User Accounts</a></li>

	<?php if ($user_details->user_type == 'faculty'): ?>	
	<li><a href=<?php echo url::site('admin/view/'.$user_details->user_ID);?>> View <?php echo $user_details->faculty_code; ?>'s Profile</a></li>
	<li class="active">Update <?php echo $user_details->faculty_code; ?>'s Profile</li>

	<?php else: ?>
	<li><a href=<?php echo url::site('admin/users'); ?>>User Accounts</a></li>
	<li><a href=<?php echo url::site('admin/view/'.$user_details->user_ID);?>> View <?php echo $user_details->first_name; ?>'s Profile</a></li>
	<li class="active">Update <?php echo $user_details->first_name; ?>'s Profile</li>

	<?php endif;?>
</ol>

<div class="container">
	<?php print form::open('admin/update_profile/'.$user_details->user_ID, array('class'=>'form-horizontal', 'role'=>'form'));?>
	<?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-default pull-right', 'value'=>'Save Changes')); ?>
	<br><br>
	<!-- <a class="btn btn-default pull-right" role="button" href="">Upload Photo</a>
	<br><br> -->

	<?php
	$view = new View('admin/profile/form/_edit/fragment');
	$view->bind('user_details', $user_details);
	$view->bind('programs', $programs);
	$view->render(TRUE);
	?>
</div>
