<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>

<h1>Contact Us</h1>
<p>Fill out this form and send us your inquiries, comments and suggestions. Thank you.</p><br>

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

<?php print form::open('site/contact', array('class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>'off')); ?>
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
		<?php print form::submit(NULL, 'Send', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
	</div>
</div>

<?php print form::close();?>
