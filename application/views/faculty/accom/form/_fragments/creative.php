<?php
echo '<h5>V. Presentation of Creative Work Output</h5>';

if ($this->site->session->get('ctv_rows'))
{
	$ctv_rows = $this->site->session->get('ctv_rows');

	foreach ($ctv_rows as $ctv)
	{
		$dfrom = new DateTime($ctv->date_from);
		$dto = new DateTime($ctv->date_to);

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $ctv->title, '. ';
		echo $ctv->venue, '. ';
		echo date_format($dfrom, 'F d, Y'), ' to ';
		echo date_format($dto, 'F d, Y'), '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($ctv->user == $this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_creative" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/ctv/'.$ctv->creative_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/ctv/'.$ctv->creative_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>