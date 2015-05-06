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
		echo redate($ppr['start'], $ppr['end']), '. ';
		echo '&nbsp;&nbsp;';
		
		if ($ppr['attachment'])
		{
			$attachment = explode(' ', $ppr['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip link-reverse" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="updatePaper" paper-id="', $ppr['paper_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_paper" role="button" href="" action-url="', URL::site('faculty/accom/edit/ppr/'.$ppr['paper_ID']), '" ajax-url="', URL::site('extras/ajax/accom_details/ppr'), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/ppr/'.$ppr['paper_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>