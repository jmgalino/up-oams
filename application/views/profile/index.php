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
			$id = str_replace (" ", "_", $announcement['subject']);

			echo '
			<div class="col-xs-6">
              <h2>', $announcement['subject'], '</h2>
              <p id="headlines" style="white-space:pre-wrap;">', $announcement['content'], '</p>
              <p><a class="btn btn-default" href="', URL::site($identifier.'/announcements#'.$id),'" role="button">View details »</a></p>
            </div>';

            $count++;
            if ($count == 2) break;
		}
		?>
	</div>
	<?php endif; ?>
</div>