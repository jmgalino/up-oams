<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Contact Admin</li>
</ol>

<h3>Contact Admin</h3>
<br>

<?php if (isset($status)): ?>
<?php if ($status == 1): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Your message has been sent.
	</p>
</div>
<?php endif; ?>
<?php endif; ?>

<?php print form::open('faculty/send_message', array('class'=>'form-horizontal', 'role'=>'form'));?>
<div class="form-group">
	<label for="subject" class="col-sm-1 control-label">Subject</label>
	<div class="col-sm-5">
		<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
	</div>
</div>

<div class="form-group">
	<label for="message" class="col-sm-1 control-label">Message</label>
	<div class="col-sm-5">
		<textarea class="form-control" rows="5" id="message" name="message" placeholder="Message" required></textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-1 control-label"></label>
	<div class="col-sm-3">
        <?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Send')); ?>
	</div>
</div>

<?php print form::close();?>
