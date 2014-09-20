<!-- Upload Photo Form -->
<div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Upload Photo</h4>
      </div>

      <form action="<?php echo URL::site("uploader/photo/$user_ID") ?>" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body">
        <div class="form-group">
          <div class="col-sm-10 col-sm-offset-1">
            <input type="file" id="photo" name="photo" accept="image/*" required>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      </form>
      
    </div>
  </div>
</div>