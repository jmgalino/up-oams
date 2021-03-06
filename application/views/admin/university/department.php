<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Departments</li>
</ol>

<h3>
	Departments
	<?php if ($colleges): ?>
	<button type="button" class="btn btn-default pull-right" id="newDepartment" data-toggle="modal" data-target="#modal_department" url="<?php echo URL::site('admin/university/new/department'); ?>">Create</button>
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
// Add/Edit department form
if ($colleges) {
	echo View::factory('admin/university/form/department')
	  ->bind('departments', $departments)
	  ->bind('colleges', $colleges)
	  ->bind('users', $users);
}
?>

<?php if ($departments): ?>
<!-- Table -->
<table class="table table-hover no-wrap" id="department_table" width="100%">
	<thead>
		<tr>
			<th>College</th>
			<th>Department</th>
			<th>Initials</th>
			<th>Department Chair</th>
			<th class="action" width="25"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($departments as $department)
	{
		echo '<tr>
			<td>', $department['college'], '</td>
			<td>', $department['department'], '</td>
			<td>', $department['short'], '</td>
			<td>', ($department['first_name'] ? $department['first_name'].' '.$department['middle_name'][0].'. '.$department['last_name'] : '<em>None</em>'), '</td>
			<td>
				<a class="btn btn-default" id="updateDepartment" key="', $department['department_ID'], '" data-toggle="modal" data-target="#modal_department" href="#" url="', URL::site('admin/university/update/department'), '" ajax-url="', URL::site('extras/ajax/department_details'), '" validate-url="', URL::site('extras/ajax/unique/edit_department'), '">
				<span class="glyphicon glyphicon-pencil"></span> Update</a>
			</td>
		</tr>';
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger text-center">
  <p>The list is empty.</p>
</div>
<?php endif; ?>
