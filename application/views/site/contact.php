<h1>Contact Us</h1>
<p>Let us know if you have inquiries, comments and suggestions by filling out this form. Thank you.</p><br>

<?php if ((isset($error)) AND ($error == 'bot')): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		You're a bot!
	</p>
</div>
<?php elseif ((isset($sucess)) AND ($sucess == 1)): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Your message has been sent.
	</p>
</div>
<?php endif; ?>

<?php print form::open('site/contact/send', array('class'=>'form-horizontal', 'role'=>'form'));?>
<div class="form-group">
	<label for="name" class="col-sm-1 control-label">Name</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="name" name="name" required>
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-sm-1 control-label">Email</label>
	<div class="col-sm-3">
		<input type="email" class="form-control" id="email" name="email" required>
	</div>
</div>

<div class="form-group">
	<label for="subject" class="col-sm-1 control-label">Subject</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="subject" name="subject" required>
	</div>
</div>

<div class="form-group">
	<label for="message" class="col-sm-1 control-label">Message</label>
	<div class="col-sm-4">
		<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
	</div>
</div>

<div class="form-group">
	<label for="captcha" class="col-sm-1 control-label">Verification Code</label>
	<div class="col-sm-3">	
		<?php echo $captcha->render(); ?><br><br>
		<input type="text" class="form-control" id="captcha" name="captcha" required>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-1 control-label"></label>
	<div class="col-sm-3">
		<?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Send')); ?>
	</div>
</div>

<?php print form::close();?>
