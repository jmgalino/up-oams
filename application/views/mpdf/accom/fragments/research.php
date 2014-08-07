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
		
		echo '<br>';
	}
}
?>