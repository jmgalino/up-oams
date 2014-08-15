<table class="table table-bordered">
	<tbody class="padded">
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

<table class="table table-bordered">
	<thead>
		<tr class="padded">
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">Output</th>
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">Success Indicators<br>(Targets + Measures)</th>
			<th class="template-header" rowspan="2" width="80" style="background-color:#f5f5f5; font-size:11px;">Actual Accomplishments</th>
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
	<tbody class="padded">
		<?php
		$targets = $ipcr->get_targets($ipcr_ID); 
		$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);
		$categories = $opcr->get_categories(); 

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
								echo '<tr>
									<td class="form-rows">', $output['output'], '</td>
									<td class="form-rows">';

									$style1 = strpos($output['indicators'], 'Targets:');
									if ($style1 !== FALSE)
									{
										list($indicator, $imeasures) = explode('Measures:', $output['indicators']);
										list($nothingness, $itargets) = explode('Targets:', $indicator);
										echo '<strong>Targets</strong>:', $itargets;
										echo '<strong>Measures</strong>: ', $imeasures;
									}
									else
										echo $output['indicators'];

								echo '</td>
									<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
		<tr><td colspan="6" style="background-color:#f5f5f5; font-size:12px;">Comments and Recommendations for Development Purposes</td></tr>
		<tr>
			<td colspan="6"><br><br><br><br></td>
		</tr>
		<tr>
			<td class="text-center" width="250" style="font-size:12px;">Discussed with</td>
			<td class="text-center" width="75" style="font-size:12px;">Date</td>
			<td class="text-center" width="250" style="font-size:12px;">Assessed by:</td>
			<td class="text-center" width="75" style="font-size:12px;">Date</td>
			<td class="text-center" width="250" style="font-size:12px;">Final Rating by:</td>
			<td class="text-center" width="75" style="font-size:12px;">Date</td>
		</tr>
		<tr>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
			<td class="text-center" style="font-size:12px;">
				I certify that I discussed my assessment of the performance with the employee
			</td>
			<td rowspan="3"></td>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
		</tr>
		<tr><td><br><br></td></tr>
		<tr>
			<td class="text-center" style="font-size:12px;">Employee</td>
			<td class="text-center" style="font-size:12px;">Supervisor</td>
			<td class="text-center" style="font-size:12px;">Head of Office</td>
		</tr>
	</tbody>
</table>
