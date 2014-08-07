<?php
echo'<h3>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h3>';

if ($session->get('accom_mat'))
{
	$accom_mat = $session->get('accom_mat');

	foreach ($accom_mat as $mat)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
		echo $mat['year'], '. ';
		echo $mat['title'], '.';
		echo '<br>';
	}
}
?>