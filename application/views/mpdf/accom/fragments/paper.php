<?php
echo '<h3>IV. Oral Paper/Poster Presentation</h3>';

if ($session->get('accom_ppr'))
{
	$accom_ppr = $session->get('accom_ppr');
	
	foreach ($accom_ppr as $ppr)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $ppr['title'], '. ';
		echo $ppr['activity'], '. ';
		echo $ppr['venue'], '. ';
		echo date_format(date_create($ppr['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($ppr['end']), 'F d, Y');
		echo '<br>';
	}
}
?>