<?php
echo'<h5>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h5>';

if ($this->site->session->get('mat_rows'))
{
	$mat_rows = $this->site->session->get('mat_rows');
	
	foreach ($mat_rows as $mat)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
		echo $mat->year, '. ';
		echo $mat->title, '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		if ($mat->user == $this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_material" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/mat/'.$mat->material_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/mat/'.$mat->material_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>