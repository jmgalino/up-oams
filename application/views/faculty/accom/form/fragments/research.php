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
		
		echo ($rch['fund_external'] 
			? $rch['fund_up']
				? ' and UP System Research Grant'.$rch['fund_external'].'. '
				: $rch['fund_external'].'. '
			: 'UP System Research Grant. ');

		echo redate($rch['start'], $rch['end']), '. ';
		
		if ($rch['fund_amount'])
		{
			if ($rch['fund_up'])
				echo 'Php ', number_format(floatval(str_replace(',', '', $rch['fund_amount'])) + floatval(str_replace(',', '', $rch['fund_up'])), 2);
			else
				echo 'Php ', number_format($rch['fund_amount'], 2);
		}
		else
			echo 'Php ', number_format($rch['fund_up'], 2);

		echo '.&nbsp;&nbsp;';
		
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
		
		echo '<a class="btn btn-default" id="updateResearch" research-id="', $rch['research_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_research" role="button" href="" url="', URL::site('faculty/accom/edit/rch/'.$rch['research_ID']), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/rch/'.$rch['research_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>