<!-- IPCR Template Form -->
<div class="modal fade" id="modal_ipcr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Individual Performance Commitment and Review</h4>
      </div>

      <?php print Form::open('faculty/ipcr/new', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6">
            <select class="form-control" name="period" id="period_ID">
              <?php
              $i = 0;
              foreach ($opcr_forms as $opcr) {
                echo '<option value="',$opcr['opcr_ID'],'">',
                   date('F Y', strtotime($opcr['period_from'])), ' - ', date('F Y', strtotime($opcr['period_to'])),
                   '</option>';
                if (++$i == 6) break;
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