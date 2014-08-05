<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">User Profiles</li>
</ol>

<?php if ($reset): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully reset.
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Profile was successfully deleted.
	</p>
</div>
<?php endif; ?>

<?php
// Add user form
$user = NULL;
echo View::factory('admin/profile/form/template')
	->bind('user', $user)
	->bind('programs', $programs);
?>

<h3>
	List of User Profiles
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_profile">Create</button>
</h3>
<br>

<!-- Table -->
<div class="table-responsive">
	<table class="table table-hover" id="user_table">
		<thead>
			<tr>
				<th>Employee Code</th>
				<th>Name</th>
				<th>User Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
	<?php
	foreach ($users as $user)
	{
		echo '<tr>';
		echo '<td>', $user['employee_code'], '</td>';
		echo '<td>', $user['last_name'], ', ', $user['first_name'], ' ', $user['middle_initial'], '.</td>';
		echo '<td>', $user['user_type'], '</td>';
		
		if ($user['employee_code'] !== $employee_code)
		{
			echo '<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href='.URL::site('admin/profile/view/'.$user['employee_code']).'>
						<span class="glyphicon glyphicon-user"></span> Show Profile</a>
					</li>
					<li>
						<a onclick="return confirm(\'Are you sure you want to reset the password?\');" href='.URL::site('admin/profile/reset/'.$user['employee_code']).'>
						<span class="glyphicon glyphicon-repeat"></span> Reset Password</a>
					</li>
					<li>
						<a onclick="return confirm(\'Are you sure you want to delete this account?\');" href='.URL::site('admin/profile/delete/'.$user['employee_code']).'>
						<span class="glyphicon glyphicon-trash"></span> Delete Profile</a>
					</li>
				</ul>
			</td>';
		}
		else
			echo '<td>Disabled</td>';

		echo '</tr>';
	}?>
		</tbody>
	</table>
</div>
