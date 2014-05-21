<div class="modal fade" id="modal_filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Filter IPCR Forms</h4>
      </div>
      <?php print form::open('ipcr/filter', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-7">
            <div class="input-group">
              <select class="form-control" id="period" name="opcr_ID">
              <?php
              foreach ($opcrs as $opcr) {
                $pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
                $pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);

                echo '<option value="'.$opcr->opcr_ID.'">'.$pfrom->format('F Y').' - '.$pto->format('F Y').'</option>';
              }
              ?>
              </select>
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