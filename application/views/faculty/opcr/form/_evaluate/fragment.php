<table class="table">
	<thead>
		<tr class="active">
			<th style="vertical-align:middle" class="text-center" rowspan="2" width="900">MFO/PAP</th>
			<th style="vertical-align:middle" class="text-center" rowspan="2" width="900">Success Indicator<br>(Target + Measure)</th>
			<th style="vertical-align:middle" class="text-center" rowspan="2" width="900">Divisions/Individual Accountable</th>
			<th style="vertical-align:middle" class="text-center" colspan="4">Rating</th>
			<th style="vertical-align:middle" class="text-center" rowspan="2" colspan="2">Remarks</th>
		</tr>
		<tr class="active">
			<th style="font-size:14;" class="text-center" width="10"><abbr title="Quantity">Q</abbr></th>
			<th style="font-size:14;" class="text-center" width="10"><abbr title="Efficiency">E</abbr></th>
			<th style="font-size:14;" class="text-center" width="10"><abbr title="Timeliness">T</abbr></th>
			<th style="font-size:14;" class="text-center" width="10"><abbr title="Average">A</abbr></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($target_rows)
		{
			foreach ($category as $c)
			{
				echo '<tr><td colspan="9">', $c->category, '</td></tr>';
				foreach ($target_rows as $target)
				{
					if ($c->category_ID == $target->category_ID)
					{
						echo '<tr>';

						echo '<td>'.$target->output.'</td>';
						echo '<td>'.$target->indicator.'</td>';
						
						if (isset($target->accountable))
							echo '<td class="text-center">'.$target->accountable.'</td>';
						else
							echo '<td class="text-center">N/A</td>';

						if (isset($target->r_quantity))
							echo '<td class="text-center">'.$target->r_quantity.'</td>';
						else
							echo '<td class="text-center">N/A</td>';

						if (isset($target->r_efficiency))
							echo '<td class="text-center">'.$target->r_efficiency.'</td>';
						else
							echo '<td class="text-center">N/A</td>';

						if (isset($target->r_timeliness))
							echo '<td class="text-center">'.$target->r_timeliness.'</td>';
						else
							echo '<td class="text-center">N/A</td>';

						if (isset($target->r_average))
							echo '<td class="text-center">'.$target->r_average.'</td>';
						else
							echo '<td class="text-center">N/A</td>';

						if (isset($target->remarks))
							echo '<td class="text-center">'.$target->remarks.'</td>';
						else
							echo '<td class="text-center">None</td>';

						echo '<td>
							<a title="Evaluate Target" href="'.url::site('opcr/evaluate_target/'.$opcr_ID.'/'.$target->otarget_ID).'">
							<span class="glyphicon glyphicon-check"></span></a>
							</td>';

						echo '</tr>';
					}
				}
			}
		}
		?>
	</tbody>
</table>

<table class="table table-bordered table-condensed" style="width:330">
	<thead>
		<tr>
			<td style="font-size:12; vertical-align:middle" class="text-center" colspan="2">Adjectival Rating (Proposed)</td>
			<td style="font-size:12" class="text-center" width="10">Numerical Rating</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="font-size:12">Outstanding</td>
			<td style="font-size:12">96% and above</td>
			<td style="font-size:12" class="text-center">5</td>
		</tr>
		<tr>
			<td style="font-size:12">Very Satisfactory</td>
			<td style="font-size:12">86% - 95%</td>
			<td style="font-size:12" class="text-center">4</td>
		</tr>
		<tr>
			<td style="font-size:12">Satisfactory</td>
			<td style="font-size:12">76% - 85%</td>
			<td style="font-size:12" class="text-center">3</td>
		</tr>
		<tr>
			<td style="font-size:12">Unsatisfactory</td>
			<td style="font-size:12">66% - 75%</td>
			<td style="font-size:12" class="text-center">2</td>
		</tr>
		<tr>
			<td style="font-size:12">Poor</td>
			<td style="font-size:12">65% and below</td>
			<td style="font-size:12" class="text-center">1</td>
		</tr>
	</tbody>
</table>

