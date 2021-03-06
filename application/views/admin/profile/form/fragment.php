<div class="alert alert-danger" style="display:none">
  <p class="text-center" id="invalidMessage"></p>
</div>

<input type="text" id="user-id" name="user_ID" hidden>

<div class="form-group">
  <label for="empcode" class="col-sm-4 control-label">Employee Code</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="empcode" name="employee_code" pattern="([0-9]{9})" title="Input a 9 digit code." required>
  </div>
</div>

<div class="form-group">
  <label for="title" class="col-sm-4 control-label">Title</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="title" name="title" placeholder="(Optional)">
  </div>
</div>

<div class="form-group">
  <label for="fname" class="col-sm-4 control-label">First Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="fname" name="first_name" required>
  </div>
</div>

<div class="form-group">
  <label for="mname" class="col-sm-4 control-label">Middle Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="mname" name="middle_name" required>
  </div>
</div>

<div class="form-group">
  <label for="lname" class="col-sm-4 control-label">Last Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="lname" name="last_name" required>
  </div>
</div>

<div class="form-group">
  <label for="suffix" class="col-sm-4 control-label">Suffix</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="suffix" name="suffix" placeholder="(Optional)">
  </div>
</div>

<div class="form-group">
  <label for="birthday" class="col-sm-4 control-label">Birthday</label>
  <div class="col-sm-7" id="datepicker">
    <div class="input-group date">
      <input type="text" class="form-control" id="birthday" name="birthday" required>
      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>
</div>
<br>

<?php if ($programs): ?>
<div class="form-group" style="display:none;">
  <label for="fcode" class="col-sm-4 control-label">Average<br>SATE Scores</label>
  <div class="col-sm-7">
    <input type="text" class="form-control faculty_info" id="average_sate" name="average_sate" disabled>
  </div>
</div>

<div class="form-group" style="display:none;">
  <label for="fcode" class="col-sm-4 control-label">No. of students mentored</label>
  <div class="col-sm-7">
    <input type="text" class="form-control faculty_info" id="students_mentored" name="students_mentored" disabled>
  </div>
</div>

<div class="form-group" style="display:none;">
  <label for="fcode" class="col-sm-4 control-label">Faculty Code</label>
  <div class="col-sm-7">
    <input type="text" class="form-control faculty_info" id="fcode" name="faculty_code">
  </div>
</div>

<div class="form-group" style="display:none;">
  <label for="rank" class="col-sm-4 control-label">Rank</label>
  <div class="col-sm-7">
    <select class="form-control faculty_info" id="rank" name="rank">
      <option value="">Select</option>
      <option value="Prof.">Professor</option>
      <option value="Assoc. Prof.">Associate Professor</option>
      <option value="Asst. Prof.">Assistant Professor</option>
      <option value="Inst.">Instructor</option>
    </select>
  </div>
</div>

<div class="form-group" style="display:none;">
  <label for="program-id" class="col-sm-4 control-label">Program</label>
  <div class="col-sm-7">
    <select class="form-control faculty_info" id="program-id" name="program_ID">
      <option value="">Select</option>
     <?php
      foreach ($programs as $program)
      {
          echo '<option value="'.$program['program_ID'].'">'.$program['program_short'].'</option>';
      }
      ?>
    </select>
  </div>
</div>

<div class="form-group" style="display:none;">
  <label for="position" class="col-sm-4 control-label">Position</label>
  <div class="col-sm-7">
    <select class="form-control faculty_info" id="position" name="position">
      <option value="">Select</option>
      <option value="dean">College Dean</option>
      <option value="chair">Department Chair</option>
      <option value="none">Not Applicable</option>
    </select>
  </div>
</div>
<?php endif; ?>
