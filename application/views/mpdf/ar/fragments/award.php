<?php
echo '<h5>II. Award/Grants Received</h5>';

if ($this->site->session->get('awd_rows'))
{
	$awd_rows = $this->site->session->get('awd_rows');
	
	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($awd_rows as $awd)
	{
		$dfrom = new DateTime($awd->duration_from);
		$dto = new DateTime($awd->duration_to);

		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($awd->award_ID, 'awd');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $awd->award, '</td>',
					'<td style="padding:5">', date_format($dfrom, 'F d, Y'), ' to ', date_format($dto, 'F d, Y'), '</td>',
					'<td style="padding:5">', $awd->source, '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $awd->award, '. ';
			echo date_format($dfrom, 'F d, Y'), ' to ';
			echo date_format($dto, 'F d, Y'), '. ';
			echo $awd->source, '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>