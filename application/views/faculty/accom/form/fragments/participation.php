<?php
echo '<h5>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h5>';

if ($this->site->session->get('par_rows'))
{
	$par_rows = $this->site->session->get('par_rows');
	
	foreach ($par_rows as $par)
	{
		$dfrom = new DateTime($par->date_from);
		$dto = new DateTime($par->date_to);

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $par->participation, '. ';
		echo $par->venue, '. ';
		echo date_format($dfrom, 'F d, Y'), ' to ';
		echo date_format($dto, 'F d, Y'), '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($par->user==$this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_participation" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/par/'.$par->participation_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/par/'.$par->participation_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>