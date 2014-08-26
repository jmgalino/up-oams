<?php
echo '<h3>V. Presentation of Creative Work Output</h3>';

if ($session->get('accom_ctv'))
{
	$accom_ctv = $session->get('accom_ctv');
	
	foreach ($accom_ctv as $ctv)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $ctv['title'], '. ';
		echo $ctv['venue'], '. ';
		echo date_format(date_create($ctv['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($ctv['end']), 'F d, Y');
		echo '&nbsp;&nbsp;';
		
		if ($ctv['attachment'])
		{
			$attachment = explode(' ', $ctv['attachment']);
			$counter = $session->get_once('attachment');
			$attachments = $session->get_once('attachments');

			for ($i = 0; $i < count($attachment); $i++)
			{
				$attachments[++$counter] = $attachment[$i];
				echo '<a class="glyphicon glyphicon-paperclip" href="#attachment_'.$counter.'" target="_blank">',
					'<sup style="padding-left:1px;">[', $counter, ']</sup></a> ';
			}

			$session->set('attachment', $counter);
			$session->set('attachments', $attachments);
		}
		echo '</p>';
	}
}
?>