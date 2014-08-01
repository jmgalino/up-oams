<div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <?php if (isset($user)): ?>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
        <?php else: ?>
        <h4 class="modal-title" id="myModalLabel">New Profile</h4>
        <?php endif;?>
      </div>

      <?php
      if (isset($user))
        print form::open('admin/profile/update/'.$user['employee_code'], array('class'=>'form-horizontal', 'role'=>'form'));
      else
        print form::open('admin/profile/new', array('class'=>'form-horizontal', 'role'=>'form'));
      ?>
        <div class="modal-body">
          <div class="radio">
            <label><input type="radio" name="user_type" value="Admin" checked>Administrator</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="user_type" value="Faculty">Faculty</label>
          </div>
          <hr>
          <?php
          echo View::factory('admin/profile/form/fragment')
            ->bind('user', $user)
            ->bind('programs', $programs);
          ?>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php
        if (isset($user))
          print form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary'));
        else
          print form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary'));
        ?>
      </div>
      <?php print form::close();?>
    </div>
  </div>
</div>