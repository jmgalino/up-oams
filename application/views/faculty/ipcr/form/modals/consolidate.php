<!-- IPCR Consolidate Form -->
<div class="modal fade" id="modal_consolidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Consolidate IPCR Forms</h4>
      </div>

      <?php print Form::open($consolidate_url, array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6">
            <select class="form-control" name="opcr_ID" id="period">
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
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Generate', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print Form::close();?>
    </div>
  </div>
</div>