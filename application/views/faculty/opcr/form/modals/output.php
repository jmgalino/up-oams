<!-- Output Form -->
<div class="modal fade" id="modal_output" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Target</h4>
      </div>

      <?php print form::open('faculty/opcr/add', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="category" class="col-sm-3 control-label">Category</label>
          <div class="col-sm-8">
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
          <label for="output" class="col-sm-3 control-label">MFO/PAP</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="output" name="output" rows="5" required></textarea>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>

      <?php print form::close();?>
    </div>
  </div>
</div>