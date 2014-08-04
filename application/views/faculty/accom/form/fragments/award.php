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
		echo $awd->award, '. ';
		echo $awd->source, '.';
		echo date_format(date_create($awd['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($awd['end']), 'F d, Y');
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		if ($awd['user_ID'] == $session->get('user_ID'))
		{
			echo '<a data-toggle="modal" data-target="#modal_award" role="button" href="">',
				'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		}
		
		echo '<a href='.URL::site('faculty/accom/remove/awd/'.$awd['award_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>