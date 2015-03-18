<?php
echo '<h3>VIII. Other Accomplishments</h3>';

if ($accom_oth)
{
	foreach ($accom_oth as $oth)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($session->get('accom_type') == 'group')
			echo reuser($oth['user_ID'], $session->get('users')), '. ';

		echo $oth['participation'], '. ';
		echo $oth['activity'], '. ';
		echo $oth['venue'], '. ';
		echo redate($oth['start'], $oth['end']), '. ';
		echo '&nbsp;&nbsp;';
		
		if ($oth['attachment'])
		{
			$attachment = explode(' ', $oth['attachment']);
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