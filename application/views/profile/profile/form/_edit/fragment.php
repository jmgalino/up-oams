<div class="row">
	<div class="col-xs-6">
		<img src="../../<?php echo $user->pic; ?>" class="img-responsive">
		<br>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">

		<div class="row details form-group">
			<div class="col-sm-5"><label for="emp_code">Employee Code</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="emp_code" name="emp_code" value="<?php echo $user->employee_code; ?>" readonly>
			</div>
		</div>
		<br>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="fname">First Name</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user->first_name; ?>">
			</div>
		</div>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="minit">Middle Initial</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="minit" name="minit" value="<?php echo $user->middle_initial; ?>">
			</div>
		</div>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="lname">Last Name</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user->last_name; ?>">
			</div>
		</div>
		<br>

		<?php if ($user->user_type == 'faculty'): ?>
		<div class="row details form-group faculty-info">
			<div class="col-sm-5"><label for="fcode">Faculty Code</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="fcode" name="fcode" value="<?php echo $user->faculty_code; ?>">
			</div>
		</div>
		<?php endif; ?>

	</div>
</div>

<?php print form::close();?><!-- form -->
