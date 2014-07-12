<ol class="breadcrumb">
	<li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
	<li class="active">User Profiles</li>
</ol>

<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_init" role="button" href="">Create</a>
<br><br>

<?php if ($reset == 1): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully reset.
	</p>
</div>
<?php endif; ?>

<?php
if (count($users)>0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th rowspan="2">Employee Code</th>
					<th rowspan="2">Name</th>
					<th rowspan="2">User Type</th>
					<th colspan="3">Action</th>
				</tr>
			</thead>
			<tbody>';

	foreach ($users as $user)
	{
		echo '<tr>';
		echo '<td><a href='.url::site('admin/view/'.$user['user_ID']).'>'.$user['employee_code'].'</a></td>';
		echo '<td>'.$user['last_name'].', '.$user['first_name'].' '.$user['middle_initial'].'.</td>';
		
		if ($user['user_type'] == 'admin')
			echo '<td>Admin</td>';
		else
			echo '<td>Faculty</td>';
		
		echo '<td title="Edit Profile">
				<a href='.url::site('admin/edit_profile/'.$user['user_ID']).'>
				<span class="glyphicon glyphicon-pencil"></span></a>
			</td>';
		echo '<td title="Reset Password">
				<a onclick="return confirm(\'Are you sure you want to reset the password?\');" href='.url::site('admin/reset/'.$user['user_ID']).'>
				<span class="glyphicon glyphicon-repeat"></span></a>
			</td>';
		echo '<td title="Delete Profile">
				<a onclick="return confirm(\'Are you sure you want to delete this account?\');" href='.url::site('admin/delete/'.$user['user_ID']).'>
				<span class="glyphicon glyphicon-trash"></span></a>
			</td>';
		echo '</tr>';
	}
	echo '</tbody></table></div>';
}
else {
	echo '<div class="alert alert-danger">
	<p class="text-center">
	The list is empty.
	</p>
	</div>';
}

echo View::factory('admin/user/form/add/template')->bind('programs', $programs);

?>
