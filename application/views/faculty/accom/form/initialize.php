<!-- Accomplishment Report Form -->
<div class="modal fade" id="modal_accom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Accomplishment Report</h4>
      </div>

      <?php print form::open('faculty/accom/new', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <?php if (count($accom_reports) > 1): ?>
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
          <label for="yearmonth" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6">
            <div class="input-group" id="monthpicker">
              <input type="text" class="form-control n-document" name="yearmonth" required>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>

        <?php if (count($accom_reports) > 1): ?>
        <div class="form-group consolidated-document" style="display:none">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="monthpicker">
            <div class="input-daterange input-group" id="period">
              <input type="text" class="form-control c-document" name="start">
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control c-document" name="end">
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Generate', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>