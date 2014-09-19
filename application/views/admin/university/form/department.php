<!-- Update Departments Form -->
<div class="modal fade" id="modal_department" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Update Departments</h4>
      </div>

      <?php print Form::open('admin/university/update/departments', array('class'=>'form-horizontal', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="department-field" class="col-sm-3 control-label">Departments</label>
          <div class="col-sm-8">
            <select class="form-control" id="department-field" name="department_ID" required>
              <option value="">Select</option>
              <?php
              foreach ($departments as $department)
              {
                echo '<option value="'.$department['department_ID'].'">'.$department['department'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="department-full" class="col-sm-3 control-label">Full</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="department-full" name="department" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="department-short" class="col-sm-3 control-label">Initials</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="department-short" name="short" required>
          </div>
        </div>

        <div class="form-group">
          <label for="department-college" class="col-sm-3 control-label">College</label>
          <div class="col-sm-8">
            <select class="form-control" id="department-college" name="college_ID" required>
              <option value="">Select</option>
              <?php
              foreach ($colleges as $college)
              {
                echo '<option value="'.$college['college_ID'].'">'.$college['college'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="department-chair" class="col-sm-3 control-label">Department Chair</label>
          <div class="col-sm-8">
            <select class="form-control" id="department-chair" name="user_ID" required>
              <option value="">Select</option>
              <?php
              foreach ($users as $user)
              {
                if ($user['position'] == 'dept_chair')
                {
                  echo '<option value="'.$user['user_ID'].'">'.$user['first_name'].' '.$user['middle_name'].'. '.$user['last_name'].'</option>';
                }
              }
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      
      </form>
    </div>
  </div>
</div>