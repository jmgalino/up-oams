<!-- Update University Form -->
<div class="modal fade" id="modal_univ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Update University</h4>
      </div>

      <?php print Form::open('admin/university/update/univ', array('class'=>'form-horizontal', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="univ-field" class="col-sm-2 control-label">University</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="univ-field" name="university" rows="10" placeholder="Enter university" required><?php echo $university; ?></textarea>
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