<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">My Profile</li>
</ol>

<h3>My Profile</h3>
<br>

<?php if ($update): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Profile was successfully updated.
	</p>
</div>
<?php endif; ?>

<div class="row">
	<div class="col-xs-6 col-md-4">
		<img src="<?php echo ($user['pic'] ? URL::base().'files/upload_photos/'.$user['pic'] : URL::base().'application/assets/img/default.jpg'); ?>" class="img-responsive">
		<br>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">
		<div class="row details">
			<div class="col-xs-6"><strong>Employee Code</strong></div>
			<div class="col-xs-6"><?php echo $user['employee_code']; ?></div>
		</div>
		<br>
		
		<div class="row details">
			<div class="col-xs-6"><strong>Title</strong></div>
			<div class="col-xs-6"><?php echo ($user['title'] ? $user['title'] : '-'); ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>First Name</strong></div>
			<div class="col-xs-6"><?php echo $user['first_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Middle Initial</strong></div>
			<div class="col-xs-6"><?php echo $user['middle_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Last Name</strong></div>
			<div class="col-xs-6"><?php echo $user['last_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Suffix</strong></div>
			<div class="col-xs-6"><?php echo ($user['suffix'] ? $user['suffix'] : '-'); ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Birthday</strong></div>
			<div class="col-xs-6"><?php echo date('F d, Y', strtotime($user['birthday'])); ?></div>
		</div>
		<br>

		<div class="row details">
			<div class="col-xs-6"><strong>Average SATE Scores</strong></div>
			<div class="col-xs-6" style="display:inline; vertical-align:bottom">
				<span class="editSate" value="<?php echo ($user['average_sate'] ? number_format($user['average_sate'], 1) : 'Not Available'); ?>" ajax-url="<?php echo URL::site('faculty/update_myprofile/average_sate'); ?>"></span>
				<span class="show-hover" id="editButton">Edit</span>
			</div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>No. of students mentored</strong></div>
			<div class="col-xs-6" style="display:inline">
				<span class="editStudents" value="<?php echo ($user['students_mentored'] ? number_format($user['students_mentored']) : 'Not Available'); ?>" ajax-url="<?php echo URL::site('faculty/update_myprofile/students_mentored'); ?>"></span>
				<span class="show-hover" id="editButton">Edit</span>
			</div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Faculty Code</strong></div>
			<div class="col-xs-6"><?php echo $user['faculty_code']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Rank</strong></div>
			<div class="col-xs-6"><?php echo $user['rank']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Academic Program</strong></div>
			<div class="col-xs-6"><?php echo $user['program_short']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Position</strong></div>
			<?php
			if ($user['position'] == 'none') echo '<div class="col-xs-6">Not Applicable</div>';
			elseif ($user['position'] == 'chair') echo '<div class="col-xs-6">Department Chair</div>';
			else echo '<div class="col-xs-6">College Dean</div>';
			?>
		</div>
	</div>
</div>

<hr>
<div>
	<?php
	echo View::factory('profile/myprofile/education')
		->bind('user', $user)
		->bind('education', $education);
	?>
</div>

<hr>
<div>
<!-- List of all accomplishments -->
<?php 
echo View::factory('profile/myprofile/accomplishments')
	->bind('accom_reports', $accom_reports)
	->bind('fullname', $fullname)
	->bind('accom_pub', $accom_pub)
	->bind('accom_awd', $accom_awd)
	->bind('accom_rch', $accom_rch)
	->bind('accom_ppr', $accom_ppr)
	->bind('accom_ctv', $accom_ctv)
	->bind('accom_par', $accom_par)
	->bind('accom_mat', $accom_mat)
	->bind('accom_oth', $accom_oth)
	->bind('user', $user);
?>
</div>
