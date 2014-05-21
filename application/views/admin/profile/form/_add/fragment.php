<div class="form-group">
  <label for="emp_code" class="col-sm-4 control-label">Employee Code</label>
  <div class="col-sm-7">
    <input type="number" class="form-control" id="employee_code" name="emp_code" required>
  </div>
</div>

<div class="form-group">
  <label for="fname" class="col-sm-4 control-label">First Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="fname" name="fname" required>
  </div>
</div>

<div class="form-group">
  <label for="minit" class="col-sm-4 control-label">Middle Initial</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="minit" name="minit" required>
  </div>
</div>

<div class="form-group">
  <label for="lname" class="col-sm-4 control-label">Last Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="lname" name="lname" required>
  </div>
</div>
<br>

<div class="form-group faculty-info" hidden>
  <label for="rank" class="col-sm-4 control-label">Faculty Code</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="fcode" name="fcode">
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
    <select class="form-control" id= "program" name="program">
     <?php
      foreach ($programs as $program)
      {
          echo '<option value="'.$program->program_ID.'">'.$program->program_short.'</option>';
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
