<?php
echo '<h3>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h3>';

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
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($par['user_ID'] == $session->get('user_ID'))
		{
			echo '<a data-toggle="modal" data-target="#modal_participation" role="button" href="">',
				'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		}
		
		echo '<a href='.URL::site('faculty/accom/remove/par/'.$par['participation_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>