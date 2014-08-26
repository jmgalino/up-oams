<!-- New/Update Profile Form -->
<div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo ($user ? 'Edit' : 'New'); ?> Profile</h4>
      </div>

      <?php
      $url = ($user ? 'admin/profile/update/'.$user['employee_code'] : 'admin/profile/new');
      print Form::open($url, array('class'=>'form-horizontal', 'role'=>'form'));
      ?>
      <div class="modal-body">
        <div class="radio">
          <label>
            <input type="radio" name="user_type" id="user_type" value="Admin" <?php if (($user) AND ($user['user_type'] == 'Admin')) echo 'checked'; ?> required>
            Administrator
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="user_type" id="user_type" value="Faculty" <?php if (($user) AND ($user['user_type'] == 'Faculty')) echo 'checked'; ?> required>
            Faculty
          </label>
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
        $button = ($user ? 'Save' : 'Add');
        print Form::submit(NULL, $button, array('type'=>'submit', 'class'=>'btn btn-primary'));
        ?>
      </div>
      <?php print Form::close();?>
    </div>
  </div>
</div>