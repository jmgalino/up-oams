<?php
$ipcr_attachments = $session->get_once('attachments');

if ($ipcr_attachments)
{
	echo '<pagebreak />';
	echo '<p>Attachments</p><br>';

	$counter = 0;

	foreach ($ipcr_attachments as $attachment)
	{
		$counter++;
		echo '<a name="attachment_'.$counter.'">[', $counter, ']<a/><br>';

		$attachments = explode('; ', $attachment);
		foreach ($attachments as $attachment)
		{
			$tmp1 = explode(' => ', $attachment);
			echo '<img src="'.URL::base().'files/upload_attachments/'.$tmp1[1].'" max-height="750" max-width="500" style="vertical-align: text-top;"><br>';
		}
	}
}
?>