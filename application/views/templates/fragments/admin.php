<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href=<?php echo url::site('site/index'); ?>>OAMS</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="navbar-collapse collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href=<?php echo url::site('admin/users'); ?>>User Accounts</a></li>
				<li><a href=<?php echo url::site('admin/univ'); ?>>University Settings</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href=<?php echo url::site('admin/index'); ?>><span class="glyphicon glyphicon-home"></span></a></li>
				<li><a href=<?php echo url::site('admin/messages'); ?>><span class="glyphicon glyphicon-envelope"></span></a></li>
				<li class="dropdown">
					<a href='' class="dropdown-toggle" data-toggle="dropdown"><?php echo $fname;?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo url::site('admin/profile'); ?>><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
						<li><a href=<?php echo url::site('admin/password'); ?>><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
						<li><a href=<?php echo url::site('site/logout'); ?>><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
						<li class="divider"></li>
						<li><a href=<?php echo url::site('admin/about'); ?>><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
						<li><a href=<?php echo url::site('admin/tutorial'); ?>><span class="glyphicon glyphicon-book"></span> Tutorial</a></li>
					</ul>
				</li>
			</ul>
		</div><!--/.navbar-collapse -->
	</div>
</nav><!-- navbar -->