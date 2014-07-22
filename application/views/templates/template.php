<html>
<head>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/sticky-footer.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>application/assets/css/my_code.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo url::base(); ?>assets/less/variables.less" rel="stylesheet">
	<title><?php if(is_null($page_title)) echo 'UP Mindanao OAMS'; else echo $page_title;?></title>
</head>

<body>
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
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo URL::base(); ?>application/assets/js/my_code.js"></script>
</body>
</html>