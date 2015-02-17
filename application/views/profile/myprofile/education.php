<h4 style="font-size:20px">
	Educational Background&nbsp
	<button class="btn btn-default" id="education_toggle_show" style="display:none">Show</button>
	<button class="btn btn-default" id="education_toggle_hide">Hide</button>
</h4>

<div id="education">
	<?php if ($education): ?>
	<table class="table table-striped table-condensed" id="education_table" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Year</th>
				<th>Award</th>
				<th>Location</th>
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
				echo '</tr>';
			}
			?>
		</tbody>
	</table>

	<?php else: ?>
	<div class="alert alert-danger"><p class="text-center">No entry.</p></div>

	<?php endif; ?>
</div>