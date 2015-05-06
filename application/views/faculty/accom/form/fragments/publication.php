<?php 
echo '<h4>I. Journal Publication/Book/Chapter in a Book</h4>';

if ($session->get('accom_pub'))
{
	$accom_pub = $session->get('accom_pub');

	foreach ($accom_pub as $pub)
	{
		echo '<p style="padding-left:20px;">';
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
		echo '&nbsp;&nbsp;&nbsp;';
		
		echo '<a class="btn btn-default" id="updatePublication" publication-id="', $pub['publication_ID'], '" accom-id="', $session->get('accom_details')['accom_ID'], '" data-toggle="modal" data-target="#modal_publication" role="button" href="" action-url="', URL::site('faculty/accom/edit/pub/'.$pub['publication_ID']), '" ajax-url="', URL::site('extras/ajax/accom_details/pub'), '">
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" role="button" href="'.URL::site('faculty/accom/remove/pub/'.$pub['publication_ID']).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '</p>';
	}
}
?>