<table class="table" style="table-layout:fixed; width:100%;">
	<thead>
		<tr>
			<th class="active text-center" style="font-size:17px;"><strong>Output</strong></th>
			<th class="active text-center" style="font-size:17px;"><strong>Success Indicators<br>(Targets + Measures)</strong></th>
			<th class="active text-center" style="width: 25px"></th>
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
								<td class="template-output">', $output['output'], '</td>
								<td class="template-output">', $output['indicators'] ,'</td>
								<td><a id="deleteOutput" href='.URL::site('faculty/ipcr/remove/'.$target['target_ID']).'>
									<span class="glyphicon glyphicon-remove-circle"></span></a></td>
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