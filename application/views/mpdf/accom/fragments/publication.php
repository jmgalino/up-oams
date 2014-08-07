<?php 
echo '<h3>I. Journal Publication/Book/Chapter in a Book</h3>';

if ($session->get('accom_pub'))
{
	$accom_pub = $session->get('accom_pub');

	foreach ($accom_pub as $pub)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($pub['author']) echo $pub['author'], '. ';
		
		echo $pub['year'], '. ';
		echo $pub['title'], '. ';
		echo $pub['type'], '. ';

		echo ($pub['type'] === 'Journal'
			? $pub['journal_volume'].'('.$pub['journal_issue'].'): '
			: $pub['book_publisher'].'. '.$pub['book_place'].'. ');
		
		echo $pub['page'], '.';
		echo '<br>';
	}
}
?>