<div class="form-group">
  <label for="emp_code" class="col-sm-4 control-label">Employee Code</label>
  <div class="col-sm-7">
    <input type="number" class="form-control" id="employee_code" name="employee_code" value="<?php echo $user['employee_code']; ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="first_name" class="col-sm-4 control-label">First Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="middle_initial" class="col-sm-4 control-label">Middle Initial</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="middle_initial" name="middle_initial" value="<?php echo $user['middle_initial']; ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="last_name" class="col-sm-4 control-label">Last Name</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="birthday" class="col-sm-4 control-label">Birthday</label>
  <div class="col-sm-7">
    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo date_format(date_create($user['birthday']), 'Y-m-d'); ?>" required>
  </div>
</div>
<br>

<div class="form-group faculty-info" hidden>
  <label for="rank" class="col-sm-4 control-label">Faculty Code</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="faculty_code" name="faculty_code" value=<?php echo $user['faculty_code']; ?>>
  </div>
</div>

<div class="form-group faculty-info" hidden>
  <label for="rank" class="col-sm-4 control-label">Rank</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="rank" name="rank" value=<?php echo $user['rank']; ?>>
  </div>
</div>

<div class="form-group faculty-info" hidden>
  <label for="program" class="col-sm-4 control-label">Degree Program</label>
  <div class="col-sm-7">
    <select class="form-control" id="program" name="program_ID">
     <?php
      foreach ($programs as $program)
      {
          echo '<option value="'.$program['program_ID'].'"';

          if ($user['program_ID'] == $program['program_ID'])
            echo 'selected="selected"';

          echo '>'.$program['program_short'].'</option>';
      }
      ?>
    </select>
  </div>
</div>

<div class="form-group faculty-info" hidden>
  <label for="position" class="col-sm-4 control-label">Position</label>
  <div class="col-sm-7">
    <select class="form-control" id= "position" name="position">
      <option value="none" <?php if ($user['position'] == 'none') echo 'selected="selected"'?>>Not Applicable</option>
      <option value="dept_chair" <?php if ($user['position'] == 'dept_chair') echo 'selected="selected"'?>>Department Chair</option>
      <option value="dean" <?php if ($user['position'] == 'dean') echo 'selected="selected"'?>>College Dean</option>
    </select>
</div>
</div>
