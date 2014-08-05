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
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		// if ($pub['user_ID'] == $session->get('user_ID'))
		// {
		// 	echo '<a data-toggle="modal" data-target="#modal_publication" role="button" href="">',
		// 		'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		// }
		
		echo '<a id="deleteAccom" href='.URL::site('faculty/accom/remove/pub/'.$pub['publication_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>