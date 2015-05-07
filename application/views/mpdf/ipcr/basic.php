<table class="table table-bordered">
	<tbody>
		<tr>
			<td class="active" style="text-align:left">Reviewed by:</td>
			<td class="active" width="75">Date</td>
			<td class="active" style="text-align:left">Approved by:</td>
			<td class="active" width="75">Date</td>
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

<table class="table table-bordered">
	<tr>
		<td class="active" rowspan="2" width="150">Output</td>
		<td class="active" rowspan="2" width="150">Success Indicators<br>(Targets + Measures)</td>
		<td class="active" rowspan="2" width="80">Actual Accomplishments</td>
		<td class="active" colspan="4">Rating</td>
		<td class="active" rowspan="2" width="55">Remarks</td>
	</tr>
	<tr>
		<td class="active" width="20">Q<sup>1</sup></td>
		<td class="active" width="20">E<sup>2</sup></td>
		<td class="active" width="20">T<sup>3</sup></td>
		<td class="active" width="20">A<sup>4</sup></td>
	</tr>
	<?php
	$counter = 0;
	$attachment = "";
	$attachments = array();

	foreach ($categories as $category)
	{
		echo '<tr><th class="category" colspan="8">', $category['category'], '</th></tr>';
			
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
								$target['r_quantity'] = ($target['r_quantity'] ? $target['r_quantity']: '');
								$target['r_efficiency'] = ($target['r_efficiency'] ? $target['r_efficiency']: '');
								$target['r_timeliness'] = ($target['r_timeliness'] ? $target['r_timeliness']: '');
								$target['r_average'] = ($target['r_quantity'] OR $target['r_efficiency'] OR $target['r_timeliness'] ? 'Inc' : '');
							}

							if ($target['attachment'])
							{
								$attachments[$counter++] = $target['attachment'];
								$attachment = '<a class="glyphicon glyphicon-paperclip" href="#attachment_'.$counter.'" target="_blank">
												<sup style="padding-left:1px;">['.$counter.']</sup>
											</a>';
							}

							echo '<tr>
								<td class="form-rows">', $target['target'], '</td>
								<td class="form-rows">', $target['indicators'], '</td>
								<td class="form-rows">', $target['actual_accom'], '</td>
								<td class="form-rows">', $target['r_quantity'], '</td>
								<td class="form-rows">', $target['r_efficiency'], '</td>
								<td class="form-rows">', $target['r_timeliness'], '</td>
								<td class="form-rows">', $target['r_average'], '</td>
								<td class="form-rows">', $target['rermarks'],' ', $attachment ,'</td>
								</tr>';
						}
					}
				}
			}
		}
	}

	$session->set('attachments', $attachments);
	?>
</table>

<table class="table table-bordered">
	<tbody>
		<td class="active" style="text-align:left">colspan="6">Comments and Recommendations for Development Purposes</td></tr>
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
			<td class="text-center">
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
