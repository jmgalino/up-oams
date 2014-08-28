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
		echo date_format(date_create($oth['start']), 'd F Y'), ' to ';
		echo date_format(date_create($oth['end']), 'd F Y'), '.';
		echo '&nbsp;&nbsp;';
		
		if ($oth['attachment'])
		{
			$attachment = explode(' ', $oth['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		// echo '<a id="setAccom" data-toggle="modal" data-target="#modal_other" href='.URL::site('faculty/accom/set/oth/'.$oth['other_ID']).'>
		// 	<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/oth/'.$oth['other_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>