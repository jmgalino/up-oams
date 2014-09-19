<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li><a href=<?php echo URL::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Colleges</li>
</ol>

<h3>
	List of Colleges
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
    <?php echo ('Something went wrong. Please try it again.'); ?>
  </p>
</div>
<?php endif; ?>

<?php
// Add/Edit college form
echo View::factory('admin/university/form/college')
  ->bind('colleges', $colleges)
  ->bind('users', $users);
?>

<!-- Table -->
<div class="table-responsive">
	<table class="table table-hover" id="college_table">
		<thead>
			<tr>
				<th>Complete Name</th>
				<th>Short Name</th>
				<th>Dean</th>
				<th class="action">Update</th>
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
				<td>', $college['first_name'], ' ', $college['middle_name'][0], '. ', $college['last_name'], '</td>
				<td>
					<a class="btn btn-default" key="', $college['college_ID'], '" id="updateCollege" data-toggle="modal" data-target="#modal_college" href="#" url="', URL::site('admin/university/update/college'), '">
					<span class="glyphicon glyphicon-pencil"></span></a>
				</td>
			</tr>';

			// echo '<td class="dropdown">
			// 		<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
			// 		<ul class="dropdown-menu">
			// 			<li>
			// 				<a id="updateCollege" href='.URL::site('admin/college/update/'.$college['college_ID']).'>
			// 				<span class="glyphicon glyphicon-pencil"></span> Update College</a>
			// 			</li>
			// 			<li>
			// 				<a id="deleteCollege" href='.URL::site('admin/college/delete/'.$college['college_ID']).'>
			// 				<span class="glyphicon glyphicon-trash"></span> Delete College</a>
			// 			</li>
			// 		</ul>
			// 	</td>'; href='.URL::site('admin/college/update/'.$college['college_ID']).'
		}?>
		</tbody>
	</table>
</div>
