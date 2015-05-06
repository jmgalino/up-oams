<?php
echo '<h4>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h4>';

if ($session->get('accom_par'))
{
	$accom_par = $session->get('accom_par');
	
	foreach ($accom_par as $par)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $par['participation'], '. ';
		echo $par['title'], '. ';
		echo $par['venue'], '. ';
		echo redate($par['start'], $par['end']), '. ';
		echo '&nbsp;&nbsp;';
		
		if ($par['attachment'])
		{
			$attachment = explode(' ', $par['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip link-reverse" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="updateParticipation" participation-id="', $par['participation_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_participation" role="button" href="" action-url="', URL::site('faculty/accom/edit/par/'.$par['participation_ID']), '" ajax-url="', URL::site('extras/ajax/accom_details/par'), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/par/'.$par['participation_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>