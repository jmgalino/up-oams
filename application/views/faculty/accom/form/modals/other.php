<!-- "oth" Form -->
<div class="modal fade" id="modal_other" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Other Accomplishments</h4>
      </div>

      <?php print Form::open('faculty/accom/add/oth', array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Name of Faculty</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="participation" class="col-sm-3 control-label">Participation</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="participation" name="participation" required>
          </div>
        </div>

        <div class="form-group">
          <label for="activity" class="col-sm-3 control-label">Activity</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="activity" name="activity" required>
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
            <div id="othAttachmentWrapper"></div>
            <span class="help-block">You can add up to 5 attachments.</span>
            <button type="button" class="btn btn-default" id="addOthAttachment">Add attachment</button>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>