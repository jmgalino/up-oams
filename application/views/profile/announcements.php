<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Announcements</li>
</ol>

<h2><?php echo date('F Y'); ?></h2>
<br>
<?php
$counter = 0;

if ($announcements)
{
	foreach ($announcements as $announcement)
	{
		$id = str_replace (" ", "_", $announcement['subject']);
		
		echo '
		<div class="page-header" id="', $id, '">
			<h4>', $announcement['subject'], '</h4>
			<p style="font-size:12px">', date('F d, Y \a\t h:i A', strtotime($announcement['date']));

		if ($announcement['edited'])
			echo ' · Edited';

		echo '</div>
			<p>', $announcement['content'], '</p>';

		// Show attachment here

		// $counter++;
		// if ($counter < count($announcements))
		// 	echo '<hr>';
	}
}
?>