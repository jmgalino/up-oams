<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">User Profiles</li>
</ol>

<?php if ((isset($reset) AND $reset == 1)): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully reset.
	</p>
</div>
<?php elseif ((isset($delete) AND $delete == 1)): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Profile was successfully deleted.
	</p>
</div>
<?php endif; ?>

<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_profile" role="button" href="">Create</a>
<br><br>

<div class="row">
	<div class="col-sm-3" role="complementary">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#faculty_group">
							Filter
						</a>
					</h4>
				</div>
				<div id="faculty_group" class="panel-collapse collapse in">
					<div class="panel-body">

						<?php print form::open('admin/profile', array('class'=>'form-horizontal', 'role'=>'form'));?>
						Comming soon.<br><br>
						<?php print form::submit(NULL, 'Apply Filter', array('type'=>'submit', 'class'=>'btn btn-default pull-right', 'disabled' => 'disabled'));
						print form::close();?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-9" role="main">
		<?php
			if (count($users)>0)
			{
				echo '<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Employee Code</th>
								<th>Name</th>
								<th>User Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>';

				foreach ($users as $user)
				{
					echo '<tr>';
					echo '<td>'.$user['employee_code'].'</a></td>';
					echo '<td>'.$user['last_name'].', '.$user['first_name'].' '.$user['middle_initial'].'.</td>';
					echo '<td>', $user['user_type'], '</td>';
					
					if ($user['employee_code'] !== $emp_code)
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
			?>


	</div>
</div>

<?php echo View::factory('admin/profile/form/template')->bind('programs', $programs); ?>
