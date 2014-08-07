<?php
echo '<h4>IV. Oral Paper/Poster Presentation</h4>';

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
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		// if ($ppr['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_paper" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/ppr/'.$ppr['paper_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>