<?php 
echo '<h3>I. Journal Publication/Book/Chapter in a Book</h3>';

if ($session->get('accom_pub'))
{
	$accom_pub = $session->get('accom_pub');

	foreach ($accom_pub as $pub)
	{
		echo '<p style="padding-left:20px;">';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($session->get('accom_type') == 'group')
		{
			echo reuser($pub['user_ID'], $session->get('users'));
			if ($pub['author']) echo ' and ', $pub['author'], '. ';
		}
		else
		{
			if ($pub['author']) echo $pub['author'], '. ';
		}

		echo $pub['year'], '. ';
		echo $pub['title'], '. ';
		echo $pub['type'], '. ';

		echo ($pub['type'] === 'Journal'
			? $pub['journal_volume'].'('.$pub['journal_issue'].'): '
			: $pub['book_publisher'].'. '.$pub['book_place'].'. ');
		
		echo $pub['page'], '.';
		echo '</p>';
	}
}
?>