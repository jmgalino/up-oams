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
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">Accomplishment Report <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo URL::site('faculty/accom'); ?>>View Own</a></li>
						<li><a href=<?php echo URL::site('faculty/accom_coll'); ?>>View College</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown">IPCR <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>View Own</a></li>
						<li><a href=<?php echo URL::site('faculty/ipcr_coll'); ?>>View College</a></li>
					</ul>
				</li>
				<li><a href=<?php echo URL::site('faculty/opcr_coll'); ?>>OPCR</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href=<?php echo URL::site('faculty/announcements'); ?>><span class="glyphicon glyphicon-home"></span></a></li>
				<li><a href=""><span class="glyphicon glyphicon-bell"></span></a></li>
				<li class="dropdown">
					<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $fcode;?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href=<?php echo URL::site('faculty/myprofile'); ?>><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
						<li><a href=<?php echo URL::site('faculty/password'); ?>><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
						<li><a href=<?php echo URL::site('faculty/contact'); ?>><span class="glyphicon glyphicon-envelope"></span> Contact Admin</a></li>
						<li><a href=<?php echo URL::site('logout'); ?>><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
						<li class="divider"></li>
						<li><a href=<?php echo URL::site('faculty/about'); ?>><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
						<li><a href=<?php echo URL::site('faculty/manual'); ?>><span class="glyphicon glyphicon-book"></span> Manual</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>