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
		<div class="row details">
			<div class="col-xs-6"><strong>User Type</strong></div>
			<div class="col-xs-6"><?php echo $user['user_type']; ?></div>
		</div><br>

		<div class="row details">
			<div class="col-xs-6"><strong>Title</strong></div>
			<div class="col-xs-6"><?php echo ($user['title'] ? $user['title'] : '-'); ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>First Name</strong></div>
			<div class="col-xs-6"><?php echo $user['first_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Middle Name</strong></div>
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
			<div class="col-xs-6"><?php echo date_format(date_create($user['birthday']), 'F d, Y'); ?></div>
		</div>
		<br>

		<?php if ($user['user_type'] == 'Faculty'): ?>
		<div class="row details">
			<div class="col-xs-6"><strong>Faculty Code</strong></div>
			<div class="col-xs-6"><?php echo $user['faculty_code']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Rank</strong></div>
			<div class="col-xs-6"><?php echo $user['rank']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Degree Program</strong></div>
			<div class="col-xs-6"><?php echo $user['program_short']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Position</strong></div>
			<?php
			if ($user['position'] == 'none') echo '<div class="col-xs-6">Not Applicable</div>';
			elseif ($user['position'] == 'dept_chair') echo '<div class="col-xs-6">Department Chair</div>';
			else echo '<div class="col-xs-6">College Dean</div>';
			?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php if ($user['user_type'] == 'Faculty'): ?>
<hr>
<div>
	<?php
	echo View::factory('admin/profile/education')
		->bind('user', $user)
		->bind('education', $education);
	?>
</div>

<!-- List of all accomplishments -->
<?php
$name = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'].'.';

echo View::factory('admin/profile/accomplishments')
	->bind('accom_reports', $accom_reports)
	->bind('name', $name)
	->bind('accom_pub', $accom_pub)
	->bind('accom_awd', $accom_awd)
	->bind('accom_rch', $accom_rch)
	->bind('accom_ppr', $accom_ppr)
	->bind('accom_ctv', $accom_ctv)
	->bind('accom_par', $accom_par)
	->bind('accom_mat', $accom_mat)
	->bind('accom_oth', $accom_oth);
?>

<?php endif; ?>

