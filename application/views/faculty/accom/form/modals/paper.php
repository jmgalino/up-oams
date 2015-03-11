<!-- Add/Edit Paper Form -->
<div class="modal fade" id="modal_paper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="accom-label"></h4>
      </div>

      <?php print Form::open('faculty/accom/add/ppr', array('class'=>'form-horizontal', 'id'=>'paperForm', 'enctype'=>'multipart/form-data', 'role'=>'form', 'ajax-url'=>URL::site('ajax/check_date')));?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="accom-alert"></p>
        </div>

        <input type="text" id="paper-id" name="paper_ID" hidden>

        <div class="form-group">
          <label for="paper-author" class="col-sm-3 control-label">Author/s</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
            <input type="text" class="form-control" id="paper-author" name="author" data-toggle="tooltip" data-placement="top" title="No need to include other faculty." placeholder="(Optional)">
          </div>
        </div>

        <div class="form-group">
          <label for="paper-title" class="col-sm-3 control-label">Title of Paper</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="paper-title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="paper-activity" class="col-sm-3 control-label">Activity</label>
          <div class="col-sm-8">
            <select class="form-control" name="activity">
              <option>Conference</option>
              <option>Forum</option>
              <option>Seminar</option>
              <option>Workshop</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="paper-venue" class="col-sm-3 control-label">Venue</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="paper-venue" name="venue" required>
          </div>
        </div>

        <div class="form-group">
          <label for="paper-dates" class="col-sm-3 control-label">Inclusive Dates</label>
          <div class="col-sm-8" id="paper-dates">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" id="paper-start" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" id="paper-end" name="end" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="attachment" class="col-sm-3 control-label">Attachment(s)</label>
          <div class="col-sm-8" id="add-attachment">
            <input type="file" id="accom-attachment" name="attachment[]" accept="image/*" multiple="true">
            <span class="help-block">You can add up to 5 attachments.</span>
          </div>
          <div class="col-sm-8" id="view-attachment"></div>
        </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="back-button" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'accom-submit')); ?>
      </div>
      </form>
      
    </div>
  </div>
</div>