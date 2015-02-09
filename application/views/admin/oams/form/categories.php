<!-- Update Categories Form -->
<div class="modal fade" id="modal_categories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title" id="myModalLabel">Update IPCR/OPCR Categories</h4>
      </div>

      <?php print Form::open('admin/oams/update/categories', array('class'=>'form-horizontal', 'role'=>'form')); ?>
      <div class="modal-body">
        <?php
        foreach ($categories as $category)
        {
          echo '<div class="form-group">
            <div class="col-md-10 col-md-offset-1">
              <nobr>
                <input type="text" class="form-control" style="display:inline" id="category" name="', $category['category_ID'], '" value="', $category['category'], '" required>
                <a href="#" class="btn removeCategory" role="button"><span class="glyphicon glyphicon-remove "></span></a>
              </nobr>
            </div>
          </div>';
        }
        ?>
        <div id="inputWrapper"></div>

        <div class="form-group">
          <div class="col-md-10 col-md-offset-1">
            <button type="button" class="btn btn-primary" id="addCategory">Add Category</button>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      
      <?php print Form::close();?>
    </div>
  </div>
</div>