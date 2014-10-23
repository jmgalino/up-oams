<?php
echo '<h3>II. Award/Grants Received</h3>';

if ($session->get('accom_awd'))
{
	$accom_awd = $session->get('accom_awd');
	
	foreach ($accom_awd as $awd)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($session->get('accom_type') == 'group')
			echo reuser($awd['user_ID'], $session->get('users')), '. ';
		
		echo $awd['award'], '. ';
		echo redate($awd['start'], $awd['end']), '. ';
		echo $awd['source'], '.';
		echo '&nbsp;&nbsp;';
		
		if ($awd['attachment'])
		{
			$attachment = explode(' ', $awd['attachment']);
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