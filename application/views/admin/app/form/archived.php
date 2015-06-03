<!-- View Announcement -->
<div class="modal fade" id="modal_announcement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">View Announcement</h4>
      </div>

      <form class="form-horizontal">
      <div class="modal-body">
        <div class="form-group">
          <label for="announcement-subject" class="col-sm-3 control-label">Subject</label>
          <div class="col-sm-8">
            <p class="form-control-static" id="announcement-subject"></p>
          </div>
        </div>
        
        <div class="form-group">
          <label for="announcement-content" class="col-sm-3 control-label">Content</label>
          <div class="col-sm-8">
            <p class="form-control-static" id="announcement-content"></p>
          </div>
        </div>
      </div>
      </form>

      <div class="modal-footer">
        <a class="btn btn-default pull-left" id="deleteAnnouncement" href="">Delete</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" id="restoreAnnouncement" href="">Restore</a>
      </div>
      
    </div>
  </div>
</div>