<!-- Add/Edit Research Form -->
<div class="modal fade" id="modal_research" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="accom-label"></h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'researchForm', 'enctype'=>'multipart/form-data', 'role'=>'form', 'ajax-url'=>URL::site('ajax/check_date')));?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="accom-alert"></p>
        </div>

        <input type="text" id="research-id" name="research_ID" hidden>

        <div class="form-group">
          <label for="research-proponent" class="col-sm-4 control-label">Name of Faculty</label>
          <div class="col-sm-7">
            <p class="form-control-static" id="research-proponent"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="research-title" class="col-sm-4 control-label">Title of Research</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="research-title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="research-nature" class="col-sm-4 control-label">Nature</label>
          <div class="col-sm-7">
            <select class="form-control" id="research-nature" name="nature">
              <option>Basic</option>
              <option>Applied</option>
              <option>Policy</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="research-duration" class="col-sm-4 control-label">Duration of Grant</label>
          <div class="col-sm-7" id="research-duration">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" id="research-start" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" id="research-end" name="end" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="fund_external" class="col-sm-4 control-label">Fund Source</label>
          <div class="col-sm-7">
            
            <div class="checkbox">
              <label>
                <input type="checkbox" id="fund_source_up" name="form_up" value="up"> UP System Research Grant
              </label>
            </div>
            <div id="form_up" style="display:none;">
              <div class="input-group">
                <span class="input-group-addon">Php</span>
                <input type="text" class="form-control" id="fund_up" name="fund_up" data-toggle="tooltip" title="Allows up to 2 decimal places only.">
              </div>
            </div>
                
            <div class="checkbox">
              <label>
                <input type="checkbox" id="fund_source_external" name="form_external" value="external"> Other
              </label>
            </div>
            <div id="form_external" style="display:none;">
              <input type="text" class="form-control" id="fund_external" name="fund_external" style="margin-bottom:3px" placeholder="Source">
              <div class="input-group">
                <span class="input-group-addon">Php</span>
                <input type="text" class="form-control" id="fund_amount" name="fund_amount" data-toggle="tooltip" title="Allows up to 2 decimal places only.">
              </div>
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
