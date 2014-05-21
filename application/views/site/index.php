<?php
if(isset($error))
{
	echo '<div class="alert alert-danger"><p class="text-center">', $error, '</p></div>';
}
?>

<div class="container">
	<div class="jumbotron">
		<h1>Online Accomplishment Management System</h1>
		<p>Welcome! Please sign in to proceed.</p>
		<a class="btn btn-primary btn-lg" role="button" href=<?php echo url::site('site/about'); ?>>Learn more</a>
	</div>
</div>