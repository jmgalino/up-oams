<div class="modal fade" id="modal_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h4>
      </div>
      <?php print form::open('accom/add/mat', array('class'=>'form-horizontal', 'role'=>'form'));?>
        <div class="modal-body">
        <div class="form-group">
          <label for="author" class="col-sm-3 control-label">Author</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="author" name="author" value="<?php echo $this->site->session->get('namefull');?>" readonly>
            <!-- <br><a class="btn btn-primary btn-xs" role="button" href="">
            <span class="glyphicon glyphicon-plus"></span> Add
          </a> -->
        </div>
      </div>

      <div class="form-group">
        <label for="year" class="col-sm-3 control-label">Year</label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="year" name="year" min="2000" max="2050" required>
        </div>
      </div>

      <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Title</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="title" name="title" required>
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