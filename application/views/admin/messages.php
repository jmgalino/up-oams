<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Messages</li>
</ol>

<h3>Messages</h3>

<?php if ($messages AND $success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $success?>
	</p>
</div>
<?php elseif ($messages AND $success === FALSE): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Something went wrong. Please try again.
	</p>
</div>
<?php endif; ?>

<?php
// View message
echo View::factory('admin/oams/message');
?>

<?php if ($messages): ?>
<table class="table table-hover" id="message_table">
	<thead>
		<tr>
			<th class="star" style="width:1px"></th>
			<th>Sender</th>
			<th>Message</th>
			<th>Date</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($messages as $message)
	{
		echo '<tr>';
		
		if ($message['star'])
			echo 	'<td>
						<a href="', URL::site('admin/remove_star/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-star"></span></a>
					</td>';
		else
			echo 	'<td>
						<a href="', URL::site('admin/star/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-star-empty"></span></a>
					</td>';

		echo ($message['seen'] ? '<td>'.$message['name'].'</td>' : '<td><strong>'.$message['name'].'</strong></td>');
		
		echo '<td class="message" key="', $message['message_ID'], '" data-toggle="modal" data-target="#modal_message" style="cursor:pointer;" ajax-url="', URL::site('ajax/message_details').'">';
		echo ($message['seen'] ? $message['subject'] : '<strong>'.$message['subject'].'</strong>');
		echo '<span style="color:#7a7a7a"> - ', $message['message'], '</span></td>
			<td>', date('d M', strtotime($message['date'])), '</td>

			<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">';

		if ($message['star'])
			echo 	'<li>
						<a href="', URL::site('admin/remove_star/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-star-empty"></span> Remove Star</a>
					</li>';
		else
			echo 	'<li>
						<a href="', URL::site('admin/star/'.$message['message_ID']), '">
						<span class="glyphicon glyphicon-star"></span> Add Star</a>
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
						<a id="deleteMessage" href="', URL::site('admin/archive/'.$message['message_ID']), '">
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