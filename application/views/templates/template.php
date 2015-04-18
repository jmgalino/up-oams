<!DOCTYPE html>
<html lang="en" ng-app="oams">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet"> <!-- http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap-datatables.css" rel="stylesheet"> <!-- http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap-datepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/my_code.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/less/variables.less" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-star-rating/css/star-rating.min.css" rel="stylesheet">

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
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/angular.min.js"></script> <!-- https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery.min.js"></script> <!-- http://code.jquery.com/jquery-1.11.1.min.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-blockUI.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-datatables.min.js"></script> <!-- http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-jeditable.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-number.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap.min.js"></script> <!-- http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap-datatables.js"></script> <!-- http://cdn.datatables.net/1.10.2/js/jquery.dataTables.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/datatables-fnFilterAll.js"></script> <!-- http://cdn.datatables.net/plug-ins/725b2a2115b/api/fnFilterAll.js -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/my_code_ajax.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/my_code_angular.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/my_code_init.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>vendor/kartik-v/bootstrap-star-rating/js/star-rating.min.js"></script>
</body>
</html>