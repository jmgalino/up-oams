<?php
echo '<h3>II. Award/Grants Received</h3>';

if ($session->get('accom_awd'))
{
	$accom_awd = $session->get('accom_awd');
	
	foreach ($accom_awd as $awd)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $awd['award'], '. ';
		echo $awd['source'], '.';
		echo date_format(date_create($awd['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($awd['end']), 'F d, Y');
		echo '<br>';
	}
}
?>