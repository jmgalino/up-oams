<div class="modal fade" id="modal_participation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h4>
      </div>
      <?php print form::open('accom/add/par', array('class'=>'form-horizontal', 'role'=>'form'));?>
        <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name of Faculty</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->site->session->get('namefull');?>" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Name of Event</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
        </div>

        <div class="form-group">
          <label for="participation" class="col-sm-3 control-label">Participation</label>
          <div class="col-sm-8">
              <input type="radio" name="participation" value="Coordinator" checked> Coordinator
              <br><input type="radio" name="participation" value="Facilitator"> Facilitator
              <br><input type="radio" name="participation" value="Moderator"> Moderator
              <br><input type="radio" name="participation" value="Participant"> Participant
              <br><input type="radio" name="participation" value="Trainer"> Trainer
              <br><input type="radio" name="participation" value="Other"> Other
            <!-- <input type="text" class="form-control" id="participation" readonly> -->
          </div>
        </div>

        <div class="form-group">
          <label for="venue" class="col-sm-3 control-label">Venue</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="venue" name="venue" required>
          </div>
        </div>

      <div class="form-group">
        <label for="date" class="col-sm-3 control-label">Inclusive dates</label>
        <div class="col-sm-4" id="date">
          <div class="input-group">
            <input type="date" class="form-control" id="date" name="dfrom" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
          to 
          <div class="input-group">
            <input type="date" class="form-control" id="date" name="dto" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
      </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Add')); ?>
      </div>
        <?php print form::close();?> <!-- form -->    
    </div>
  </div>
</div>