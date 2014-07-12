<div class="form-group">
  <label for="emp_code" class="col-sm-4 control-label">Employee Code</label>
  <div class="col-sm-7">
    <input type="number" class="form-control" id="employee_code" name="employee_code" required>
  </div>
</div>

<div class="form-group">
  <label for="first_name" class="col-sm-4 control-label">First Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="first_name" name="first_name" required>
  </div>
</div>

<div class="form-group">
  <label for="middle_initial" class="col-sm-4 control-label">Middle Initial</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="middle_initial" name="middle_initial" required>
  </div>
</div>

<div class="form-group">
  <label for="last_name" class="col-sm-4 control-label">Last Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="last_name" name="last_name" required>
  </div>
</div>
<br>

<div class="form-group faculty-info" hidden>
  <label for="rank" class="col-sm-4 control-label">Faculty Code</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="faculty_code" name="faculty_code">
  </div>
</div>

<div class="form-group faculty-info" hidden>
  <label for="rank" class="col-sm-4 control-label">Rank</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="rank" name="rank">
  </div>
</div>

<div class="form-group faculty-info" hidden>
  <label for="program" class="col-sm-4 control-label">Degree Program</label>
  <div class="col-sm-7">
    <select class="form-control" id= "program" name="program_id">
     <?php
      foreach ($programs as $program)
      {
          echo '<option value="'.$program['program_ID'].'">'.$program['program_short'].'</option>';
      }
      ?>
    </select>
  </div>
</div>

<div class="form-group faculty-info" hidden>
  <label for="position" class="col-sm-4 control-label">Position</label>
  <div class="col-sm-7">
    <select class="form-control" id= "position" name="position">
      <option value="none">Not Applicable</option>
      <option value="dept_chair">Department Chair</option>
      <option value="dean">College Dean</option>
    </select>
</div>
</div>
