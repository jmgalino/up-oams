<table class="table" style="table-layout:fixed; width:100%;">
	<thead>
		<tr>
			<th class="template-header" style="font-size:17px;"><strong>MFO/PAP</strong></th>
			<th class="template-header" style="font-size:17px;"><strong>Success Indicators<br>(Targets + Measures)</strong></th>
			<th class="template-header" style="width: 50px"></th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category)
	{
		echo '<tr><td class="category" colspan="3">', $category['category'], '</td></tr>';
			
		if ($outputs)
		{
			foreach ($outputs as $output)
			{
				if ($category['category_ID'] == $output['category_ID'])
				{
					echo '<tr>
						<td class="template-output editOutput" id="'.$output['output_ID'].'" ajax-url="'.URL::site('faculty/opcr/edit/target').'">', $output['output'], '</td>
						<td class="template-output editOutputIndicator" id="'.$output['output_ID'].'" ajax-url="'.URL::site('faculty/opcr/edit/indicator').'">', $output['indicators'] , '</td>
						<td><a class="btn" id="deleteOutput" href='.URL::site('faculty/opcr/remove/'.$output['output_ID']).'>
							<span class="glyphicon glyphicon-remove-circle"></span></a></td>
						</tr>';
				}
			}
		}
	}
	?>
	</tbody>
</table>