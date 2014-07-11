<div class="modal fade" id="modal_filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Filter Accomplishment Report</h4>
      </div>
      <?php print form::open('opcr/filter', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="pfrom" class="col-sm-4 control-label">Period (From)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control" id="duration" name="pfrom" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="pto" class="col-sm-4 control-label">Period (To)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control" id="duration" name="pto" required>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Filter')); ?>
      </div>
      <?php print form::close();?><!-- form -->
    </div>
  </div>
</div>