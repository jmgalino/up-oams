<?php
echo '<h5>V. Presentation of Creative Work Output</h5>';

if ($this->site->session->get('ctv_rows'))
{
	$ctv_rows = $this->site->session->get('ctv_rows');

	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($ctv_rows as $ctv)
	{
		$dfrom = new DateTime($ctv->date_from);
		$dto = new DateTime($ctv->date_to);
		
		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($ctv->creative_ID, 'ctv');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $ctv->title, '</td>',
					'<td style="padding:5">', $ctv->venue, '</td>',
					'<td style="padding:5">', date_format($dfrom, 'F d, Y'), ' to ', date_format($dto, 'F d, Y'), '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $ctv->title, '. ';
			echo $ctv->venue, '. ';
			echo date_format($dfrom, 'F d, Y'), ' to ';
			echo date_format($dto, 'F d, Y'), '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>