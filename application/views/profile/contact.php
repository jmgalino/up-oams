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
<?php elseif ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Something went wrong. Please try it again.
	</p>
</div>
<?php endif; ?>

<?php print form::open('faculty/contact', array('class'=>'form-horizontal', 'role'=>'form'));?>
<div class="form-group">
	<label for="name" class="col-sm-1 control-label">Name</label>
	<div class="col-sm-3">
		<p class="form-control-static"><?php echo $fullname; ?></p>
	</div>
</div>

<div class="form-group">
	<label for="subject" class="col-sm-1 control-label">Subject</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $details['subject']; ?>" required>
	</div>
</div>

<div class="form-group">
	<label for="message" class="col-sm-1 control-label">Message</label>
	<div class="col-sm-4">
		<textarea class="form-control" id="message" name="message" rows="5" onkeyup="countChar(this)" required><?php echo $details['message']; ?></textarea>
		<span class="help-block" id="charRemaining">You have <strong>255</strong> characters left</span>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-1 control-label"></label>
	<div class="col-sm-3">
		<?php
		if ($details['message'])
			print form::submit(NULL, 'Send', array('type'=>'submit', 'class'=>'btn btn-primary'));
		else
			print form::submit(NULL, 'Send', array('type'=>'submit', 'class'=>'btn btn-primary', 'disabled'=>'disabled'));
		?>
	</div>
</div>

<?php print form::close();?>
