<?php
echo '<h4>VIII. Other Accomplishments</h4>';

if ($session->get('accom_oth'))
{
	$accom_oth = $session->get('accom_oth');

	foreach ($accom_oth as $oth)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $oth['participation'], '. ';
		echo $oth['activity'], '. ';
		echo $oth['venue'], '. ';
		echo redate($oth['start'], $oth['end']), '. ';
		echo '&nbsp;&nbsp;';
		
		if ($oth['attachment'])
		{
			$attachment = explode(' ', $oth['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip link-reverse" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="updateOther" other-id="', $oth['other_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_other" role="button" href="" action-url="', URL::site('faculty/accom/edit/oth/'.$oth['other_ID']), '" ajax-url="', URL::site('extras/ajax/accom_details/oth'), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/oth/'.$oth['other_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>