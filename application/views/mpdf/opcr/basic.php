<table class="table table-bordered">
	<tbody class="padded">
		<tr>
			<td style="background-color:#f5f5f5;">Approved by:</td>
			<td class="text-center" width="75" style="background-color:#f5f5f5;">Date</td>
		</tr>
		<tr>
			<td><br></td>
			<td></td>
		</tr>
		<tr>
			<td class="text-center" colspan="2"><strong>Name and Signature of Head of Agency</strong></td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered">
	<thead>
		<tr class="padded">
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">MFO/PAP</th>
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">Success Indicators<br>(Targets + Measures)</th>
			<th class="template-header" rowspan="2" width="80" style="background-color:#f5f5f5; font-size:10px;">Divisions/Individuals<br>Accountable</th>
			<th class="template-header" rowspan="2" width="80" style="background-color:#f5f5f5; font-size:10px;">Actual Accomplishments</th>
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
		$outputs = $opcr->get_outputs($opcr_ID);
		$categories = $opcr->get_categories();

		foreach ($categories as $category)
		{
			echo '<tr><td class="category" colspan="9">', $category['category'], $opcr_ID, '</td></tr>';

			if ($outputs)
			{
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
								list($indicator, $measures) = explode('Measures:', $output['indicators']);
								list($nothingness, $targets) = explode('Targets:', $indicator);
								echo '<strong>Targets</strong>:', $targets;
								echo '<strong>Measures</strong>: ', $measures;
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
							<td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>';
					}
				}
			}
		}
		?>
	</tbody>
</table>

<table class="table table-bordered padded">
	<tbody>
		<tr>
			<td>Average Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="55"></td>
		</tr>
		<tr>
			<td>Total Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="55"></td>
		</tr>
		<tr>
			<td>Final Average Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="55"></td>
		</tr>
		<tr>
			<td>Adjectival Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="55"></td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered padded">
	<tbody>
		<tr>
			<td colspan="4">Assessed by:</td>
			<td>Final Rating by:</td>
			<td class="text-center" width="75">Date</td>
		</tr>
		<tr>
			<td><br></td>
			<td style="vertical-align:top" class="text-center" rowspan="2" width="75">Date</td>
			<td></td>
			<td style="vertical-align:top" class="text-center" rowspan="2" width="75">Date</td>
			<td></td>
			<td rowspan="2"></td>
		</tr>
		<tr>
			<td class="text-center">Planning Office</td>
			<td class="text-center">PMT</td>
			<td class="text-center">Head of Agency</td>
		</tr>
	</tbody>
</table>