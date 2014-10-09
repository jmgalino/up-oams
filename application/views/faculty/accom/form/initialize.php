<!-- Accomplishment Report Form -->
<div class="modal fade" id="modal_accom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Accomplishment Report</h4>
      </div>

      <?php print Form::open('faculty/accom/new', array('class'=>'form-horizontal', 'id' => 'newReport', 'role'=>'form'));?>
      <div class="modal-body">
        <?php if (count($accom_reports) > 1): ?>
        <div class="form-group">
          <label for="report_type" class="col-sm-4 control-label">Report Type</label>
          <div class="col-sm-6">
            <select class="form-control" name="report_type" id="report_type">
              <option value="new">New</option>
              <option value="consolidated">Consolidated</option>
            </select>
          </div>
        </div>

        <div class="form-group" style="display:none">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="period">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" name="start">
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end">
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="form-group">
          <label for="yearmonth" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="yearmonth">
            <div class="input-group date">
              <input type="text" class="form-control" name="yearmonth" id="yearmonth" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Generate', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print Form::close();?>
    </div>
  </div>
</div>