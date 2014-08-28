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

<!-- Actions -->
<div class="btn-toolbar pull-right" role="toolbar">
	<button type="button" class="btn btn-default" id="refine_list">Refine List</button>
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_profile">Create</button>
</div>
<br><br>

<div class="row">
	<div class="col-sm-3" id="refine_form" role="complementary" style="display:none;">
		<div class="panel-group" id="accordion">

			<!-- Filter -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#user_filter">Filter</a>
					</h4>
				</div>

				<div class="panel-collapse collapse in" id="user_filter">
					<div class="panel-body">
						<?php print form::open('admin/profile', array('class'=>'form-horizontal', 'role'=>'form'));?>
						<div class="form-group" style="margin-left:0;margin-right:0;">
				          <label for="user_type">User Type</label>
				          <select class="form-control" name="user_type" id="user_type">
							  <option>All</option>
							  <option>Admin</option>
							  <option>Faculty</option>
							</select>
						</div>

						<div class="form-group" style="margin-left:0;margin-right:0;">
				          <label for="faculty_group">Faculty Group</label>
				          <select class="form-control" name="user_type" id="faculty_group">	
							<?php
							// foreach ($colleges as $college) {
							// 	echo '<option>
							// 		<a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#">',
							// 			$college['college'],
							// 			'<span class="right-caret right"></span>
							// 		</a>
							// 		</option>';
							// }
							?>
							</select>
						</div>
						
						<?php print form::submit(NULL, 'Apply Filter', array('type'=>'submit', 'class'=>'btn btn-default pull-right'));
						print form::close();?>
					</div>
				</div>
			</div>

			<!-- Sort -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#user_sort">Sort</a>
					</h4>
				</div>

				<div class="panel-collapse collapse in" id="user_sort">
					<div class="panel-body">
						<?php print form::open('faculty/accom/#', array('class'=>'form-horizontal', 'role'=>'form'));?>
						<div class="form-group" style="margin-left:0;margin-right:0;">
							<label for="sort_option">Sort By</label>
							<select class="form-control" name="sort_option" id="sort_option">
							  <option>Employee Code (A-Z)</option>
							  <option>Employee Code (Z-A)</option>
							  <option>Last Name (A-Z)</option>
							  <option>Last Name (Z-A)</option>
							</select>	
						</div>
						<?php print form::submit(NULL, 'Apply Filter', array('type'=>'submit', 'class'=>'btn btn-default pull-right', 'disabled' => 'disabled'));
						print form::close();?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Table -->
	<div class="col-md-12" id="display_table" role="main">
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
	</div>

</div>

<?php
// Add/Edit Form
echo View::factory('admin/profile/form/template')
	->bind('programs', $programs);
?>
