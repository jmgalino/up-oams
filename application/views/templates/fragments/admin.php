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
				<li><a href=<?php echo URL::site('admin/profile'); ?>>User Profiles</a></li>
				<li class="dropdown">
					<a href=<?php echo URL::site('admin/university'); ?> class="dropdown-toggle disabled" data-toggle="dropdown">University Settings</a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo URL::site('admin/university/colleges'); ?>>Colleges</a></li>
						<li><a href=<?php echo URL::site('admin/university/departments'); ?>>Departments</a></li>
						<li><a href=<?php echo URL::site('admin/university/programs'); ?>>Degree Programs</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href=<?php echo URL::site('admin/oams'); ?> class="dropdown-toggle disabled" data-toggle="dropdown">OAMS Settings</a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo URL::site('admin/oams/announcements'); ?>>Announcements</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href=<?php echo URL::site('admin/announcements'); ?>><span class="glyphicon glyphicon-home"></span></a></li>
				<li><a href=<?php echo URL::site('admin/messages'); ?>><span class="glyphicon glyphicon-envelope <?php echo ($messages ? 'notify' : NULL);?>"></span><span class="badge pull-right"><?php echo ($messages ? $messages : NULL);?></span></a></li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $fname;?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo URL::site('admin/myprofile'); ?>><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
						<li><a href=<?php echo URL::site('admin/password'); ?>><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
						<li><a href=<?php echo URL::site('admin/messages'); ?>><span class="glyphicon glyphicon-envelope"></span> View Messages</a></li>
						<li><a href=<?php echo URL::site('logout'); ?>><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
						<li class="divider"></li>
						<li><a href=<?php echo URL::site('admin/about'); ?>><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
						<li><a href=<?php echo URL::site('admin/manual'); ?>><span class="glyphicon glyphicon-book"></span> Manual</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>