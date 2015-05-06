<!-- Create/Update Program Form -->
<div class="modal fade" id="modal_program" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">New Degree Program</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'programForm', 'role'=>'form', 'ajax-url'=>URL::site('extras/ajax/unique/new_program'))); ?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="invalidMessage"></p>
        </div>

        <input type="text" id="program-id" name="program_ID" hidden>

        <div class="form-group">
          <label for="program-college" class="col-sm-3 control-label">College</label>
          <div class="col-sm-8">
            <select class="form-control" id="program-college" name="college_ID" ajax-url="<?php echo URL::site('extras/ajax/college_departments');?>" required>
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
          <label for="program-department" class="col-sm-3 control-label">Department</label>
          <div class="col-sm-8">
            <select class="form-control" id="program-department" name="department_ID" disabled></select>
          </div>
        </div>

        <div class="form-group">
          <label for="program-program-short" class="col-sm-3 control-label">Degree Program</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="program-program-short" name="program_short" required>
            <span class="help-block">Example: BS Computer Science</span>
          </div>
        </div>

        <div class="form-group">
          <label for="program-program" class="col-sm-3 control-label">Complete Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="program-program" name="program" required>
            <span class="help-block">Example: Bachelor of Science Computer Science</span>
          </div>
        </div>
        
        <div class="form-group">
          <label for="program-short" class="col-sm-3 control-label">Initials</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="program-short" name="short" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="program-date" class="col-sm-3 control-label">Date Instituted</label>
          <div class="col-sm-8" id="datepicker">
            <div class="input-group date">
              <input type="text" class="form-control" id="program-date" name="date_instituted" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="program-type" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-8">
            <select class="form-control" id="program-type" name="type" required>
              <option value="">Select</option>
              <option>Undergraduate</option>
              <option>Graduate</option>
              <option>Certificate</option>
              <option>Diploma</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="program-vision" class="col-sm-3 control-label">Vision</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="program-vision" name="vision" rows="3" required></textarea>
          </div>
        </div>
        
        <div class="form-group">
          <label for="program-goals" class="col-sm-3 control-label">Goals</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="program-goals" name="goals" rows="3" required></textarea>
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