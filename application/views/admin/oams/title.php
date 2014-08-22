<!-- Update Title Form -->
<div class="modal fade" id="modal_title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Update Title</h4>
      </div>

      <?php print form::open('admin/oams/update/title', array('class'=>'form-horizontal', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $titles['title']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="initials" class="col-sm-3 control-label">Initials</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="initials" name="initials" value="<?php echo $titles['initials']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="page_title" class="col-sm-3 control-label">Page Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="page_title" name="page_title" value="<?php echo $titles['page_title']; ?>" required>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      
      <?php print form::close();?>
    </div>
  </div>
</div>