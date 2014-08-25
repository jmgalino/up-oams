<?php
echo'<h4>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h4>';

if ($session->get('accom_mat'))
{
	$accom_mat = $session->get('accom_mat');
	
	foreach ($accom_mat as $mat)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
		echo $mat['year'], '. ';
		echo $mat['title'], '.';
		echo '&nbsp;&nbsp;';

		if ($mat['attachment'])
		echo '<span class="glyphicon glyphicon-paperclip"></span>';
	
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		echo '<a class="show-hover" href="'.URL::site('faculty/accom/edit/mat/'.$mat['material_ID']).'"><span class="glyphicon glyphicon-edit"></span> Edit</a>', '  ';
		// echo '<a class="btn btn-default show hover" id="deleteAccom" href='.URL::site('faculty/accom/remove/mat/'.$mat['material_ID']).'>
		// 	<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>