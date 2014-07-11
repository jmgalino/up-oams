<?php
echo '<h5>III. Research Grants/Fellowships Received</h5>';
	
if ($this->site->session->get('rch_rows'))
{
	$rch_rows = $this->site->session->get('rch_rows');
	
	foreach ($rch_rows as $rch)
	{
		$dfrom = new DateTime($rch->duration_from);
		$dto = new DateTime($rch->duration_to);

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $rch->title, '. ';
		echo $rch->fund_source, '. ';
		echo date_format($dfrom, 'F d, Y'), ' to ';
		echo date_format($dto, 'F d, Y'), '.';
		echo $rch->fund_amount, '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($rch->user == $this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_research" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/rch/'.$rch->research_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/rch/'.$rch->research_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>