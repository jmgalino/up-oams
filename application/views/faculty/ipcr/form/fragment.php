<table class="table" style="table-layout:fixed; width:100%;">
	<thead>
		<tr>
			<th class="active text-center" style="font-size:17px;font-weight:500;">Output</th>
			<th class="active text-center" style="font-size:17px;font-weight:500;">Success Indicator<br>(Targets + Measures)</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category)
	{
		echo '<tr><td class="category" colspan="2">', $category['category'], '</td></tr>';
			
		if ($targets)
		{
			foreach ($outputs as $output)
			{
				if ($category['category_ID'] == $output['category_ID'])
				{
					foreach ($targets as $target)
					{
						if ($output['ouput_ID'] == $target['ouput_ID'])
						{
							echo '<tr><td class="output">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $output['output'], '</td>
								<td>', $output['indicators'] ,'&nbsp;&nbsp;
								<a id="deleteOutput" href='.URL::site('faculty/ipcr/remove/'.$output['output_ID']).'>
								<span class="glyphicon glyphicon-remove-circle"></span></a></td></tr>';
						}
					}
				}
			}
		}
	}
	?>
	</tbody>
</table>