<?php
echo '<h5>II. Award/Grants Received</h5>';

if ($this->site->session->get('awd_rows'))
{
	$awd_rows = $this->site->session->get('awd_rows');
	
	foreach ($awd_rows as $awd)
	{
		$dfrom = new DateTime($awd->duration_from);
		$dto = new DateTime($awd->duration_to);

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $awd->award, '. ';
		echo date_format($dfrom, 'F d, Y'), ' to ';
		echo date_format($dto, 'F d, Y'), '. ';
		echo $awd->source, '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($awd->user == $this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_award" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/awd/'.$awd->award_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/awd/'.$awd->award_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>