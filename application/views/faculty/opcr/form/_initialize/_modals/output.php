<div class="modal fade" id="modal_opcr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Target</h4>
      </div>
      <?php print form::open('opcr/add_output', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="form-group">
          <label for="category" class="col-sm-4 control-label">Category</label>
          <div class="col-sm-7">
            <select class="form-control" id= "category" name="category">
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
          <label for="output" class="col-sm-4 control-label">MFO/PAP</label>
          <div class="col-sm-7">
            <textarea class="form-control" id="output" name="output" rows="5" required></textarea>
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