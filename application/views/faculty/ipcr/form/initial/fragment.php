<table class="table" style="table-layout:fixed; width:100%;">
	<thead>
		<tr>
			<th class="active text-center" style="font-size:17px;"><strong>Output</strong></th>
			<th class="active text-center" style="font-size:17px;"><strong>Success Indicators<br>(Targets + Measures)</strong></th>
			<th class="active text-center" style="width:50px"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category)
	{
		echo '<tr><td class="category" colspan="3">', $category['category'], '</td></tr>';
			
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
								<td class="template-output" style="color: #909090">', $output['output'], '</td>
								<td class="template-output" style="color: #909090">', $output['indicators'] ,'</td>
								<td rowspan="2"><a  class="btn" id="deleteOutput" href='.URL::site('faculty/ipcr/remove/'.$target['target_ID']).'>
									<span class="glyphicon glyphicon-remove-circle"></span></a></td>
								</tr>
								<tr>
								<td class="template-output editTarget" id="'.$target['target_ID'].'" ajax-url="'.URL::site('faculty/ipcr/edit/target').'" style="border-top: dotted 1px #7b1113; padding-left: 25px;">', $target['target'], '</td>
								<td class="template-output editTargetIndicator" id="'.$target['target_ID'].'" ajax-url="'.URL::site('faculty/ipcr/edit/indicator').'" style="border-top: dotted 1px #7b1113; padding-left: 25px;">', $target['indicators'] ,'</td>
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