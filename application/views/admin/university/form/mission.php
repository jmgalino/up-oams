<!-- Update Mission Form -->
<div class="modal fade" id="modal_mission" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Update Mission</h4>
      </div>

      <?php print Form::open('admin/university/update/mission', array('class'=>'form-horizontal', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="mission-field" class="col-sm-2 control-label">Mission</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="mission-field" name="mission" rows="10" placeholder="Enter mission" required><?php echo $mission; ?></textarea>
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