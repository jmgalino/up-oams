<?php
echo '<h3>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h3>';

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
		echo date_format(date_create($par['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($par['end']), 'F d, Y'), '.';
		echo '</p>';
	}
}
?>