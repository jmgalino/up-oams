<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Colleges</li>
</ol>

<h3>
	Colleges
	<button type="button" class="btn btn-default pull-right" id="newCollege" data-toggle="modal" data-target="#modal_college" url="<?php echo URL::site('admin/university/new/college'); ?>">Create</button>
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
// Add/Edit college form
echo View::factory('admin/university/form/college')
  ->bind('colleges', $colleges)
  ->bind('users', $users);
?>

<?php if ($colleges): ?>
<!-- Table -->
<table class="table table-hover" id="college_table" width="100%">
	<thead>
		<tr>
			<th>College</th>
			<th>Initials</th>
			<th>Dean</th>
			<th class="action"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($colleges as $college)
	{
		echo
		'<tr>
			<td>', $college['college'], '</td>
			<td>', $college['short'], '</td>
			<td>', ($college['first_name'] ? $college['first_name'].' '.$college['middle_name'][0].'. '.$college['last_name'] : '<em>None</em>'), '</td>
			<td>
				<a class="btn btn-default" key="', $college['college_ID'], '" id="updateCollege" data-toggle="modal" data-target="#modal_college" href="" url="', URL::site('admin/university/update/college'), '" ajax-url="', URL::site('extras/ajax/college_details'), '" validate-url="', URL::site('extras/ajax/unique/edit_college'), '">
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
