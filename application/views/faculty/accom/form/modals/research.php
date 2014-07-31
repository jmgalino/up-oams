<!-- "rch" Form -->
<div class="modal fade" id="modal_research" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Research Grant/Fellowship Received</h4>
      </div>
      <?php print form::open('faculty/accom/add/rch', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-7">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-4 control-label">Title of Research</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="type" class="col-sm-4 control-label">Type</label>
          <div class="col-sm-7">
            <select class="form-control">
              <option name="type" value="Basic">Basic</option>
              <option name="type" value="Other">Other</option>
              <option name="type" value="Policy">Policy</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="source" class="col-sm-4 control-label">Fund Source</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="source" name="source" required>
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

        <div class="form-group">
          <label for="amount" class="col-sm-4 control-label">Amount of Grant</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="amount" name="amount" requied>
          </div>
        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#modal_accom" style="float:left;">Back</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>
