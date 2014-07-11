<?php
echo '<h5>IV. Oral Paper/Poster Presentation</h5>';

if ($this->site->session->get('ppr_rows'))
{
	$ppr_rows = $this->site->session->get('ppr_rows');
	
	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($ppr_rows as $ppr)
	{
		$dfrom = new DateTime($ppr->date_from);
		$dto = new DateTime($ppr->date_to);

		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($ppr->paper_ID, 'ppr');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);

			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $ppr->title, '</td>',
					'<td style="padding:5">', $ppr->activity, '</td>',
					'<td style="padding:5">', $ppr->venue, '</td>',
					'<td style="padding:5">', date_format($dfrom, 'F d, Y'), ' to ', date_format($dto, 'F d, Y'), '</td>',
				'</tr>';
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $ppr->title, '. ';
			echo $ppr->activity, '. ';
			echo $ppr->venue, '. ';
			echo date_format($dfrom, 'F d, Y'), ' to ';
			echo date_format($dto, 'F d, Y'), '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>