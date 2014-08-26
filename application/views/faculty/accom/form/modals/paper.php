<!-- "ppr" Form -->
<div class="modal fade" id="modal_paper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Oral Paper/Poster Presentation</h4>
      </div>

      <?php print form::open('faculty/accom/add/ppr', array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Author</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="activity" class="col-sm-3 control-label">Activity</label>
          <div class="col-sm-8">
            <select class="form-control" name="activity">
              <option value="Conference">Conference</option>
              <option value="Forum">Forum</option>
              <option value="Seminar">Seminar</option>
              <option value="Workshop">Workshop</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="venue" class="col-sm-3 control-label">Venue</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="venue" name="venue" required>
          </div>
        </div>

        <div class="form-group">
          <label for="dates" class="col-sm-3 control-label">Inclusive dates</label>
          <div class="col-sm-8" id="datepicker">
            <div class="input-daterange input-group" id="dates">
              <input type="text" class="form-control" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="attachment" class="col-sm-3 control-label">Attachment(s)</label>
          <div class="col-sm-8">
            <div id="pprAttachmentWrapper"></div>
            <span class="help-block">You can add up to 5 attachments.</span>
            <button type="button" class="btn btn-default" id="addPprAttachment">Add attachment</button>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>

      <?php print form::close();?>
    </div>
  </div>
</div>