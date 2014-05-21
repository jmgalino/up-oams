<?php 
echo '<h5>I. Journal Publication/Book/Chapter in a Book</h5>';

if($this->site->session->get('pub_rows'))
{
	$pub_rows = $this->site->session->get('pub_rows');
	
	if ($this->site->session->get('level') !== 'faculty')
		echo '<table class="table table-bordered">';

	foreach ($pub_rows as $pub)
	{
		if ($this->site->session->get('level') !== 'faculty')
		{
			$accom_ID = $this->accom->get_accomID($pub->publication_ID, 'pub');
			$accom = $this->accom->get_details($accom_ID);
			$user = $this->user->get_details($accom[0]->user_ID);
			
			echo '<tr>',
					'<td style="padding:5">', $user[0]->last_name, ', ', $user[0]->first_name, ' ', $user[0]->middle_initial, '. </td>',
					'<td style="padding:5">', $pub->year, '</td>',
					'<td style="padding:5">', $pub->title, '</td>';

			if($pub->type==='book') {
				echo '<td style="padding:5">Book</td>',
					'<td style="padding:5">', $pub->book_publisher, '</td>',
					'<td style="padding:5">', $pub->book_place, '</td>',
					'<td style="padding:5">', $pub->page, '</td>',
				'</tr>';
			}
			elseif($pub->type==='chapter') {
				echo '<td style="padding:5">Chapter</td>',
					'<td style="padding:5">', $pub->book_publisher, '</td>',
					'<td style="padding:5">', $pub->book_place, '</td>',
					'<td style="padding:5">', $pub->page, '</td>',
				'</tr>';
			}
			else {
				echo '<td style="padding:5">Journal</td>',
					'<td style="padding:5">', $pub->journal_volume, '(', $pub->journal_issue, '): ', $pub->page, '</td>',
				'</tr>';
			}
		}
		else
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '- ';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo $pub->year, '. ';
			echo $pub->title, '. ';

			if($pub->type==='book') {
				echo 'Book. ';
				echo $pub->book_publisher, '. ';
				echo $pub->book_place, '. ';
			}
			elseif($pub->type==='chapter') {
				echo 'Chapter. ';
				echo $pub->book_publisher, '. ';
				echo $pub->book_place, '. ';
			}
			else {
				echo 'Journal. ';
				echo $pub->journal_volume, '(';
				echo $pub->journal_issue, '): ';
			}

			echo $pub->page, '.';
			echo '<br>';
		}
	}

	if ($this->site->session->get('level') !== 'faculty')
		echo '</table>';
}
?>