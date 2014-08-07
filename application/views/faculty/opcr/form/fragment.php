<table class="table">
	<thead>
		<tr>
			<th class="active text-center" style="font-size:17px;font-weight:500;">MFO/PAP</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($categories as $category)
	{
		echo '<tr><td class="category">', $category['category'], '</td></tr>';
			
		if ($outputs)
		{
			foreach ($outputs as $output)
			{
				if ($category['category_ID'] == $output['category_ID'])
				{
					echo '<tr><td class="output"> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $output['output'], '&nbsp;&nbsp;
						<a id="deleteOutput" href='.URL::site('faculty/opcr/remove/'.$output['output_ID']).'>
						<span class="glyphicon glyphicon-remove-circle"></span></a></td></tr>';
				}
			}
		}
	}
	?>
	</tbody>
</table>