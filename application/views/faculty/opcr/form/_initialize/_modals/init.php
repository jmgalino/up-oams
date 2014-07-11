<div class="modal fade" id="modal_opcr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Office Performance Commitment and Review</h4>
      </div>
      <?php print form::open('opcr/init', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <div class="col-sm-4">
              <input type="radio" name="form" value="new" checked> New
              <?php if (count($opcrs)>0) : ?>
              <br><input type="radio" name="form" value="consolidated"> Consolidated
              <?php endif; ?>
          </div>
        </div>
        <hr>

        <div class="form-group new-form">
          <label for="pfrom" class="col-sm-4 control-label">Period (From)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control n-form" id="pfrom" name="pfrom" required>
            </div>
          </div>
        </div>

        <div class="form-group new-form">
          <label for="pto" class="col-sm-4 control-label">Period (To)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control n-form" id="pto" name="pto" required>
            </div>
          </div>
        </div>

        <div class="form-group consolidated-form" hidden>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Generate')); ?>
      </div>
      <?php print form::close();?><!-- form -->
    </div>
  </div>
</div>