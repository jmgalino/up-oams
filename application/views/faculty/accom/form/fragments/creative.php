<?php
echo '<h4>V. Presentation of Creative Work Output</h4>';

if ($session->get('accom_ctv'))
{
	$accom_ctv = $session->get('accom_ctv');

	foreach ($accom_ctv as $ctv)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($ctv['author']) echo $ctv['author'], '. ';

		echo $ctv['title'], '. ';
		echo $ctv['venue'], '. ';
		echo redate($ctv['start'], $ctv['end']), '. ';
		echo '&nbsp;&nbsp;';
		
		if ($ctv['attachment'])
		{
			$attachment = explode(' ', $ctv['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip link-reverse" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="updateCreative" creative-id="', $ctv['creative_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_creative" role="button" href="" action-url="', URL::site('faculty/accom/edit/ctv/'.$ctv['creative_ID']), '" ajax-url="', URL::site('extras/ajax/accom_details/ctv'), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/ctv/'.$ctv['creative_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>