<?php
echo '<h3>IV. Oral Paper/Poster Presentation</h3>';

if ($accom_ppr)
{
	foreach ($accom_ppr as $ppr)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($session->get('accom_type') == 'group')
		{
			echo reuser($ppr['user_ID'], $session->get('users'));
			if ($ppr['author']) echo ' and ', $ppr['author'];
			echo '. ';
		}
		else
		{
			if ($ppr['author']) echo $ppr['author'];
			echo '. ';
		}

		echo $ppr['title'], '. ';
		echo $ppr['activity'], '. ';
		echo $ppr['venue'], '. ';
		echo redate($ppr['start'], $ppr['end']), '. ';
		echo '&nbsp;&nbsp;';
		
		if ($ppr['attachment'])
		{
			$attachment = explode(' ', $ppr['attachment']);
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