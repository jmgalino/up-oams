<!-- OPCR - Rate Output Form -->
<div class="modal fade" id="modal_rate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Rate Output</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'rateOpcrForm', 'role'=>'form', 'ajax-url' => URL::site('extras/ajax/check_rating'), 'action-url' => URL::site('faculty/opcr/save/'.$opcr_ID)));?>
      <div class="modal-body">
        <div class="alert alert-danger" style="display:none">
          <p class="text-center" id="invalidMessage"></p>
        </div>

        <div class="form-group">
          <label for="category" class="col-sm-3 control-label">Category</label>
          <div class="col-sm-8">
            <select class="form-control" id="categoryOutputId" opcr-id="<?php echo $opcr_ID ?>" ajax-url="<?php echo URL::site('extras/ajax/category_outputs'); ?>">
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
          <label for="target" class="col-sm-3 control-label">MFO/PAP</label>
          <div class="col-sm-8">
            <select class="form-control rateOutputId" id="outputId" name="output_ID" ajax-url="<?php echo URL::site('extras/ajax/output_details'); ?>" disabled required>
              <option value="">Select</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="indicators" class="col-sm-3 control-label">Success Indicators<br>(Targets + Measures)</label>
          <div class="col-sm-8">
            <p class="form-control-static" id="indicators" name="indicators"></p>
          </div>
        </div>

        <div class="form-group">
          <label for="actual_accom" class="col-sm-3 control-label">Divisions/Individuals Accountable</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="accountable" name="accountable" rows="3" required></textarea>
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
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary', 'id'=>'outputSubmit', 'disabled'=>'true')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>