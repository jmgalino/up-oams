<!-- "awd" Form -->
<div class="modal fade" id="modal_award" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Award/Grant Received</h4>
      </div>
      <?php print form::open('faculty/accom/add/awd', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-5 control-label">Name</label>
          <div class="col-sm-6">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="award" class="col-sm-5 control-label">Award/Grant</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="award" name="award" required>
          </div>
        </div>

        <div class="form-group">
          <label for="type" class="col-sm-5 control-label">Type</label>
          <div class="col-sm-6">
            <select class="form-control" name="type">
              <option value="Academe">Academe</option>
              <option value="National">National</option>
              <option value="International">International</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="source" class="col-sm-5 control-label">Source of Grant/Awarding Body</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="source" name="source" required>
          </div>
        </div>

        <div class="form-group">
          <label for="duration" class="col-sm-5 control-label">Duration of the Award/Grant</label>
          <div class="col-sm-6" id="datepicker">
            <div class="input-daterange input-group" id="duration">
              <input type="text" class="form-control" name="start" required>
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>