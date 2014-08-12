<table class="table table-bordered">
	<tbody>
		<tr class="active">
			<td>Approved by:</td>
			<td class="text-center" width="75">Date</td>
		</tr>
		<tr>
			<td><br></td>
			<td></td>
		</tr>
		<tr>
			<td class="text-center" colspan="2">Name and Signature of Head of Agency</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<th class="template-header" rowspan="2" width="165" style="background-color: #f5f5f5;">MFO/PAP</th>
			<th class="template-header" rowspan="2" width="165" style="background-color: #f5f5f5;">Success Indicator<br>(Target + Measure)</th>
			<th class="template-header" rowspan="2" width="150" style="background-color: #f5f5f5;">Divisions/<br>Individuals<br>Accountable</th>
			<th class="template-header" rowspan="2" width="150" style="background-color: #f5f5f5;">Actual<br>Accomplishments</th>
			<th class="template-header" colspan="4" style="background-color: #f5f5f5;">Rating</th>
			<th class="template-header" rowspan="2" width="100" style="background-color: #f5f5f5;">Remarks</th>
		</tr>
		<tr>
			<th class="template-header" width="20" style="background-color: #f5f5f5;">Q<sup>1</sup></th>
			<th class="template-header" width="20" style="background-color: #f5f5f5;">E<sup>2</sup></th>
			<th class="template-header" width="20" style="background-color: #f5f5f5;">T<sup>3</sup></th>
			<th class="template-header" width="20" style="background-color: #f5f5f5;">A<sup>4</sup></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$opcr = new Model_Opcr;
		$session = Session::instance();

		$outputs = $opcr->get_outputs($opcr_ID);
		$categories = $opcr->get_categories();

		foreach ($categories as $category)
		{
			echo '<tr><td class="category text-uppercase" colspan="9">', $category['category'], '</td></tr>';

			if ($outputs)
			{
				foreach ($outputs as $output)
				{
					if ($category['category_ID'] == $output['category_ID'])
					{
						echo '<tr>
							<td class="success form-rows">', $output['output'], '</td>
							<td class="success form-rows">';

							$targets = strstr($output['indicators'], 'Measures:');
							echo $targets;

						echo '</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td class="success form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>';
					}
				}
			}
		}
		?>
	</tbody>
</table>

<table class="table table-bordered">
	<tbody>
		<tr>
			<td>Average Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="100"></td>
		</tr>
		<tr>
			<td>Total Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="100"></td>
		</tr>
		<tr>
			<td>Final Average Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="100"></td>
		</tr>
		<tr>
			<td>Adjectival Rating</td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="20"></td>
			<td width="100"></td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered">
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