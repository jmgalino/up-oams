<?php
echo '<h3>III. Research Grants/Fellowships Received</h3>';
	
if ($session->get('accom_rch'))
{
	$accom_rch = $session->get('accom_rch');
	
	foreach ($accom_rch as $rch)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $rch['title'], '. ';
		echo ($rch['fund_external'] ? $rch['fund_external'].'. ' : 'UP System Research Grant. ');
		echo date_format(date_create($rch['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($rch['end']), 'F d, Y');
		
		echo ($rch['fund_amount'] 
			? $rch['fund_up'] 
				? intval($rch['fund_amount']) + intval($rch['fund_up'])
				: $rch['fund_amount'].'.'
			: $rch['fund_up'].'.');


		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		// if ($rch['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_research" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/rch/'.$rch['research_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>