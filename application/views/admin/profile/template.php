<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/profile'); ?>>User Profiles</a></li>
  <li class="active">View <?php echo $user['first_name']; ?>'s Profile</li>
</ol>

<div class="btn-group pull-right">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		Action <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li>
			<a data-toggle="modal" data-target="#modal_photo" role="button" href="">
			<span class="glyphicon glyphicon-picture"></span> Upload Photo</a>
		</li>
		<li>
			<a id="updateProfile" key="<?php echo $user['user_ID']; ?>" data-toggle="modal" data-target="#modal_profile" role="button" href="" url="<?php echo URL::site('admin/profile/update/'.$user['employee_code']); ?>">
			<span class="glyphicon glyphicon-pencil"></span> Update Profile</a>
		</li>
		<li>
			<a id="resetPassword" href=<?php echo URL::site('admin/profile/reset/'.$user['employee_code']); ?>>
			<span class="glyphicon glyphicon-repeat"></span> Reset Password</a>
		</li>
		<li>
			<a id="deleteAccount" href=<?php echo URL::site('admin/profile/delete/'.$user['employee_code']); ?>>
			<span class="glyphicon glyphicon-trash"></span> Delete Profile</a>
		</li>
	</ul>
</div>
<br><br>

<?php if ($upload): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Photo was successfully uploaded.
	</p>
</div>
<?php elseif ($reset): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully reset.
	</p>
</div>
<?php elseif ($update): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Profile was successfully updated.
	</p>
</div>
<?php elseif ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

<?php
// Upload photo form
echo View::factory('admin/profile/form/photo')
	->bind('user_ID', $user['user_ID']);

// Edit user form
echo View::factory('admin/profile/form/template')
	->bind('programs', $programs);
?>

<?php 
echo View::factory('admin/profile/fragment')
	->bind('user', $user);
?>