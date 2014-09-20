<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Messages</li>
</ol>

<h3>Messages</h3>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $success?>
	</p>
</div>
<?php elseif ($success === FALSE): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Something went wrong. Please try it again.
	</p>
</div>
<?php endif; ?>

<?php
// View message
echo View::factory('admin/oams/message');
?>

<?php if ($messages): ?>
<table class="table table-hover" id="message_table" width="100%">
	<thead>
		<tr>
			<th>Sender</th>
			<th>Subject</th>
			<th>Date</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($messages as $message)
	{
		if ($message['seen'] == 0)
			echo '<tr class="warning" id="', $message['message_ID'], '">';
		else
			echo '<tr>';

		echo '<td>', $message['name'], ' (', $message['contact'], ')</td>
			<td>', $message['subject'], '</td>
			<td>', date('d M Y', strtotime($message['date'])), '</td>
			<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a id="showMessage" key="', $message['message_ID'], '" data-toggle="modal" data-target="#modal_message" href="">
						<span class="glyphicon glyphicon-bullhorn"></span> Open Message</a>
					</li>';
					
		if ($message['seen'] == 0)
			echo 	'<li>
						<a href="', URL::site('admin/read/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-eye-open"></span> Mark as Read</a>
					</li>';
		else
			echo 	'<li>
						<a href="', URL::site('admin/unread/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-eye-close"></span> Mark as Unread</a>
					</li>';

		echo 		'<li>
						<a id="deleteMessage" href="', URL::site('admin/delete/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-trash"></span> Delete Message</a>
					</li>
				</ul>
			</td>
		</tr>';
	}
	?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">No messages.</p></div>
<?php endif; ?>