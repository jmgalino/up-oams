<!-- Create/Update Announcement Form -->
<div class="modal fade" id="modal_announcement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">New Announcement</h4>
      </div>

      <?php print Form::open('admin/oams/new/announcement', array('class'=>'form-horizontal', 'id'=>'announcementForm', 'role'=>'form')); ?>
      <div class="modal-body">
        <input type="text" id="announcement-id" name="announcement_ID" hidden>

        <div class="form-group">
          <label for="announcement-subject" class="col-sm-3 control-label">Subject</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="announcement-subject" name="subject" required>
          </div>
        </div>
        
        <div class="form-group">
          <label for="announcement-content" class="col-sm-3 control-label">Content</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="announcement-content" name="content" rows="10" required></textarea>
          </div>
        </div>

        <!-- <div class="form-group">
          <label for="announcement-attachment" class="col-sm-3 control-label">Attachment(s)</label>
          <div class="col-sm-8" id="add-attachment">
            <input type="file" id="announcement-attachment" name="attachment[]" accept="image/*" multiple="true">
            <span class="help-block">You can add up to 5 attachments.</span>
          </div>
          <div class="col-sm-8" id="view-attachment"></div>
        </div> -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Post', array('type'=>'submit', 'class'=>'btn btn-primary', 'onclick'=>'<script>("#announcementForm").submit();</script>')); ?>
      </div>
      
      </form>
    </div>
  </div>
</div>