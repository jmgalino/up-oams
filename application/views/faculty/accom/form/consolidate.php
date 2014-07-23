<div class="modal fade" id="modal_consolidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Consolidate Reports</h4>
      </div>
      <?php print form::open('accom/consolidate', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="smy" class="col-sm-4 control-label">Start (Month & Year)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control c-report" id="smy" name="smy">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="emy" class="col-sm-4 control-label">End (Month & Year)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control c-report" id="emy" name="emy">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Generate')); ?>
      </div>
      <?php print form::close();?><!-- form -->
    </div>
  </div>
</div>