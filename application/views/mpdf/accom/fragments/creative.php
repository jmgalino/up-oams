<?php
echo '<h3>V. Presentation of Creative Work Output</h3>';

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
		echo '<br>';
	}
}
?>