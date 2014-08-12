<?php
echo '<h4>VIII. Other Accomplishments</h4>';

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
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="setAccom" data-toggle="modal" data-target="#modal_other" role="button" href='.URL::site('faculty/accom/set/oth/'.$oth['other_ID']).'>
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" href='.URL::site('faculty/accom/remove/oth/'.$oth['other_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>