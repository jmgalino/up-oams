<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">User Profiles</li>
</ol>

<h3>
	List of User Profiles
	<button type="button" class="btn btn-default pull-right" id="newProfile" data-toggle="modal" data-target="#modal_profile" url="<?php echo URL::site('admin/profile/new'); ?>">Create</button>
</h3>
<br>

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
// Add user form
echo View::factory('admin/profile/form/template')
	->bind('programs', $programs);
?>

<!-- Table -->
<table class="table table-hover" id="user_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Employee Code</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>User Type</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
<?php
foreach ($users as $user)
{
	echo '<tr>';
	echo '<td>', $user['employee_code'], '</td>';
	echo '<td>', $user['last_name'], '</td>';
	echo '<td>', $user['first_name'], '</td>';
	echo '<td>', $user['middle_name'], '</td>';
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
					<a id="resetPassword" href='.URL::site('admin/profile/reset/'.$user['user_ID']).'>
					<span class="glyphicon glyphicon-repeat"></span> Reset Password</a>
				</li>
				<li>
					<a id="deleteAccount" href='.URL::site('admin/profile/delete/'.$user['user_ID']).'>
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
