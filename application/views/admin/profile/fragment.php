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
		</div>
		<br>

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
	<h4>Educational Background</h4><br>
	<div class="alert alert-warning"><p class="text-center">Coming soon.</p></div>
</div>

<?php endif; ?>

