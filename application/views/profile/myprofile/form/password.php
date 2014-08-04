<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Change Password</li>
</ol>

<?php if ($change): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully changed.
	</p>
</div>
<?php endif; ?>

<h3>Change Password</h3>
<br>

<?php print form::open('user/password', array('class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>'off')); ?>
<div class="form-group">
	<label for="current_password" class="col-sm-3 control-label">Current Password</label>
	<div class="col-sm-3">
		<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password" required>
	</div>
</div>

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
	<div class="col-sm-3">
        <?php print form::submit(NULL, 'Save', array('type'=>'submit', 'class'=>'btn btn-primary pull-right')); ?>
	</div>
</div>

<?php print form::close(); ?>