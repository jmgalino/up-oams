<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/profile'); ?>>User Profiles</a></li>
  <li class="active">View <?php echo $user['first_name']; ?>'s Profile</li>
</ol>

<div class="btn-group pull-right">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		Action <span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li>
			<a data-toggle="modal" data-target="#modal_photo" role="button" href="">
			<span class="glyphicon glyphicon-picture"></span> Upload Photo
			</a>
		</li>
		<li>
			<a data-toggle="modal" data-target="#modal_profile" role="button" href="">
			<span class="glyphicon glyphicon-pencil"></span> Update Profile
			</a>
		</li>
		<li>
			<a onclick="return confirm(\'Are you sure you want to reset the password?\');" href=<?php echo URL::site('admin/profile/reset/'.$user['employee_code']); ?>>
			<span class="glyphicon glyphicon-repeat"></span> Reset Password
			</a>
		</li>
		<li>
			<a onclick="return confirm(\'Are you sure you want to delete this account?\');" href=<?php echo URL::site('admin/profile/delete/'.$user['employee_code']); ?>>
			<span class="glyphicon glyphicon-trash"></span> Delete Profile
			</a>
		</li>
	</ul>
</div>
<br><br>

	<?php 
	echo View::factory('admin/profile/fragment')
		->bind('user', $user)
		->bind('accom_rows', $accom_rows)
		->bind('ipcr_rows', $ipcr_rows)
		->bind('opcr_rows', $opcr_rows)
		->bind('cuma_rows', $cuma_rows)
		->bind('pub_rows', $pub_rows)
		->bind('rch_rows', $rch_rows);
	?>

<?php
echo View::factory('admin/profile/form/photo')
	->bind('user', $user);

echo View::factory('admin/profile/form/template')
	->bind('user', $user)
	->bind('programs', $programs); ?>