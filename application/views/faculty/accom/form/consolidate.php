<!-- Department/College Report Form -->
<div class="modal fade" id="modal_consolidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Consolidate Reports</h4>
      </div>

      <?php print form::open($consolidate_url, array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="start" class="col-sm-4 control-label">Start (Month & Year)</label>
          <div class="col-sm-6">
            <div class="input-group" id="monthpicker">
              <input type="text" class="form-control" name="start">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="end" class="col-sm-4 control-label">End (Month & Year)</label>
          <div class="col-sm-6">
            <div class="input-group" id="monthpicker">
              <input type="text" class="form-control" name="end">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Generate', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>