<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Contact Admin</li>
</ol>

<h3>Contact Admin</h3>
<br>

<?php if (isset($error)): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Error.
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
	<label class="col-sm-1 control-label"></label>
	<div class="col-sm-3">
		<?php print form::submit(NULL, 'Send', array('type'=>'submit', 'class'=>'btn btn-primary')); ?>
	</div>
</div>

<?php print form::close();?>
