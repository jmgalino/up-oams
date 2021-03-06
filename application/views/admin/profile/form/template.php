<!-- New/Update Profile Form -->
<div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modalProfileLabel">New Profile</h4>
      </div>

      <?php print Form::open('', array('class'=>'form-horizontal', 'id'=>'profileForm', 'role'=>'form', 'ajax-url'=>URL::site('extras/ajax/unique/new_user'))); ?>
      <div class="modal-body">

        <?php if ($programs): ?>
        <div class="radio">
          <label>
            <input type="radio" name="user_type" id="adminType" value="Admin" required>
            Administrator
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="user_type" id="facultyType" value="Faculty" required>
            Faculty
          </label>
        </div>

        <?php else: ?>
        <div class="radio">
          <label>
            <input type="radio" name="user_type" value="Admin" checked required>
            Administrator
          </label>
        </div>
        <div class="radio disabled">
          <label data-toggle="tooltip" data-placement="right" title="Requires academic program">
            <input type="radio" name="user_type" id="facultyType" value="Faculty" disabled>
            Faculty
          </label>
        </div>

        <?php endif; ?>
        <hr>
        <?php echo View::factory('admin/profile/form/fragment')->bind('programs', $programs); ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <?php print Form::submit(NULL, 'Add', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
      </div>
      </form>
    </div>
  </div>
</div>