<?php
echo '<h5>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h5>';

if ($this->site->session->get('par_rows'))
{
	$par_rows = $this->site->session->get('par_rows');
	
	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($par_rows as $par)
	{
		$dfrom = new DateTime($par->date_from);
		$dto = new DateTime($par->date_to);
		
		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($par->participation_ID, 'par');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $par->participation, '</td>',
					'<td style="padding:5">', $par->venue, '</td>',
					'<td style="padding:5">', date_format($dfrom, 'F d, Y'), ' to ', date_format($dto, 'F d, Y'), '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $par->participation, '. ';
			echo $par->venue, '. ';
			echo date_format($dfrom, 'F d, Y'), ' to ';
			echo date_format($dto, 'F d, Y'), '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>