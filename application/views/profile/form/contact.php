<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Contact Admin</li>
</ol>

<h2>Contact Admin</h2>
<br>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Your message has been sent.
	</p>
</div>
<?php elseif ($success === FALSE): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Something went wrong. Please try it again.
	</p>
</div>
<?php endif; ?>

<form action="<?php echo URL::site("faculty/contact") ?>" class="form-horizontal" method="post" role="form">
<div class="form-group">
	<label for="name" class="col-md-3 control-label">Name</label>
	<div class="col-md-6">
		<p class="form-control-static"><?php echo $fullname; ?></p>
	</div>
</div>

<div class="form-group">
	<label for="subject" class="col-md-3 control-label">Subject</label>
	<div class="col-md-6">
		<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $details['subject']; ?>" required>
	</div>
</div>

<div class="form-group">
	<label for="message" class="col-md-3 control-label">Message</label>
	<div class="col-md-6">
		<textarea class="form-control" id="message" name="message" rows="5" onkeyup="countChar(this)" required><?php echo $details['message']; ?></textarea>
		<span class="help-block" id="charRemaining">You have <strong>255</strong> characters left</span>
	</div>
</div>

<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
		<button type="submit" class="btn btn-primary pull-right" <?php if (!$details['message']) echo 'disabled="disabled"'; ?>>Send Message</button>
	</div>
</div>
</form>
