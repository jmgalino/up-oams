<!-- Update About Form -->
<div class="modal fade" id="modal_about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Update About</h4>
      </div>

      <?php print Form::open('admin/app/update/about', array('class'=>'form-horizontal', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="about" class="col-sm-2 control-label">About</label>
          <div class="col-sm-9">
            <textarea class="form-control" id="about" name="about" rows="10" required><?php echo $about; ?></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      
      <?php print Form::close();?>
    </div>
  </div>
</div>