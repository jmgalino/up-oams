<?php
echo '<h5>VIII. Other Accomplishments</h5>';

if ($this->site->session->get('oth_rows'))
{
	$oth_rows = $this->site->session->get('oth_rows');

	foreach ($oth_rows as $oth)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '- ';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $oth->details, '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		if ($oth->user == $this->site->session->get('user_ID'))
		{
			// echo ' ', '<a class="owned" data-toggle="modal" data-target="#modal_other" role="button" href="">',
			// '<span class="glyphicon glyphicon-pencil"></span></a>';
			echo ' ', '<a class="owned" href="'.url::site('accom/delete_/oth/'.$oth->other_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		else {
			echo ' ', '<a class="user" href="'.url::site('accom/remove/oth/'.$oth->other_ID).'">',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		}
		echo '<br>';
	}
}
?>