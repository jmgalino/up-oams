<script type="text/javascript">
var RecaptchaOptions = {
	theme : 'white'
};
 </script>

<h1>Contact Us</h1>
<p>Fill out this form and send us your inquiries, comments and suggestions. Thank you.</p><br>

<?php if ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		The reCAPTCHA wasn't entered correctly. Try it again.
	</p>
</div>
<?php elseif ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Got it. We'll get back to you ASAP!
	</p>
</div>
<?php endif; ?>

<?php print form::open('site/contact', array('class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>'off')); ?>
<div class="form-group">
	<label for="name" class="col-sm-1 control-label">Name</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="name" name="name" value="<?php echo $details['name']?>" required>
	</div>
</div>

<div class="form-group">
	<label for="email" class="col-sm-1 control-label">Email</label>
	<div class="col-sm-3">
		<input type="email" class="form-control" id="email" name="email" value="<?php echo $details['email']?>" required>
	</div>
</div>

<div class="form-group">
	<label for="subject" class="col-sm-1 control-label">Subject</label>
	<div class="col-sm-3">
		<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $details['subject']?>" required>
	</div>
</div>

<div class="form-group">
	<label for="message" class="col-sm-1 control-label">Message</label>
	<div class="col-sm-4">
		<textarea class="form-control" id="message" name="message" rows="5" onkeyup="countChar(this)" required><?php echo $details['message']?></textarea>
		<span class="help-block" id="charRemaining">You have <strong>255</strong> characters left</span>
	</div>
</div>

<div class="form-group">
	<label for="captcha" class="col-sm-1 control-label">Verification Code</label>
	<div class="col-sm-3">
	<?php
		require_once('application/assets/lib/recaptchalib.php');
		$publickey = "6Lc2pPYSAAAAAOmXjjKt3zcGjH88OeGSy90-T5xe";
		echo recaptcha_get_html($publickey);
	?>
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

<?php print form::close(); ?>
