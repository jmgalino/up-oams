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
						<td>', $output['output'], '</td>
						<td>', $output['indicators'] , '</td>
						<td><a class="btn btn-default" id="updateOutput" output-id="', $output['output_ID'], '" data-toggle="modal" data-target="#modal_output" role="button" href="" action-url="', URL::site('faculty/opcr/edit/'.$output['output_ID']), '" ajax-url="', URL::site('ajax/output_details'), '" validate-url="', URL::site('ajax/unique/edit_output'), '">
							<span class="glyphicon glyphicon-pencil"></span></a></td>
						</tr>';
				}
			}
		}
	}
	?>
	</tbody>
</table>