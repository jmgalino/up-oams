<!-- Create/Update Departments Form -->
<div class="modal fade" id="modal_department" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">New Department</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'departmentForm', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="invalidMessage"></p>
        </div>

        <input type="text" id="department-id" name="department_ID" hidden>

        <div class="form-group">
          <label for="department-college" class="col-sm-3 control-label">College</label>
          <div class="col-sm-8">
            <select class="form-control" id="department-college" name="college_ID" required>
              <option value="">Select</option>
              <?php
              foreach ($colleges as $college)
              {
                echo '<option value="'.$college['college_ID'].'">', $college['college'], '</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="department-department" class="col-sm-3 control-label">Department</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="department-department" name="department" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="department-short" class="col-sm-3 control-label">Initials</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="department-short" name="short" required>
          </div>
        </div>

        <div class="form-group">
          <label for="department-chair" class="col-sm-3 control-label">Department Chair</label>
          <div class="col-sm-8">
            <select class="form-control" id="department-chair" name="user_ID"></select>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      
      </form>
    </div>
  </div>
</div>