<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li class="active">Messages</li>
</ol>

<h3>Messages</h3>

<?php
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

	foreach ($messages as $message) {
		echo
		'<tr>
			<td>', $message->sender, '</td>
			<td>', $message->subject, '</td>
			<td>', $message->message, '</td>
		</tr>';
	}

	echo '</tbody></table></div>';
?>