<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href="<?php echo URL::site(); ?>">Home</a></li>
	<li><a href="<?php echo URL::site("admin/app");?>">App Settings</a></li>
	<li><a href="<?php echo $announcement_url; ?>">Announcements</a></li>
	<li class="active">Archive</li>
</ol>

<h3>
	<div class="row">
		<div class="col-md-6">Archived Announcements</div>
		<div class="col-md-6">
			<a class="btn btn-default pull-right" href="<?php echo $announcement_url; ?>" role="button">
			<span class="glyphicon glyphicon-arrow-left"></span> Back</a>
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
// View announcement
echo View::factory('faculty/announcement/modal');
?>

<?php if ($announcements): ?>
<!-- Announcement Table -->
<table class="table table-hover" id="archive_announcement_table">
	<thead>
		<tr>
			<th class="subject">Subject</th>
			<th>Date Posted</th>
			<th>Date Deleted</th>
			<th class="action" width="60px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($announcements as $announcement)
	{
		$attachment = ($announcement['attachment']
			? '<span class="glyphicon glyphicon-paperclip aria-hidden="true""></span></td>'
			: '');

		echo '<tr>
			<td>', $announcement['subject'], '</td>
			<td>', date('d M Y', strtotime($announcement['date_created'])), '</td>
			<td>', date('d M Y', strtotime($announcement['date_deleted'])), '</td>
			<td>
				<a class="btn btn-default" key="', $announcement['announcement_ID'],'" id="openAnnouncement" data-toggle="modal" data-target="#modal_announcement" href="" ajax-url="', $ajax_url, '" restore-url="', $restore_url, '/', $announcement['announcement_ID'],'" delete-url="', $delete_url, '/', $announcement['announcement_ID'],'">
				Open</a>
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