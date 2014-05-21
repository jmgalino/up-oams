<div class="modal fade" id="modal_init" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Account</h4>
      </div>

      <?php print form::open('admin/add', array('class'=>'form-horizontal', 'role'=>'form'));?>
      <div class="modal-body">
        <div class="radio">
          <input type="radio" name="type" value="admin" checked>
          Administrator
        </div>
        <div class="radio">
          <input type="radio" name="type" value="faculty">
          Faculty
        </div>
        <hr>
        <?php
        $view = new View('admin/profile/form/_add/fragment');
        $view->bind('programs', $programs);
        $view->render(TRUE);
        ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Add')); ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>