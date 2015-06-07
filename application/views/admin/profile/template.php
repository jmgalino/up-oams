<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/profile'); ?>>User Profiles</a></li>
  <li class="active">View <?php echo $user['first_name']; ?>'s Profile</li>
</ol>

<div class="btn-group pull-right">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		Actions <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li>
			<a data-toggle="modal" data-target="#modal_photo" role="button" href="">
			<span class="glyphicon glyphicon-picture"></span> Upload Photo</a>
		</li>
		<li>
			<a id="updateProfile" key="<?php echo $user['user_ID']; ?>" data-toggle="modal" data-target="#modal_profile" role="button" href="" url="<?php echo URL::site('admin/profile/update/'.$user['user_ID']); ?>" ajax-url="<?php echo URL::site('extras/ajax/user_details'); ?>" validate-url="<?php echo URL::site('extras/ajax/unique/edit_user'); ?>">
			<span class="glyphicon glyphicon-pencil"></span> Update Profile</a>
		</li>
		<li>
			<a id="resetPassword" href=<?php echo URL::site('admin/profile/reset/'.$user['user_ID']); ?>>
			<span class="glyphicon glyphicon-repeat"></span> Reset Password</a>
		</li>
		<li>
			<a id="deleteAccount" href=<?php echo URL::site('admin/profile/delete/'.$user['user_ID']); ?>>
			<span class="glyphicon glyphicon-trash"></span> Delete Profile</a>
		</li>
	</ul>
</div>
<br><br>

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
		Something went wrong. Please try again.
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
	->bind('user', $user)
	->bind('education', $education)
	->bind('accom_reports', $accom_reports)
	->bind('accom_pub', $accom_pub)
	->bind('accom_awd', $accom_awd)
	->bind('accom_rch', $accom_rch)
	->bind('accom_ppr', $accom_ppr)
	->bind('accom_ctv', $accom_ctv)
	->bind('accom_par', $accom_par)
	->bind('accom_mat', $accom_mat)
	->bind('accom_oth', $accom_oth);
?>