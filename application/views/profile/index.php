<div class="jumbotron">
	<h1><?php echo $title; ?></h1>
	<a class="btn btn-primary btn-lg" role="button" href=<?php echo URL::site('site/about'); ?>>Learn more</a>
</div>

<?php if ($announcements): ?>
<!-- Latest Announcements -->
<div class="row">
	<?php
	$count = 0;
	foreach ($announcements as $announcement)
	{
		if ($identifier == 'admin' AND in_array($announcement['type'], array('coll, dept')))
			continue;

		$id = str_replace (" ", "_", $announcement['subject']);

		echo '<div class="col-xs-6">
			<h3>', $announcement['subject'], '</h3>
			<p id="headlines" style="white-space:pre-wrap;">', $announcement['content'], '</p>
			<p><a class="btn btn-default" href="', URL::site($identifier.'/announcements#'.$id),'" role="button">View details »</a></p>
		</div>';

		$count++;

        if ($count == 2)
        	break;
	}
	?>
</div>
<?php endif; ?>