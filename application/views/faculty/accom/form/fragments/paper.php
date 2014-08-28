<?php
echo '<h4>IV. Oral Paper/Poster Presentation</h4>';

if ($session->get('accom_ppr'))
{
	$accom_ppr = $session->get('accom_ppr');
	
	foreach ($accom_ppr as $ppr)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($ppr['author']) echo $ppr['author'], '. ';

		echo $ppr['title'], '. ';
		echo $ppr['activity'], '. ';
		echo $ppr['venue'], '. ';
		echo date_format(date_create($ppr['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($ppr['end']), 'F d, Y'), '.';
		echo '&nbsp;&nbsp;';
		
		if ($ppr['attachment'])
		{
			$attachment = explode(' ', $ppr['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		// if ($ppr['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_paper" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/ppr/'.$ppr['paper_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>