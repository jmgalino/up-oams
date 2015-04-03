<!-- OPCR - Consolidate Form -->
<div class="modal fade" id="modal_consolidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Consolidate OPCR Forms</h4>
      </div>

      <?php print Form::open('faculty/opcr_coll/consolidate', array('class'=>'form-horizontal', 'id'=>'newForm', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="opcr" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="period">
            <div class="input-daterange input-group">
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