<?php
echo '<h4>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h4>';

if ($session->get('accom_par'))
{
	$accom_par = $session->get('accom_par');
	
	foreach ($accom_par as $par)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $par['participation'], '. ';
		echo $par['title'], '. ';
		echo $par['venue'], '. ';
		echo date_format(date_create($par['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($par['end']), 'F d, Y');
		echo '&nbsp;&nbsp;';
		
		if ($par['attachment'])
		{
			$attachment = explode(' ', $par['attachment']);
			
			for ($i = 1; $i <= count($attachment); $i++)
			{
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i-1].'" target="_blank"><sup style="padding-left:1px;">', $i, '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		// if ($par['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_participation" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/par/'.$par['participation_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>