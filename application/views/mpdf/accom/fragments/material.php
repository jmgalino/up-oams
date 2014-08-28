<?php
echo'<h3>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h3>';

if ($session->get('accom_mat'))
{
	$accom_mat = $session->get('accom_mat');
	
	foreach ($accom_mat as $mat)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($mat['author']) echo $mat['author'], '. ';
		
		echo $mat['year'], '. ';
		echo $mat['title'], '.';
		echo '&nbsp;&nbsp;';
		
		if ($mat['attachment'])
		{
			$attachment = explode(' ', $mat['attachment']);
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