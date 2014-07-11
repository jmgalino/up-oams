<div class="modal fade" id="modal_evaluate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Evaluation</h4>
      </div>
      <?php print form::open('accom/evaluate/'.$accom_ID, array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="status" class="col-sm-3 control-label">Evaluation</label>
          <div class="col-sm-8">
              <input type="radio" name="status" value="Approved" checked> Approve
              <br><input type="radio" name="status" value="Rejected"> Reject
          </div>
        </div>

        <div class="form-group reject-remarks" hidden>
          <label for="remarks" class="col-sm-3 control-label">Remarks</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="remarks" name="remarks" rows="5" placeholder="(optional)"></textarea>
          </div>
        </div>

      </div>
    <div class="modal-footer">
      <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Save Evaluation')); ?>
    </div>
    <?php print form::close();?><!-- form -->
  </div>
</div>
</div>