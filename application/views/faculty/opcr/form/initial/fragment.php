<table class="table" style="table-layout:fixed; width:100%;">
	<thead>
		<tr>
			<th class="active text-center" style="font-size:17px;font-weight:500;">MFO/PAP</th>
			<th class="active text-center" style="font-size:17px;font-weight:500;">Success Indicator<br>(Targets + Measures)</th>
			<th class="active text-center" style="width: 25px"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category)
	{
		echo '<tr><td class="category text-uppercase" colspan="3">', $category['category'], '</td></tr>';
			
		if ($outputs)
		{
			foreach ($outputs as $output)
			{
				if ($category['category_ID'] == $output['category_ID'])
				{
					echo '<tr>
						<td class="template-output editOutput" id="'.$output['output_ID'].'">', $output['output'], '</td>
						<td class="template-output editIndicator" id="'.$output['output_ID'].'">', $output['indicators'] , '</td>
						<td><a id="deleteOutput" href='.URL::site('faculty/opcr/remove/'.$output['output_ID']).'>
							<span class="glyphicon glyphicon-remove-circle"></span></a></td>
						</tr>';
				}
			}
		}
	}
	?>
	</tbody>
</table>