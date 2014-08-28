<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet"> <!-- //maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap-datatables.css" rel="stylesheet"> <!-- //cdn.datatables.net/1.10.2/css/jquery.dataTables.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap-datepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/my_code.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo url::base(); ?>application/assets/less/variables.less" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-popover-x/css/bootstrap-popover-x.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>vendor/kartik-v/dependent-dropdown/css/dependent-dropdown.min.css" rel="stylesheet">

	<title><?php echo $page_title;?></title>
</head>

<body>
	<!-- NOT FOOTER -->
	<div id="wrap">
		<div class="container">
			<!-- MASTER NAVIGATION -->
			<?php echo $navbar; ?>

			<!-- PAGE LAYOUT -->
			<?php echo $content; ?>
		</div>
	</div>

	<!-- FOOTER -->
	<div id="footer">
		<div class="container">
			Copyright &copy; <?php echo date('Y'); ?>.<br>
			All Rights Reserved.<br>
			<a href="http://upmin.edu.ph">University of the Philippines Mindanao</a>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery.min.js"></script> <!-- //code.jquery.com/jquery-1.11.1.min.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-datatables.min.js"></script> <!-- //cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-datatables-fnFilterAll.js"></script> <!-- //cdn.datatables.net/plug-ins/725b2a2115b/api/fnFilterAll.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-jeditable.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-number.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap.min.js"></script> <!-- //maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap-datatables.js"></script> <!-- //cdn.datatables.net/1.10.2/js/jquery.dataTables.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/my_code.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-popover-x/js/bootstrap-popover-x.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>vendor/kartik-v/dependent-dropdown/js/dependent-dropdown.min.js"></script>
</body>
</html>