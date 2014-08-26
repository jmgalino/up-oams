<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href="<?php echo URL::site('faculty/accom'); ?>">Accomplishment Reports</a></li>
	<li class="active">My Accomplishments</li>
</ol>

<?php if ($accom_reports): ?>
<!-- Table -->
<table class="table table-hover" id="accom_all_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Period</th>
			<th>Date Submitted</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>