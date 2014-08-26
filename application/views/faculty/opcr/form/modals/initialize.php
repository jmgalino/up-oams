<!-- OPCR Form -->
<div class="modal fade" id="modal_opcr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Office Performance Commitment and Review Form</h4>
      </div>

      <?php print Form::open('faculty/opcr/new', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <?php if ($opcr_forms): ?>
        <div class="form-group">
          <label for="document_type" class="col-sm-4 control-label">Report Type</label>
          <div class="col-sm-6">
            <select class="form-control" name="document_type" id="document_type">
              <option value="new">New</option>
              <option value="consolidated">Consolidated</option>
            </select>
          </div>
        </div>
        <?php endif; ?>

        <div class="form-group new-document">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="monthpicker">
            <div class="input-daterange input-group" id="period">
              <input type="text" class="form-control n-document" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control n-document" name="end" required>
            </div>
          </div>
        </div>

        <?php if ($opcr_forms): ?>
        <div class="form-group consolidated-document" style="display:none">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6">
            <select class="form-control c-document" name="period_ID" id="period">
              <?php 
              foreach ($opcr_forms as $opcr) {
                echo '<option value=',$opcr['opcr_ID'],'>',
                   date_format(date_create($opcr['period_from']), 'F Y'), ' - ', date_format(date_create($opcr['period_to']), 'F Y'),
                  '</option>';
              }
              ?>
            </select>
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