<!-- CU Management Assessment Form Form -->
<div class="modal fade" id="modal_cuma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New CU Management Assessment Form</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id' => 'newForm', 'role'=>'form', 'action-url' => URL::site('faculty/cuma/new'), 'ajax-url' => URL::site('ajax/check_date')));?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="invalidMessage"></p>
        </div>

        <div class="form-group">
          <label for="cuma-period" class="col-sm-4 control-label">Period</label>
          <div class="col-sm-6" id="cuma-period">
            <div class="input-daterange input-group">
              <input type="text" class="form-control" name="start">
              <span class="input-group-addon">-</span>
              <input type="text" class="form-control" name="end">
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Generate', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      <?php print Form::close();?>
    </div>
  </div>
</div>