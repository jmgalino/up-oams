<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Academic Programs</li>
</ol>

<h3>
  Academic Programs
  <?php if ($colleges): ?>
  <button type="button" class="btn btn-default pull-right" id="newProgram" data-toggle="modal" data-target="#modal_program" url="<?php echo URL::site('admin/university/new/program'); ?>">Create</button>
  <?php else: ?>
  <button type="button" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="bottom" title="Requires college">Create</button>
  <?php endif; ?>
</h3>
<br>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <p class="text-center">
    <?php echo $success; ?>
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
// Add/Edit program form
if ($colleges) {
  echo View::factory('admin/university/form/program')
    ->bind('colleges', $colleges)
    ->bind('departments', $departments);
}
?>

<?php if ($programs): ?>
<!-- Table -->
<table class="table table-hover" id="program_table" width="100%" ajax-url="<?php echo URL::site('extras/ajax/get_programs'); ?>">
	<thead>
		<tr>
      <th></th>
			<th>College</th>
			<th>Academic Program</th>
			<th>Initials</th>
      <th>Type</th>
			<th class="action" width="25"></th>
      <th><!-- department --></th>
      <th><!-- program --></th>
      <th><!-- date_instituted --></th>
      <th><!-- vision --></th>
      <th><!-- goals --></th>
		</tr>
	</thead>
</table>

<?php else: ?>
<div class="alert alert-danger text-center">
  <p>The list is empty.</p>
</div>
<?php endif; ?>
