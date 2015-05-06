<!-- Create/Update Colleges Form -->
<div class="modal fade" id="modal_college" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">New College</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'collegeForm', 'role'=>'form', 'ajax-url'=>URL::site('extras/ajax/unique/new_college'))); ?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="invalidMessage"></p>
        </div>

        <input type="text" id="college-id" name="college_ID" ajax-url="<?php echo URL::site('extras/ajax/college_users'); ?>" hidden>

        <div class="form-group">
          <label for="college-college" class="col-sm-3 control-label">College</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="college-college" name="college" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="college-short" class="col-sm-3 control-label">Initials</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="college-short" name="short" required>
          </div>
        </div>

        <div class="form-group">
          <label for="college-dean" class="col-sm-3 control-label">College Dean</label>
          <div class="col-sm-8">
            <select class="form-control" id="college-dean" name="user_ID"></select>
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