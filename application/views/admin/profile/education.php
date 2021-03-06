<h4 style="font-size:20px">
	Educational Background&nbsp
	<button class="btn btn-default" id="education_toggle_show" style="display:none">Show</button>
	<button class="btn btn-default" id="education_toggle_hide">Hide</button>
	<button type="button" class="btn btn-default pull-right" id="newEducation" data-toggle="modal" data-target="#modal_education" url="<?php echo URL::site('admin/profile/new_education/'.$user['user_ID']); ?>">Add</button>
</h4>

<div id="education">
	<?php if ($education): ?>
	<table class="table table-striped table-condensed" id="education_table" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Award</th>
				<th>Year</th>
				<th>Institution</th>
				<th width="10px"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($education as $educ)
			{
				$date = ($educ['date_obtained']
					? date('F Y', strtotime($educ['date_obtained']))
					: 'N/A');

				echo '<tr>
					<td>', $educ['major'], '</td>
					<td>', $date, '</td>
					<td>', $educ['institution'], '</td>
					<td>
						<a class="btn btn-default" key="', $educ['education_ID'], '" id="updateEducation" data-toggle="modal" data-target="#modal_education" href="" url="', URL::site('admin/profile/update_education/'.$user['user_ID']), '" ajax-url="', URL::site('extras/ajax/education_details'), '" style="font-size:11px">
						<span class="glyphicon glyphicon-pencil"></span></a>
					</td>
				</tr>';
			}
			?>
		</tbody>
	</table>

	<?php else: ?>
	<div class="alert alert-danger"><p class="text-center">No entry.</p></div>

	<?php endif; ?>
</div>

<?php
// Add education form
echo View::factory('admin/profile/form/education')
	->bind('user_ID', $user['user_ID']);
?>