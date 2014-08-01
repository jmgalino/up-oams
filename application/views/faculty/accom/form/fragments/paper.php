<?php
echo '<h5>IV. Oral Paper/Poster Presentation</h5>';

if ($this->site->session->get('ppr_rows'))
{
	$ppr_rows = $this->site->session->get('ppr_rows');
	foreach ($ppr_rows as $ppr)
	{
		$dfrom = new DateTime($ppr->date_from);
		$dto = new DateTime($ppr->date_to);

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $ppr->title, '. ';
		echo $ppr->activity, '. ';
		echo $ppr->venue, '. ';
		echo date_format($dfrom, 'F d, Y'), ' to ';
		echo date_format($dto, 'F d, Y'), '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($ppr->user == $this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_paper" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/ppr/'.$ppr->paper_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/ppr/'.$ppr->paper_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>