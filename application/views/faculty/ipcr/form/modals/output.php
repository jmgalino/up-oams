<!-- IPCR - Output Form -->
<div class="modal fade" id="modal_output" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Output</h4>
      </div>

      <?php print Form::open('faculty/ipcr/add/'.$ipcr_details['ipcr_ID'], array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="category" class="col-sm-4 control-label">Category</label>
          <div class="col-sm-7">
            <select class="form-control" id="categoryOutputId" name="category_ID" opcr-id="<?php echo $ipcr_details['opcr_ID']; ?>" ajax-url="<?php echo URL::site('extras/ajax/category_outputs');?>" required>
              <option value="">Select</option>
              <?php
              foreach ($categories as $category)
              {
                echo '<option value="'.$category['category_ID'].'">'.$category['category'].'</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="output" class="col-sm-4 control-label">Output</label>
          <div class="col-sm-7">
            <select class="form-control" id="outputId" name="output_ID" disabled required></select>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'outputSubmit', 'disabled'=>'true')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>