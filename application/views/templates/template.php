<html>
<head>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap-datatables.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap-datepicker.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="<?php //echo URL::base(); ?>application/assets/css/bootstrap-select.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/my_code.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo url::base(); ?>assets/less/variables.less" rel="stylesheet">

	<title>UP Mindanao OAMS<?php echo $page_title;?></title>
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
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-jeditable.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap-datatables.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap-datepicker.js"></script>
	<!-- <scrip type="text/javascript" src="<?php //echo URL::base(); ?>application/assets/js/bootstrap-select.min.js"></script> -->
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/my_code.js"></script>
</body>
</html>