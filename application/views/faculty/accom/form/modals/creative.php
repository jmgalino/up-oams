<!-- Add/Edit Creative Form -->
<div class="modal fade" id="modal_creative" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="accom-label"></h4>
      </div>
      <?php print Form::open('faculty/accom/add/ctv', array('class'=>'form-horizontal', 'id'=>'creativeForm', 'enctype'=>'multipart/form-data', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="accom-alert"></p>
        </div>

        <input type="text" id="creative-id" name="creative_ID" hidden>

        <div class="form-group">
          <label for="creative-author" class="col-sm-4 control-label">Author/s</label>
          <div class="col-sm-7">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
            <input type="text" class="form-control" id="creative-author" name="author" data-toggle="tooltip" data-placement="top" title="No need to include other faculty." placeholder="(Optional)">
          </div>
        </div>

        <div class="form-group">
          <label for="creative-title" class="col-sm-4 control-label">Title of Artistic Work</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="creative-title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="creative-venue" class="col-sm-4 control-label">Venue</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="creative-venue" name="venue" required>
          </div>
        </div>

        <div class="form-group">
          <label for="creative-dates" class="col-sm-4 control-label">Inclusive Dates</label>
          <div class="col-sm-7" id="creative-dates">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" id="creative-start" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" id="creative-end" name="end" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="attachment" class="col-sm-4 control-label">Attachment(s)</label>
          <div class="col-sm-7" id="add-attachment">
            <input type="file" id="accom-attachment" name="attachment[]" accept="image/*" multiple="true">
            <span class="help-block">You can add up to 5 attachments.</span>
          </div>
          <div class="col-sm-7" id="view-attachment"></div>
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