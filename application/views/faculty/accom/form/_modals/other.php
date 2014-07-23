<div class="modal fade" id="modal_other" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Other Accomplishments</h4>
      </div>
      <?php print form::open('accom/add/oth', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->site->session->get('namefull');?>" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="details" class="col-sm-3 control-label">Details</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="details" name="details" rows="5" required></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Add')); ?>
      </div>
      <?php print form::close();?><!-- form -->
    </div>
  </div>
</div>