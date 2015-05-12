<div class="container">

<?php
if(isset($error))
{
	echo
	'<div class="alert alert-danger">
		<p class="text-center">', $error, '</p>
	</div>';
}
?>
	<div class="jumbotron">
		<h1><?php echo $title; ?></h1>
		<p>Welcome! Please sign in to proceed.</p>
		<a class="btn btn-primary btn-lg" role="button" href=<?php echo URL::site('site/about'); ?>>Learn more</a>
	</div>
</div>