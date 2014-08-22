<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Messages</li>
</ol>

<h3>Messages</h3>

<?php if ($messages): ?>
<div class="table-responsive">
	<table class="table table-hover" id="message_table">
		<thead>
			<tr>
				<th width="400px">Sender</th>
				<th>Subject</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
	
		<?php
		foreach ($messages as $message)
		{
			echo
			'<tr>
				<td>', $message['name'], ' (', $message['contact'], ')</td>
				<td>', $message['subject'], '</td>
				<td>', $message['date'], '</td>
			</tr>';
		}
		?>

		</tbody>
	</table>
</div>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">No messages.</p></div>
<?php endif; ?>