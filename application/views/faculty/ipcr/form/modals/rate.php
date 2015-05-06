<!-- IPCR - Rate Target Form -->
<div class="modal fade" id="modal_rate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Rate Target</h4>
      </div>

      <?php print Form::open('faculty/ipcr/save/'.$ipcr_ID, array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="category" class="col-sm-3 control-label">Category</label>
          <div class="col-sm-8">
            <select class="form-control" id="categoryTargetId" ipcr-id="<?php echo $ipcr_ID ?>" ajax-url="<?php echo URL::site('extras/ajax/category_targets'); ?>" required>
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
          <label for="target" class="col-sm-3 control-label">Target</label>
          <div class="col-sm-8">
            <select class="form-control" id="targetId" name="target_ID" ajax-url="<?php echo URL::site('extras/ajax/target_details'); ?>" disabled required>
              <option value="">Select</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="indicators" class="col-sm-3 control-label">Success Indicators</label>
          <div class="col-sm-8">
            <p class="form-control-static" id="indicators" name="indicators"></p>
          </div>
        </div>

        <div class="form-group">
          <label for="actual_accom" class="col-sm-3 control-label">Actual Accomplishments</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="actual_accom" name="actual_accom" rows="3" required></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="r_quantity" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="r_quantity" name="r_quantity" required>
          </div>
        </div>

        <div class="form-group">
          <label for="r_efficiency" class="col-sm-3 control-label">Efficiency</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="r_efficiency" name="r_efficiency" required>
          </div>
        </div>

        <div class="form-group">
          <label for="r_timeliness" class="col-sm-3 control-label">Timeliness</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="r_timeliness" name="r_timeliness" required>
          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-sm-3 control-label">Remarks</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="remarks" name="remarks" required>
          </div>
        </div>

        <div class="form-group">
          <label for="attachment" class="col-sm-3 control-label">Attachment(s)</label>
          <div class="col-sm-8" id="add-attachment">
            <input type="file" id="ipcr-attachment" name="attachment[]" accept="image/*" multiple="true" required>
            <span class="help-block">You can add up to 5 attachments.</span>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'targetSubmit')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>