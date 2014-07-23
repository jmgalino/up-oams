<ol class="breadcrumb">
  <li><a href=<?php echo url::site($this->site->session->get('user_type').'/index'); ?>>Home</a></li>
  <li class="active">Change Password</li>
</ol>

<h3>Change Password</h3>
<br>

<?php if ((isset($status)) AND ($status == 1)): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully changed.
	</p>
</div>
<?php endif; ?>

<?php print form::open($this->site->session->get('user_type').'/password_change', array('class'=>'form-horizontal', 'role'=>'form'));?>

<!-- <div class="form-group">
	<label for="current_password" class="col-sm-3 control-label">Current Password</label>
	<div class="col-sm-3">
		<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" required>
	</div>
</div> -->

<div class="form-group">
	<label for="new_password" class="col-sm-3 control-label">New Password</label>
	<div class="col-sm-3">
		<input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
	</div>
</div>

<div class="form-group">
	<label for="new_password_verify" class="col-sm-3 control-label">Confirm New Password</label>
	<div class="col-sm-3">
		<input type="password" class="form-control" id="new_password_verify" name="new_password_verify" placeholder="New Password" required>
	</div>
</div>
<br>

<div class="form-group">
	<label class="col-sm-3 control-label"></label>
	<div class="col-sm-2">
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Change Password')); ?>
	</div>
</div>

<?php print form::close();?>

</form><!-- form -->
