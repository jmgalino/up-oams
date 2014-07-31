<!-- "oth" Form -->
<div class="modal fade" id="modal_other" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Other Accomplishments</h4>
      </div>
      <?php print form::open('faculty/accom/add/oth', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-3 control-label">Name</label>
          <div class="col-sm-8">
            <p class="form-control-static"><?php echo $session->get('fullname2'); ?></p>
              <!-- <br><a class="btn btn-primary btn-xs" role="button" href="">
              <span class="glyphicon glyphicon-plus"></span> Add
            </a> -->
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Details</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="details" rows="5" required></textarea>
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