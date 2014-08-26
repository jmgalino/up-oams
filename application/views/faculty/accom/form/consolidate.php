<!-- Department/College Report Form -->
<div class="modal fade" id="modal_consolidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Consolidate Reports</h4>
      </div>

      <?php print Form::open($consolidate_url, array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="monthpicker">
            <div class="input-daterange input-group" id="period">
              <input type="text" class="form-control" name="start">
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end">
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