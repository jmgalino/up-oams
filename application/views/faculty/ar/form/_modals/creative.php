<div class="modal fade" id="modal_creative" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Presentation of Creative Work Output</h4>
      </div>
      <?php print form::open('accom/add/ctv', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="author" class="col-sm-4 control-label">Author</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="author" name="author" value="<?php echo $this->site->session->get('namefull');?>" readonly>
            <!-- <br><a class="btn btn-primary btn-xs" role="button" href="">
            <span class="glyphicon glyphicon-plus"></span> Add -->
          </a>
        </div>
      </div>

      <div class="form-group">
        <label for="title" class="col-sm-4 control-label">Title of Artistic Work</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
      </div>

      <div class="form-group">
        <label for="venue" class="col-sm-4 control-label">Venue</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" id="venue" name="venue" required>
        </div>
      </div>

      <div class="form-group">
        <label for="date" class="col-sm-4 control-label">Inclusive dates</label>
        <div class="col-sm-4" id="date">
          <div class="input-group">
            <input type="date" class="form-control" id="dateFrom" name="dfrom" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
          to 
          <div class="input-group">
            <input type="date" class="form-control" id="dateTo" name="dto" required>
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
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