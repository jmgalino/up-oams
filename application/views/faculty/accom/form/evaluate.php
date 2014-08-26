<div class="modal fade" id="modal_evaluate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Evaluate Report</h4>
      </div>

      <?php print Form::open($evaluate_url, array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="status" class="col-sm-3 control-label">Evaluation</label>
          <div class="col-sm-8">
            <select class="form-control" name="status">
              <option value="Approved">Approve</option>
              <option value="Rejected">Reject</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-sm-3 control-label">Remarks</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="(Optional)"></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <?php print Form::submit(NULL, 'Confirm', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>