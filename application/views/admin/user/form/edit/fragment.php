<div class="row">
	<div class="col-xs-6">
		<img src="../../../<?php echo $user_details->pic; ?>" class="img-responsive">
		<br>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">

		<div class="row details form-group">
			<div class="col-sm-5"><label for="emp_code">Employee Code</label></div>
			<div class="col-xs-6">
				<input type="number" class="form-control" id="emp_code" name="emp_code" value="<?php echo $user_details->employee_code; ?>">
			</div>
		</div>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="type">User Type</label></div>
			<div class="col-xs-6">
				<?php if ($user_details->user_type == 'admin'): ?>
				<input type="radio" name="type" value="admin" checked> Admin
				<br><input type="radio" name="type" value="faculty"> Faculty
				<?php else: ?>
				<input type="radio" name="type" value="admin"> Admin
				<br><input type="radio" name="type" value="faculty" checked> Faculty
				<?php endif; ?>
			</div>
		</div>
		<br>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="fname">First Name</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user_details->first_name; ?>">
			</div>
		</div>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="minit">Middle Initial</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="minit" name="minit" value="<?php echo $user_details->middle_initial; ?>">
			</div>
		</div>

		<div class="row details form-group">
			<div class="col-sm-5"><label for="lname">Last Name</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user_details->last_name; ?>">
			</div>
		</div>
		<br>

		<div class="row details form-group faculty-info">
			<div class="col-sm-5"><label for="fcode">Faculty Code</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="fcode" name="fcode" value="<?php echo $user_details->faculty_code; ?>">
			</div>
		</div>

		<div class="row details form-group faculty-info">
			<div class="col-sm-5"><label for="rank">Rank</label></div>
			<div class="col-xs-6">
				<input type="text" class="form-control" id="rank" name="rank" value="<?php echo $user_details->rank; ?>">
			</div>
		</div>

		<div class="row details form-group faculty-info">
			<div class="col-sm-5"><label for="program_ID">Degree Program</label></div>
			<div class="col-xs-6">
				<select class="form-control" id= "program" name="program">
					<!-- <option></option> -->
			      <?php
			      foreach ($programs as $program)
			      {
			          echo '<option value="'.$program->program_ID.'">'.$program->program_short.'</option>';
			      }
			      ?>
				</select>
			</div>
		</div>

		<div class="row details form-group faculty-info">
			<div class="col-sm-5"><label for="position">Position</label></div>
			<div class="col-xs-6">
				<select class="form-control" id= "position" name="position">
					<option value="none">Not Applicable</option>
					<option value="dept_chair">Department Chair</option>
					<option value="dean">College Dean</option>
				</select>
			</div>
		</div>

	</div>
</div>

<?php print form::close();?><!-- form -->
