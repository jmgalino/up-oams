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
				<th>Award</th>
				<th>Year</th>
				<th>Institution</th>
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
				</tr>';
			}
			?>
		</tbody>
	</table>

	<?php else: ?>
	<div class="alert alert-danger"><p class="text-center">No entry.</p></div>

	<?php endif; ?>
</div>