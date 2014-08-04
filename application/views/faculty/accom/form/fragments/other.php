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
		echo date_format(date_create($oth['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($oth['end']), 'F d, Y');
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		if ($oth['user_ID'] == $session->get('user_ID'))
		{
			echo '<a data-toggle="modal" data-target="#modal_other" role="button" href="">',
				'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		}
		
		echo '<a href='.URL::site('faculty/accom/remove/oth/'.$oth['other_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>