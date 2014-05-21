<div class="modal fade" id="modal_cuma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Individual Performance Commitment and Review</h4>
      </div>

      <?php print form::open('cuma/init', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="pfrom" class="col-sm-4 control-label">Period (From)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="number" class="form-control" id="pfrom" name="pfrom" min="2000" max="2050" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="pto" class="col-sm-4 control-label">Period (To)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="number" class="form-control" id="pto" name="pto" min="2000" max="2050" required>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Create')); ?>
      </div>
      <?php print form::close();?><!-- form -->
    </div>
  </div>
</div>