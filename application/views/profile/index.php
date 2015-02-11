<div class="container">
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
			echo '<div class="col-xs-6 col-lg-4">
              <h2>', $announcement['subject'], '</h2>
              <p id="headlines">', $announcement['content'], '</p>
              <p><a class="btn btn-default" href="', URL::site($identifier.'/announcements#'.$announcement['announcement_ID']),'" role="button">View details »</a></p>
            </div>';

            $count++;
            if ($count == 3) break;
		}
		?>
	</div>
	<?php endif; ?>
</div>