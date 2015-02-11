<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site("admin/oams");?>><?php echo $initials; ?> Settings</a></li>
  <li class="active">Announcements</li>
</ol>

<h3>
	List of Announcements
	<button type="button" class="btn btn-default pull-right" id="newAnnouncement" data-toggle="modal" data-target="#modal_announcement" url=<?php echo URL::site('admin/oams/new/announcement'); ?>>Create</button>
</h3>
<br>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $success?>
	</p>
</div>
<?php elseif (($error) OR ($success === FALSE)): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo ($error ? $error : 'Something went wrong. Please try again.'); ?>
	</p>
</div>
<?php endif; ?>

<?php
// Add/Edit announcement form
echo View::factory('admin/oams/form/announcement');
?>

<?php if ($announcements): ?>
<!-- Announcement Table -->
<table class="table table-hover" id="announcement_table">
	<thead>
		<tr>
			<th class="subject" style="width:25%">Subject</th>
			<th style="width:55%" colspan="2">Content</th>
			<th style="width:10%">Date</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($announcements as $announcement)
	{
		echo '<tr>';
		echo '<td>', $announcement['subject'], '</td>';
		echo '<td class="content">', $announcement['content'], '</td>';

		echo ($announcement['attachment']
			? '<td style="width:5%"><span class="glyphicon glyphicon-paperclip aria-hidden="true""></span></td>'
			: '<td style="width:5%"></td>');

		echo '<td>', date('d M', strtotime($announcement['date'])), '</td>
			<td>
				<a class="btn btn-default" key="', $announcement['announcement_ID'],'" id="updateAnnouncement" data-toggle="modal" data-target="#modal_announcement" href="" url="', URL::site('admin/oams/update/announcement'), '" ajax-url="', URL::site('ajax/announcement_details'), '">
				<span class="glyphicon glyphicon-pencil"></span> Update</a>
			</td>
			</tr>';


		// echo '<td class="dropdown">
		// 		<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
		// 		<ul class="dropdown-menu">
		// 			<li>
		// 				<a key="', $announcement['announcement_ID'],'" id="updateAnnouncement" data-toggle="modal" data-target="#modal_announcement" href="" url="', URL::site('admin/oams/update/announcement'), '" ajax-url="', URL::site('ajax/announcement_details'), '">
		// 				<span class="glyphicon glyphicon-pencil"></span> Edit Post</a>
		// 			</li>
		// 			<li>
		// 				<a href="', URL::site('admin/oams/delete/'.$announcement['announcement_ID']), '">
		// 				<span class="glyphicon glyphicon-trash"></span> Delete Post</a>
		// 			</li>
		// 		</ul>
		// 	</td>
		// 	</tr>';
	}
	?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger text-center">
	<p>The list is empty.</p>
</div>
<span class="help-block">Note: Announcements reset on the first day of the month. [SOON]</span>
<?php endif; ?>