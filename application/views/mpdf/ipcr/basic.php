<table class="table table-bordered padded">
	<tbody>
		<tr>
			<td style="background-color:#f5f5f5">Reviewed by:</td>
			<td class="text-center" width="75" style="background-color:#f5f5f5">Date</td>
			<td style="background-color:#f5f5f5">Approved by:</td>
			<td class="text-center" width="75" style="background-color:#f5f5f5">Date</td>
		</tr>
		<tr>
			<td><br><br><br></td>
			<td rowspan="2"></td>
			<td></td>
			<td rowspan="2"></td>
		</tr>
		<tr>
			<td class="text-center">Immediate Supervisor</td>
			<td class="text-center">Head of Office</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered padded">
	<thead>
		<tr>
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">Output</th>
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">Success Indicators<br>(Targets + Measures)</th>
			<th class="template-header" rowspan="2" width="80" style="background-color:#f5f5f5;">Actual Accomplishments</th>
			<th class="template-header" colspan="4" style="background-color:#f5f5f5;">Rating</th>
			<th class="template-header" rowspan="2" width="55" style="background-color:#f5f5f5;">Remarks</th>
		</tr>
		<tr>
			<th class="template-header" width="20" style="background-color:#f5f5f5;">Q<sup>1</sup></th>
			<th class="template-header" width="20" style="background-color:#f5f5f5;">E<sup>2</sup></th>
			<th class="template-header" width="20" style="background-color:#f5f5f5;">T<sup>3</sup></th>
			<th class="template-header" width="20" style="background-color:#f5f5f5;">A<sup>4</sup></th>
		</tr>
	</thead>
	<tbody>
	<?php

	foreach ($categories as $category)
	{
		echo '<tr><td class="category" colspan="8">', $category['category'], '</td></tr>';
			
		if ($targets)
		{	
			foreach ($outputs as $output)
			{
				if ($category['category_ID'] == $output['category_ID'])
				{
					foreach ($targets as $target)
					{
						if ($output['output_ID'] == $target['output_ID'])
						{
							if ($target['r_quantity'] AND $target['r_efficiency'] AND $target['r_timeliness'])
							{
								$rating = array($target['r_quantity'], $target['r_efficiency'], $target['r_timeliness']);
								$target['r_average'] = number_format(array_sum($rating)/3, 1);
							}
							else
							{
								$target['r_quantity'] = '';
								$target['r_efficiency'] = '';
								$target['r_timeliness'] = '';
								$target['r_average'] = '';
							}

							echo '<tr>
								<td class="form-rows">', $target['target'], '</td>
								<td class="form-rows">', $target['indicators'], '</td>
								<td class="form-rows">', $target['actual_accom'], '</td>
								<td class="form-rows">', $target['r_quantity'], '</td>
								<td class="form-rows">', $target['r_efficiency'], '</td>
								<td class="form-rows">', $target['r_timeliness'], '</td>
								<td class="form-rows">', $target['r_average'], '</td>
								<td class="form-rows">', $target['rermarks'], '</td>
								</tr>';
						}
					}
				}
			}
		}
	}
	?>
	</tbody>
</table>

<table class="table table-bordered padded">
	<tbody>
		<tr><td colspan="6" style="background-color:#f5f5f5">Comments and Recommendations for Development Purposes</td></tr>
		<tr>
			<td colspan="6"><br><br><br><br></td>
		</tr>
		<tr>
			<td class="text-center" width="150">Discussed with</td>
			<td class="text-center" width="75">Date</td>
			<td class="text-center" width="150">Assessed by:</td>
			<td class="text-center" width="75">Date</td>
			<td class="text-center" width="150">Final Rating by:</td>
			<td class="text-center" width="75">Date</td>
		</tr>
		<tr>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
			<td class="text-center" style="font-size:12px">
				I certify that I discussed my assessment of the performance with the employee
			</td>
			<td rowspan="3"></td>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
		</tr>
		<tr><td><br><br></td></tr>
		<tr>
			<td class="text-center">Employee</td>
			<td class="text-center">Supervisor</td>
			<td class="text-center">Head of Office</td>
		</tr>
	</tbody>
</table>
