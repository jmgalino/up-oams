<?php
echo '<h4>II. Award/Grants Received</h4>';

if ($session->get('accom_awd'))
{
	$accom_awd = $session->get('accom_awd');

	foreach ($accom_awd as $awd)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $awd['award'], '. ';
		echo redate($awd['start'], $awd['end']), '. ';
		echo $awd['source'], '.';
		echo '&nbsp;&nbsp;';
		
		if ($awd['attachment'])
		{
			$attachment = explode(' ', $awd['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip link-reverse" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="updateAward" award-id="', $awd['award_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_award" role="button" href="" action-url="', URL::site('faculty/accom/edit/awd/'.$awd['award_ID']), '" ajax-url="', URL::site('ajax/accom_details/awd'), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/awd/'.$awd['award_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>