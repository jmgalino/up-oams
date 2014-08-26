<!-- OPCR - Output Form -->
<div class="modal fade" id="modal_output" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add MFO/PAP</h4>
      </div>

      <?php print Form::open('faculty/opcr/add', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="category" class="col-sm-4 control-label">Category</label>
          <div class="col-sm-7">
            <select class="form-control" id="category" name="category_ID">
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
          <label for="output" class="col-sm-4 control-label">MFO/PAP</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="output" name="output" rows="3" required></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="indicators" class="col-sm-4 control-label">Success Indicators (Targets + Measures)</label>
          
          <div class="col-sm-7" id="indicators">
            <ul class="nav nav-pills nav-justified" role="tablist" id="style">
              <li class="active"><a href="#style1" role="tab" data-toggle="tab">Style 1</a></li>
              <li><a href="#style2" role="tab" data-toggle="tab">Style 2</a></li>
            </ul>

            <div class="tab-content" style="padding-top:5px;">
              <div class="tab-pane active" id="style1">
                <textarea class="form-control style_1" name="targets" rows="2" placeholder="Targets" required></textarea>
                <textarea class="form-control style_1" name="measures" rows="2" placeholder="Measures" style="margin-top:5px;" required></textarea>
              </div>
              <div class="tab-pane" id="style2">
                <textarea class="form-control style_2" name="indicators" rows="3" placeholder="Example: 10% done = 3; 20% done = 4; 30% done = 5"></textarea>
              </div>
            </div>
          </div>
        </div>
        
        <!-- <div class="form-group">
          <label for="accountable" class="col-sm-4 control-label">Accountable</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="accountable" name="accountable" rows="3" required></textarea>
          </div>
        </div> -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>

      <?php print Form::close();?>
    </div>
  </div>
</div>