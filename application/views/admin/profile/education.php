<h4 style="font-size:20px">
	Educational Background&nbsp
	<button class="btn btn-default" id="education_toggle_show" style="display:none">Show</button>
	<button class="btn btn-default" id="education_toggle_hide">Hide</button>
	<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_education" role="button" href="">Add</a>
</h4>

<div id="education">
	<?php if ($education): ?>
	<table class="table table-striped table-condensed" id="education_table" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Year</th>
				<th>Award</th>
				<th>Location</th>
				<th width="10px"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($education as $educ)
			{
				echo '<tr>';
				echo '<td>', $educ['year'], '</td>';
				echo '<td>', $educ['major'], '</td>';
				echo '<td>', $educ['city'], ', ', $educ['country'], '</td>';
				echo '<td><a class="btn btn-default" href="" style="font-size:11px"><span class="glyphicon glyphicon-pencil"></span></a></td>';
				echo '</tr>';
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