<?php
echo '<h5>VIII. Other Accomplishments</h5>';

if ($this->site->session->get('oth_rows'))
{
	$oth_rows = $this->site->session->get('oth_rows');

	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($oth_rows as $oth)
	{	
		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($oth->other_ID, 'oth');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $oth->details, '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $oth->details, '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>