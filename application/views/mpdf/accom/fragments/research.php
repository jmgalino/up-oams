<?php
echo '<h3>III. Research Grants/Fellowships Received</h3>';
	
if ($session->get('accom_rch'))
{
	$accom_rch = $session->get('accom_rch');

	foreach ($accom_rch as $rch)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $rch['title'], '. ';
		
		echo ($rch['fund_external'] 
			? $rch['fund_up']
				? ' and UP System Research Grant'.$rch['fund_external'].'. '
				: $rch['fund_external'].'. '
			: 'UP System Research Grant. ');

		echo date_format(date_create($rch['start']), 'F d, Y'), ' to ';
		echo date_format(date_create($rch['end']), 'F d, Y'), '. ';
		
		echo ($rch['fund_amount'] 
			? $rch['fund_up']
				? number_format(intval($rch['fund_amount']) + intval($rch['fund_up']), 2).'.'
				: number_format($rch['fund_amount'], 2).'.'
			: number_format($rch['fund_up'], 2).'.');
		echo '&nbsp;&nbsp;';
		
		if ($rch['attachment'])
		{
			$attachment = explode(' ', $rch['attachment']);
			$counter = $session->get_once('attachment');
			$attachments = $session->get_once('attachments');

			for ($i = 0; $i < count($attachment); $i++)
			{
				$attachments[++$counter] = $attachment[$i];
				echo '<a class="glyphicon glyphicon-paperclip" href="#attachment_'.$counter.'" target="_blank">',
					'<sup style="padding-left:1px;">[', $counter, ']</sup></a> ';
			}

			$session->set('attachment', $counter);
			$session->set('attachments', $attachments);
		}
		
		echo '</p>';
	}
}
?>