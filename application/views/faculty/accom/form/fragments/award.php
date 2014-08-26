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
		echo $awd['source'], '. ';
		echo date_format(date_create($awd['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($awd['end']), 'F d, Y');
		echo '&nbsp;&nbsp;';
		
		if ($awd['attachment'])
		{
			$attachment = explode(' ', $awd['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/awd/'.$awd['award_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>