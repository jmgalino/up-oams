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

		if ($session->get('accom_type') == 'group')
		{
			echo reuser($ctv['user_ID'], $session->get('users'));
			if ($ctv['author']) echo ' and ', $ctv['author'], '. ';
		}
		else
		{
			if ($ctv['author']) echo $ctv['author'], '. ';
		}

		echo $ctv['title'], '. ';
		echo $ctv['venue'], '. ';
		echo redate($ctv['start'], $ctv['end']), '. ';
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