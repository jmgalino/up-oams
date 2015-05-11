<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Announcements - <?php echo date('F Y'); ?></li>
</ol>

<h2>Announcements</h2>
<br>

<?php
$counter = 0;

if ($announcements)
{
	foreach ($announcements as $announcement)
	{
		$id = str_replace (" ", "_", $announcement['subject']);
		
		$details = date('F d, Y \a\t h:i A', strtotime($announcement['date']));

		if ($announcement['edited'])
			$details .= ' · Edited';

		if ($identifier != 'admin')
		{
			if ($announcement['type'] == 'coll')
				$details .= ' ('.$college_details['short'].')';

			if ($announcement['type'] == 'dept')
				$details .= ' ('.$department_details['short'].')';
		}

		echo '<div class="announcement-header" id="', $id, '">
			<h4>', $announcement['subject'], '</h4>
			<p style="font-size:12px">', $details, '</p>
			</div>
			<p style="white-space:pre-wrap; padding-bottom:10px">', $announcement['content'], '</p>
			<hr class="announcement-divider" style="border-top:2px dotted #7b1113; padding-bottom:10px">';
	}
}
?>