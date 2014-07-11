<?php
echo '<h5>III. Research Grants/Fellowships Received</h5>';
	
if ($this->site->session->get('rch_rows'))
{
	$rch_rows = $this->site->session->get('rch_rows');
	
	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($rch_rows as $rch)
	{
		$dfrom = new DateTime($rch->duration_from);
		$dto = new DateTime($rch->duration_to);

		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($rch->research_ID, 'rch');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $rch->title, '</td>',
					'<td style="padding:5">', $rch->fund_source, '</td>',
					'<td style="padding:5">', date_format($dfrom, 'F d, Y'), ' to ', date_format($dto, 'F d, Y'), '</td>',
					'<td style="padding:5">', $rch->fund_, '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $rch->title, '. ';
			echo $rch->fund_source, '. ';
			echo date_format($dfrom, 'F d, Y'), ' to ';
			echo date_format($dto, 'F d, Y'), '.';
			echo $rch->fund_, '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>