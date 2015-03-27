<!-- OPCR Form -->
<div class="modal fade" id="modal_opcr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Office Performance Commitment and Review Form</h4>
      </div>

      <?php print Form::open('faculty/opcr/new', array('class'=>'form-horizontal', 'id'=>'newForm', 'role'=>'form'));?>
      <div class="modal-body">
        <?php if ($ipcr_forms AND $opcr_forms):// AND $identifier == 'dean'): ?>
        <div class="form-group">
          <label for="form_type" class="col-sm-4 control-label">Form Type</label>
          <div class="col-sm-6">
            <select class="form-control" name="form_type" id="form_type">
              <option value="new">New</option>
              <option value="consolidated">Consolidated</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="period">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end" required>
            </div>
          </div>
        </div>

        <div class="form-group" style="display:none">
          <label for="opcr" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6">
            <select class="form-control" name="opcr_ID" id="opcr">
              <option value="">Select</option>
              <?php 
              foreach ($opcr_forms as $opcr) {
                echo '<option value=',$opcr['opcr_ID'],'>',
                   date('F Y', strtotime($opcr['period_from'])), ' - ', date('F Y', strtotime($opcr['period_to'])),
                  '</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <?php else: ?>
        <input name="form_type" value="new" hidden>
        <div class="form-group">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="period">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end" required>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Generate', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print Form::close();?>
    </div>
  </div>
</div>