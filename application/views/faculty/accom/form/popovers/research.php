<!-- "rch" Form -->
<div class="modal fade" id="modal_research" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Research Grant/Fellowship Received</h4>
      </div>
      <?php print Form::open('faculty/accom/add/rch', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="proponent" class="col-sm-4 control-label">Proponent</label>
          <div class="col-sm-7">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-4 control-label">Title of Research/Fellowship</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="nature" class="col-sm-4 control-label">Nature</label>
          <div class="col-sm-7">
            <select class="form-control" name="nature">
              <option value="Basic">Basic</option>
              <option value="Other">Other</option>
              <option value="Policy">Policy</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="fund_external" class="col-sm-4 control-label">Source of Fund (External)</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="fund_external" name="fund_external">
          </div>
        </div>

        <div class="form-group">
          <label for="fund_amount" class="col-sm-4 control-label">Amount of Grant (External)</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="fund_amount" name="fund_amount">
          </div>
        </div>

        <div class="form-group">
          <label for="fund_up" class="col-sm-4 control-label">Amount of Grant (UP)</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="fund_amount" name="fund_up">
          </div>
        </div>

        <div class="form-group">
          <label for="duration" class="col-sm-4 control-label">Duration of Grant</label>
          <div class="col-sm-7">
            <div class="input-daterange input-group" id="datepicker">
              <input type="text" class="form-control" id="duration" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" id="duration" name="end" required>
            </div>
          </div>
        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print Form::close();?>
    </div>
  </div>
</div>
