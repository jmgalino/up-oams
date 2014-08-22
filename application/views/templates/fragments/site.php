<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href=<?php echo URL::site(); ?>><?php echo $label; ?></a>
		</div>

		<div class="navbar-collapse collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href=<?php echo URL::site(); ?>>Home</a></li>
				<li><a href=<?php echo URL::site('site/about'); ?>>About</a></li>
				<li><a href=<?php echo URL::site('site/contact'); ?>>Contact</a></li>
			</ul>
			<?php print form::open('login', array('class'=>'navbar-form navbar-right', 'role'=>'form'));?>
			<div class="form-group">
				<input type="text" class="form-control" name="employee_code" placeholder="Employee Code">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<?php print form::submit(NULL, 'Sign in', array('type'=>'submit', 'class'=>'btn btn-success')); ?>
			</div>
			<?php print form::close();?>
		</div>
	</div>
</nav>