<div class="modal fade" id="modal_filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Filter Accomplishment Reports</h4>
      </div>
      <?php print form::open('accom/filter', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <input type="text" name="key" value="<?php echo $this->uri->segment(2); ?>" hidden><div class="form-group">
          <label for="smy" class="col-sm-4 control-label">Start (Month & Year)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control c-report" id="smy" name="smy" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="emy" class="col-sm-4 control-label">End (Month & Year)</label>
          <div class="col-sm-4">
            <div class="input-group">
              <input type="month" class="form-control c-report" id="emy" name="emy" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Filter')); ?>
      </div>
      <?php print form::close();?><!-- form -->
    </div>
  </div>
</div>