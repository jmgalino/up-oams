<div class="modal fade" id="modal_accom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Accomplishment Report</h4>
      </div>

      <?php print form::open('faculty/accom/new', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <?php if (count($accom_reports) > 1) : ?>
        <div class="form-group">
          <label for="month_year" class="col-sm-4 control-label">Report Type</label>
          <div class="col-sm-5">
            <select class="form-control" name="report_type" id="report_type">
              <option value="new">New</option>
              <option value="consolidated">Consolidated</option>
            </select>
          </div>
        </div>
        <?php endif; ?>

        <div class="form-group new-report">
          <label for="month_year" class="col-sm-4 control-label">Month & Year</label>
          <div class="col-sm-5">
            <div class="input-group" id="monthpicker">
              <input type="text" class="form-control n-report" name="month_year" required>
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group consolidated-report" style="display:none">
          <label for="smy" class="col-sm-4 control-label">Start (Month & Year)</label>
          <div class="col-sm-5">
            <div class="input-group" id="monthpicker" style="z-index:1151;">
              <input type="text" class="form-control c-report" name="smy">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group consolidated-report" style="display:none">
          <label for="emy" class="col-sm-4 control-label">End (Month & Year)</label>
          <div class="col-sm-5">
            <div class="input-group" id="monthpicker" style="z-index:1151;">
              <input type="text" class="form-control c-report" name="emy">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'New Report', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>