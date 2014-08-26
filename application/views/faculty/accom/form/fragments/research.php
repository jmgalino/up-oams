<?php
echo '<h4>III. Research Grants/Fellowships Received</h4>';
	
if ($session->get('accom_rch'))
{
	$accom_rch = $session->get('accom_rch');
	
	foreach ($accom_rch as $rch)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $rch['title'], '. ';
		
		echo ($rch['fund_amount'] 
			? $rch['fund_up']
				? $rch['fund_external'].' and UP System Research Grant. '
				: $rch['fund_external'].'. '
			: 'UP System Research Grant. ');

		echo date_format(date_create($rch['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($rch['end']), 'F d, Y'), '. ';
		
		echo ($rch['fund_amount'] 
			? $rch['fund_up']
				? number_format(intval($rch['fund_amount']) + intval($rch['fund_up']), 2).'. '
				: number_format($rch['fund_amount'], 2).'.'
			: number_format($rch['fund_up'], 2).'.');
		echo '&nbsp;&nbsp;';
		
		if ($rch['attachment'])
		{
			$attachment = explode(' ', $rch['attachment']);
			
			for ($i = 0; $i < count($attachment); $i++)
			{
				$session->set('attachment', $session->get_once('attachment')+1);
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i].'" target="_blank">',
					'<sup style="padding-left:1px;">', $session->get('attachment'), '</sup></a> ';	
			}
		}

		echo '&nbsp;&nbsp;&nbsp;';

		// if ($rch['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_research" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/rch/'.$rch['research_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';

	}
}
?>