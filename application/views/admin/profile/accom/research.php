<?php $fullname = $user->last_name.", ".$user->first_name." ".$user->middle_initial."."?>

<div class="modal fade" id="modal_research" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Research Grant/Fellowship Received</h4>
      </div>
      <?php print form::open('user/add/'.$user->user_ID.'/rch', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Name</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $fullname ;?>" readonly>
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
              <input type="radio" name="type" value="Applied" checked> Applied
              <br><input type="radio" name="type" value="Basic"> Basic
              <br><input type="radio" name="type" value="Other"> Other
              <br><input type="radio" name="type" value="Policy"> Policy
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
          <label for="amount" class="col-sm-4 control-label">Amount of Grant</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="amount" name="amount" requied>
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