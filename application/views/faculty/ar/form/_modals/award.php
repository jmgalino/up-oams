<div class="modal fade" id="modal_award" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Award/Grant Received</h4>
      </div>
      <?php print form::open('accom/add/awd', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->site->session->get('namefull');?>" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="award" class="col-sm-4 control-label">Award/Grant</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="award" name="award" required>
          </div>
        </div>

        <div class="form-group">
          <label for="duration" class="col-sm-4 control-label">Duration of the Award/Grant</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="date" class="form-control" id="duration" name="dfrom" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            to 
            <div class="input-group">
              <input type="date" class="form-control" id="duration" name="dto" required>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="source" class="col-sm-4 control-label">Source of Grant/Awarding Body</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="source" name="source" required>
          </div>
        </div>

        <div class="form-group">
          <label for="type" class="col-sm-4 control-label">Type</label>
          <div class="col-sm-7">
            <input type="radio" name="type" value="Academe" checked> Academe
            <br><input type="radio" name="type" value="National"> National
            <br><input type="radio" name="type" value="International"> International
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