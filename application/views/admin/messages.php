<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Messages</li>
</ol>

<h3>Messages</h3>

<?php
if (count($messages) > 0)
{
	echo '<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Sender</th>
				<th>Subject</th>
				<th>Message</th>
			</tr>
		</thead>
		<tbody>';

	
		foreach ($messages as $message)
		{
			echo
			'<tr>
				<td>', $message->sender, '</td>
				<td>', $message->subject, '</td>
				<td>', $message->message, '</td>
			</tr>';
		}

	echo '</tbody></table></div>';}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">No messages.</p></div>';
}
?>