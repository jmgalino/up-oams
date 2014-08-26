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
		{
			$attachment = explode(' ', $mat['attachment']);
			
			for ($i = 1; $i <= count($attachment); $i++)
			{
				echo '<a class="glyphicon glyphicon-paperclip" href="'.URL::base().'files/upload_attachments/'.$attachment[$i-1].'" target="_blank"><sup style="padding-left:1px;">', $i, '</sup></a> ';	
			}
		}
		
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		echo '<a class="btn btn-default" id="setAccom" data-toggle="modal" data-target="#modal_material" role="button" href='.URL::site('faculty/accom/set/mat/'.$mat['material_ID']).'>
			<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" href='.URL::site('faculty/accom/remove/mat/'.$mat['material_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>
