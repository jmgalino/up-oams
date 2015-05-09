<table class="table" style="table-layout:fixed; width:100%;">
	<col>
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
			<th class="template-header" rowspan="2">MFO/PAP</th>
			<th class="template-header" rowspan="2" style="font-size:10px">Success Indicators<br>(Targets + Measures)</th>
			<th class="template-header" rowspan="2" style="font-size:10px">Divisions/<br>Individuals<br>Accountable</th>
			<th class="template-header" rowspan="2" style="font-size:10px">Actual<br>Accomplishments</th>
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
	<tbody style="font-size:10px">
	<?php
	foreach ($categories as $category)
	{
		echo '<tr><td class="category" colspan="9">', $category['category'], '</td></tr>';

		foreach ($outputs as $output)
		{
			if ($category['category_ID'] == $output['category_ID'])
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
				<td class="form-rows">', $output['accountable'], '</td>
				<td class="form-rows">', $output['actual_accom'], '</td>
				<td class="form-rows">', $output['r_quantity'], '</td>
				<td class="form-rows">', $output['r_efficiency'], '</td>
				<td class="form-rows">', $output['r_timeliness'], '</td>
				<td class="form-rows">';

				if ($output['r_quantity'] AND $output['r_efficiency'] AND $output['r_timeliness'])
				{
					$rating = array($output['r_quantity'], $output['r_efficiency'], $output['r_timeliness']);
					echo number_format(array_sum($rating)/3, 1);
				}
				else
					echo 'Inc';

				echo '</td>
				<td class="form-rows">', $output['remarks'], '</td>
				</tr>';

				foreach ($ipcr_forms as $ipcr)
				{
					foreach ($targets as $target)
					{
						if (($ipcr['ipcr_ID'] == $target['ipcr_ID']) AND ($output['output_ID'] == $target['output_ID']))
						{
					          // echo targets if targets belongs to ipcr
							echo '<tr>
							<td class="form-rows" style="padding-left: 25px;">', $target['target'], '</td>
							<td class="form-rows" style="padding-left: 25px;">', $target['indicators'], '</td>
							<td class="form-rows">';

							foreach ($users as $user)
							{
								if ($ipcr['user_ID'] == $user['user_ID'])
								{
									echo $user['first_name'], ' ', $user['middle_name'][0], '. ', $user['last_name'];
								}
							} // foreach users

							echo '</td>
							<td class="form-rows">', $target['actual_accom'], '</td>
							<td class="form-rows">', $target['r_quantity'], '</td>
							<td class="form-rows">', $target['r_efficiency'], '</td>
							<td class="form-rows">', $target['r_timeliness'], '</td>
							<td class="form-rows">';

							if ($target['r_quantity'] AND $target['r_efficiency'] AND $target['r_timeliness'])
							{
								$rating = array($target['r_quantity'], $target['r_efficiency'], $target['r_timeliness']);
								echo number_format(array_sum($rating)/3, 1);
							}

							echo '</td>
							<td class="form-rows">', $target['remarks'], '</td>
							</tr>';
						} // if target in under output and ipcr
					} // foreach targets
			    } // foreach ipcrs
			} // if output is under categories
		} // foreach outputs
	} // foreach categories
	?>
	</tbody>
</table>