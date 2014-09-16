<table class="table" style="table-layout:fixed; width:100%;">
    <col>
    <col>
    <col>
    <col width="40px">
    <col width="40px">
    <col width="40px">
    <col width="40px">
    <col>
	<thead>
		<tr>
			<th class="template-header" rowspan="2">Target</th>
			<th class="template-header" rowspan="2" style="font-size:12px">Success Indicators<br>(Targets + Measures)</th>
			<th class="template-header" rowspan="2" style="font-size:12px">Actual<br>Accomplishments</th>
			<th class="template-header" colspan="4" style="border-bottom: 1px solid #ddd;">Rating</th>
			<th class="template-header" rowspan="2">Remarks</th>
		</tr>
	    <tr>
	      <th class="template-header">Q<sup>1</sup></th>
	      <th class="template-header">E<sup>2</sup></th>
	      <th class="template-header">T<sup>3</sup></th>
	      <th class="template-header">A<sup>4</sup></th>
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
							echo '<tr>
								<td class="template-output">', $target['target'], '</td>
								<td class="template-output">', $target['indicators'] ,'</td>
								<td class="template-output">', $target['actual_accom'], '</td>
								<td class="template-output">', $target['r_quantity'], '</td>
								<td class="template-output">', $target['r_efficiency'], '</td>
								<td class="template-output">', $target['r_timeliness'], '</td>
								<td class="template-output">';

			                if ($target['r_quantity'] AND $target['r_efficiency'] AND $target['r_timeliness'])
							{
								$rating = array($target['r_quantity'], $target['r_efficiency'], $target['r_timeliness']);
								echo number_format(array_sum($rating)/3, 1);
							}
			              	else
			              		echo 'Inc';

			                echo '</td>
								<td class="template-output">', $target['remarks'], '</td>
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