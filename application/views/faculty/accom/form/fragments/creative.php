<?php
echo '<h4>V. Presentation of Creative Work Output</h4>';

if ($session->get('accom_ctv'))
{
	$accom_ctv = $session->get('accom_ctv');

	foreach ($accom_ctv as $ctv)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $ctv['title'], '. ';
		echo $ctv['venue'], '. ';
		echo date_format(date_create($ctv['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($ctv['end']), 'F d, Y');
		echo '&nbsp;&nbsp;';
		
		if ($ctv['attachment'])
		{
			$attachment = explode(' ', $ctv['attachment']);
			
			for ($i = 1; $i <= count($attachment); $i++)
			{
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i-1].'" target="_blank"><sup style="padding-left:1px;">', $i, '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		// if ($ctv['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_creative" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/ctv/'.$ctv['creative_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>