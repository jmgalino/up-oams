<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Change Password</li>
</ol>

<h3>Change Password</h3>
<br>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Password was successfully changed.
	</p>
</div>
<?php elseif ($error or ($success === FALSE)): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo ($error ? $error : 'Something went wrong. Please try again.'); ?>
	</p>
</div>
<?php endif; ?>

<form action="<?php echo ($identifier == 'admin' ?  URL::site('admin/password') : URL::site('faculty/password')); ?>" class="form-horizontal" autocomplete="off" method="post" role="form">
<div class="form-group">
	<label for="current_password" class="col-md-3 control-label">Current Password</label>
	<div class="col-md-6 current_password">
		<input type="password" class="form-control" id="current_password" name="current_password" required>
		<span id="checkIcon"></span>
		<span class="help-block" id="passwordCheck"></span>
	</div>
</div>

<div class="form-group">
	<label for="new_password" class="col-md-3 control-label">New Password</label>
	<div class="col-md-6 new_password">
		<input type="password" class="form-control" id="new_password" name="new_password" pattern=".{5,}" required>
		<span id="newCheckIcon"></span>
		<span class="help-block" id="newPasswordCheck"></span>
	</div>
</div>

<div class="form-group">
	<label for="confirm_password" class="col-md-3 control-label">Confirm New Password</label>
	<div class="col-md-6 confirm_password">
		<input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
		<span id="matchIcon"></span>
		<span class="help-block" id="passwordMatch"></span>
	</div>
</div>
<br>

<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
		<button type="submit" class="btn btn-primary pull-right">Save Changes</button>
	</div>
</div>
</form>