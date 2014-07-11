<?php 
echo '<h5>I. Journal Publication/Book/Chapter in a Book</h5>';

if($this->site->session->get('pub_rows')) {
	$pub_rows = $this->site->session->get('pub_rows');
	foreach ($pub_rows as $pub) {
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
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		if($pub->user==$this->site->session->get('user_ID')) {
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_publication" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/pub/'.$pub->publication_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/pub/'.$pub->publication_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>