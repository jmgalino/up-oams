<!-- Add/Edit Material Form -->
<div class="modal fade" id="modal_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="accom-label"></h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'materialForm', 'enctype'=>'multipart/form-data', 'role'=>'form')); ?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="accom-alert"></p>
        </div>

        <input type="text" id="material-id" name="material_ID" hidden>

        <div class="form-group">
          <label for="material-author" class="col-sm-3 control-label">Author/s</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
            <input type="text" class="form-control" id="material-author" name="author" data-toggle="tooltip" data-placement="top" title="No need to include other faculty." placeholder="(Optional)">
          </div>
        </div>

        <div class="form-group">
          <label for="material-year" class="col-sm-3 control-label">Year</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="material-year" name="year" pattern="([0-9]{4})" title="Format is YYYY" required>
          </div>
        </div>

        <div class="form-group">
          <label for="material-title" class="col-sm-3 control-label">Title</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="material-title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="material-attachment" class="col-sm-3 control-label">Attachment(s)</label>
          <div class="col-sm-8" id="add-attachment">
            <input type="file" id="accom-attachment" name="attachment[]" accept="image/*" multiple="true" required>
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