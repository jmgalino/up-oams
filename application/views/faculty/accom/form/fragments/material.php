<?php
echo'<h3>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h3>';

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
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($mat['user_ID'] == $session->get('user_ID'))
		{
			echo '<a data-toggle="modal" data-target="#modal_material" role="button" href="">',
				'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		}
		
		echo '<a onclick="return confirm(\'Are you sure you want to delete this?\');" href='.URL::site('faculty/accom/remove/mat/'.$mat['material_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>