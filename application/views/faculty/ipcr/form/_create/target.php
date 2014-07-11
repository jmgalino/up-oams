<div class="modal fade" id="modal_ipcr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Target</h4>
      </div>

      <?php print form::open('ipcr/add_target', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group" hidden>
          <label for="category" class="col-sm-4 control-label">Category</label>
          <div class="col-sm-7">
            <select class="form-control" id="category" name="category">
              <?php
              $category = $this->site->session->get('category');

              foreach ($category as $c)
              {
                echo '<option value="'.$c->category_ID.'">'.$c->category.'</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="otarget_ID" class="col-sm-4 control-label">Output</label>
          <div class="col-sm-7">
            <select class="form-control" id="otarget_ID" name="otarget_ID">
              <?php
              $outputs = $this->site->session->get('outputs');

              foreach ($outputs as $output)
              {
                echo '<option value="'.$output->otarget_ID.'" id="'.$output->category_ID.'">'.$output->output.'</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <input type="text" name="ipcr_ID" value="<?php echo $this->site->session->get('ipcr_details')['ipcr_ID']; ?>" hidden>

        <div class="form-group">
          <label for="indicator" class="col-sm-4 control-label">Success Indicator</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="indicator" name="indicator" rows="5" required></textarea>
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
