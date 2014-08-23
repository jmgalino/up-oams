<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('faculty/opcr_college'); ?>>College's OPCR Forms</a></li>
  <li><a href=<?php echo url::site('opcr/view_college/'.$opcr_ID); ?>>View OPCR Form</a></li>
  <li><a href=<?php echo url::site('opcr/evaluate/'.$opcr_ID); ?>>Evaluate OPCR</a></li>
  <li class="active">Evaluate Target</li>
</ol>

<?php print form::open('opcr/save_evaluation/'.$opcr_ID.'/'.$itarget_ID, array('class'=>'form-horizontal', 'role'=>'form'));?>
<div class="form-group">
  <label for="output" class="col-sm-2 control-label">Output</label>
  <div class="col-sm-5">
    <textarea class="form-control" id="output" name="output" rows="5" placeholder="<?php echo $target->output; ?>" readonly></textarea>
  </div>
</div>

<div class="form-group">
  <label for="indicator" class="col-sm-2 control-label">Success Indicator</label>
  <div class="col-sm-5">
    <textarea class="form-control" id="indicator" name="indicator" rows="5" placeholder="<?php echo $target->indicator; ?>" readonly></textarea>
  </div>
</div>

<div class="form-group">
  <label for="accountable" class="col-sm-2 control-label">Divisions/Individual Accountable</label>
  <div class="col-sm-5">
    <textarea class="form-control" id="accountable" name="accountable" rows="5" placeholder="<?php echo $target->accountable; ?>" readonly></textarea>
  </div>
</div>

<div class="form-group">
  <label for="quantity" class="col-sm-2 control-label">Quantity</label>
  <div class="col-sm-5">
    <select class="form-control" id= "quantity" name="quantity">
      <option value="Outstanding">Outstanding</option>
      <option value="Very Satisfactory">Very Satisfactory</option>
      <option value="Satisfactory">Satisfactory</option>
      <option value="Unsatisfactory">Unsatisfactory</option>
      <option value="Poor">Poor</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="efficiency" class="col-sm-2 control-label">Efficiency</label>
  <div class="col-sm-5">
    <select class="form-control" id= "efficiency" name="efficiency">
      <option value="Outstanding">Outstanding</option>
      <option value="Very Satisfactory">Very Satisfactory</option>
      <option value="Satisfactory">Satisfactory</option>
      <option value="Unsatisfactory">Unsatisfactory</option>
      <option value="Poor">Poor</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="timeliness" class="col-sm-2 control-label">Timeliness</label>
  <div class="col-sm-5">
    <select class="form-control" id= "timeliness" name="timeliness">
      <option value="Outstanding">Outstanding</option>
      <option value="Very Satisfactory">Very Satisfactory</option>
      <option value="Satisfactory">Satisfactory</option>
      <option value="Unsatisfactory">Unsatisfactory</option>
      <option value="Poor">Poor</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="average" class="col-sm-2 control-label">Average</label>
  <div class="col-sm-5">
    <select class="form-control" id= "average" name="average">
      <option value="Outstanding">Outstanding</option>
      <option value="Very Satisfactory">Very Satisfactory</option>
      <option value="Satisfactory">Satisfactory</option>
      <option value="Unsatisfactory">Unsatisfactory</option>
      <option value="Poor">Poor</option>
    </select>
  </div>
</div>

<?php if (isset($target->remarks)): ?>
<div class="form-group">
  <label for="remarks" class="col-sm-2 control-label">Remarks</label>
  <div class="col-sm-5">
    <input type="text" class="form-control" id="remarks" name="remarks" rows="5" value="<?php echo $target->remarks; ?>">
    <!-- <textarea class="form-control" id="remarks" name="remarks" rows="5" value="<?php echo $target->remarks; ?>"></textarea> -->
  </div>
</div>
<?php else: ?>
<div class="form-group">
  <label for="remarks" class="col-sm-2 control-label">Remarks</label>
  <div class="col-sm-5">
    <input type="text" class="form-control" id="remarks" name="remarks" rows="5" placeholder="(Optional)">
    <!-- <textarea class="form-control" id="remarks" name="remarks" rows="5" placeholder="(Optional)"></textarea> -->
  </div>
</div>
<?php endif; ?>
<div class="form-group">
  <div class="col-sm-5 col-sm-offset-2">
    <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Save Evaluation')); ?>
  </div>
</div>

<?php print form::close();?><!-- form -->
