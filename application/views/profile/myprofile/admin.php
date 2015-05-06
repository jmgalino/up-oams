<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">My Profile</li>
</ol>

<h3>My Profile</h3>
<br>

<div class="row">
	<div class="col-xs-6 col-md-4">
		<img src="<?php echo ($user['pic'] ? URL::base().'files/upload_photos/'.$user['pic'] : URL::base().'application/assets/img/default.jpg'); ?>" class="img-responsive">
		<br>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">
		<div class="row details">
			<div class="col-xs-6"><strong>Employee Code</strong></div>
			<div class="col-xs-6"><?php echo $user['employee_code']; ?></div>
		</div>
		<br>
		
		<div class="row details">
			<div class="col-xs-6"><strong>Title</strong></div>
			<div class="col-xs-6"><?php echo ($user['title'] ? $user['title'] : '-'); ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>First Name</strong></div>
			<div class="col-xs-6"><?php echo $user['first_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Middle Initial</strong></div>
			<div class="col-xs-6"><?php echo $user['middle_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Last Name</strong></div>
			<div class="col-xs-6"><?php echo $user['last_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Suffix</strong></div>
			<div class="col-xs-6"><?php echo ($user['suffix'] ? $user['suffix'] : '-'); ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Birthday</strong></div>
			<div class="col-xs-6"><?php echo date('F d, Y', strtotime($user['birthday'])); ?></div>
		</div>
	</div>
</div>
