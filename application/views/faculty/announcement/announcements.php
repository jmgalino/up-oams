<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li class="active">Announcements</li>
</ol>

<h3>
	<div class="row">
		<div class="col-md-6">List of Announcements</div>
		<div class="col-md-6">
			<div class="pull-right">
				<button type="button" class="btn btn-default" id="newAnnouncement" data-toggle="modal" data-target="#modal_announcement" action-url=<?php echo URL::site($new_url); ?>>Create</button>
				<a class="btn btn-default" href="<?php echo $archive_url; ?>">Open Archive</a>
			</div>
		</div>
	</div>
</h3>
<br>

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
		Something went wrong. Please try again.
	</p>
</div>
<?php endif; ?>

<?php
// Add/Edit announcement form
echo View::factory('faculty/announcement/form')
	->bind('new_url', $new_url);
?>

<?php if ($announcements): ?>
<!-- Announcement Table -->
<table class="table table-hover" id="announcement_table">
	<thead>
		<tr>
			<th class="subject" style="width:25%">Subject</th>
			<th style="width:55%" colspan="2">Content</th>
			<th style="width:10%">Date Posted</th>
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

		echo '<td>', date('d M', strtotime($announcement['date_created'])), '</td>
			<td>
				<a class="btn btn-default" key="', $announcement['announcement_ID'],'" id="updateAnnouncement" data-toggle="modal" data-target="#modal_announcement" href="" action-url="', $update_url, '" ajax-url="', $ajax_url, '"archive-url="', $delete_url, '/', $announcement['announcement_ID'], '">
				<span class="glyphicon glyphicon-pencil"></span> Update</a>
			</td>
			</tr>';	}
	?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger text-center">
	<p>The list is empty.</p>
</div>
<?php endif; ?>