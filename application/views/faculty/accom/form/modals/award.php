<!-- Add/Edit Award Form -->
<div class="modal fade" id="modal_award" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="accom-label"></h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'awardForm', 'enctype'=>'multipart/form-data', 'role'=>'form', 'ajax-url'=>URL::site('extras/ajax/check_date'))); ?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="accom-alert"></p>
        </div>

        <input type="text" id="award-id" name="award_ID" hidden>

        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Name of Faculty</label>
          <div class="col-sm-7">
            <p class="form-control-static" id="award-name"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="award-award" class="col-sm-4 control-label">Award/Grant</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="award-award" name="award" required>
          </div>
        </div>

        <div class="form-group">
          <label for="award-duration" class="col-sm-4 control-label">Duration of the Award/Grant</label>
          <div class="col-sm-7" id="award-duration">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" id="award-start" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" id="award-end" name="end" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="award-source" class="col-sm-4 control-label">Source of Grant/Awarding Body</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="award-source" name="source" required>
          </div>
        </div>

        <div class="form-group">
          <label for="award-type" class="col-sm-4 control-label">Type</label>
          <div class="col-sm-7">
            <select class="form-control" id="award-type" name="type">
              <option>Academe</option>
              <option>National</option>
              <option>International</option>
            </select>
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