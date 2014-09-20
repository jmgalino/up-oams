<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Degree Programs</li>
</ol>

<h3>
  List of Degree Programs
  <button type="button" class="btn btn-default pull-right" id="newProgram" data-toggle="modal" data-target="#modal_program" url="<?php echo URL::site('admin/university/new/program'); ?>">Create</button>
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
    Something went wrong. Please try it again.
  </p>
</div>
<?php endif; ?>

<?php
// Add/Edit program form
echo View::factory('admin/university/form/program')
  ->bind('colleges', $colleges)
  ->bind('departments', $departments);
?>

<!-- Table -->
<table class="table table-hover" id="program_table" width="100%">
	<thead>
		<tr>
      <th></th>
			<th>College</th>
			<th>Degree Program</th>
			<th>Initials</th>
      <th>Type</th>
			<th class="action"></th>
		</tr>
	</thead>
</table>
