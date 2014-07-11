<?php
echo'<h5>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h5>';

if ($this->site->session->get('mat_rows'))
{
	$mat_rows = $this->site->session->get('mat_rows');

	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($mat_rows as $mat)
	{
		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($mat->material_ID, 'mat');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $mat->year, '</td>',
					'<td style="padding:5">', $mat->title, '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
			echo $mat->year, '. ';
			echo $mat->title, '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>