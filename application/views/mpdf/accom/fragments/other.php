<?php
echo '<h3>VIII. Other Accomplishments</h3>';

if ($session->get('accom_oth'))
{
	$accom_oth = $session->get('accom_oth');

	foreach ($accom_oth as $oth)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $oth['participation'], '. ';
		echo $oth['activity'], '. ';
		echo $oth['venue'], '. ';
		echo date_format(date_create($oth['start']), 'd F Y'), ' to ';
		echo date_format(date_create($oth['end']), 'd F Y');
		echo '<br>';
	}
}
?>