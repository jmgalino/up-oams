<?php
function adjectival_rating($value)
{
	if ($value >= 5 ) return 'Outstanding';
	elseif ($value >= 4 ) return 'Very Satisfactory';
	elseif ($value >= 3 ) return 'Satisfactory';
	elseif ($value >= 2 ) return 'Unsatisfactory';
	else return 'Poor';
}
?>
<table class="table table-bordered padded">
	<tbody>
		<tr>
			<td style="background-color:#f5f5f5">Approved by:</td>
			<td class="text-center" width="75" style="background-color:#f5f5f5">Date</td>
		</tr>
		<tr>
			<td><br><br><br></td>
			<td></td>
		</tr>
		<tr>
			<td class="text-center" colspan="2"><strong>Name and Signature of Head of Agency</strong></td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered padded">
	<thead>
		<tr>
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">MFO/PAP</th>
			<th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">SUNCCESS INDICATORS<br>(TARGETS + MEASURES)</th>
			<th class="template-header" rowspan="2" width="80" style="background-color:#f5f5f5; font-size:10px;">Divisions/<br>Individuals<br>Accountable</th>
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
	<tbody>
	<?php
	$r_quantity = array();
	$r_efficiency = array();
	$r_timeliness = array();
	$r_average = array();

	foreach ($categories as $category)
	{
		echo '<tr><td class="category" colspan="9">', $category['category'], '</td></tr>';

		// foreach ($opcr_forms as $opcr_form)
		// {
			foreach ($outputs as $output)
			{
				if ($category['category_ID'] == $output['category_ID'])
				{
					// Set indicators
					$style1 = strpos($output['indicators'], 'Targets:');
					if ($style1 !== FALSE)
					{
						list($indicator, $imeasures) = explode('Measures:', $output['indicators']);
						list($nothingness, $itargets) = explode('Targets:', $indicator);
						$output['indicators'] = '<strong>Targets</strong>:'.$itargets.'<strong>Measures</strong>: '.$imeasures;
					}

					// Set ratings
					if ($output['r_quantity'] AND $output['r_efficiency'] AND $output['r_timeliness'])
					{
						$r_quantity[] = $output['r_quantity'];
						$r_efficiency[] = $output['r_efficiency'];
						$r_timeliness[] = $output['r_timeliness'];
						
						$rating = array($output['r_quantity'], $output['r_efficiency'], $output['r_timeliness']);
						$output['r_average'] = number_format(array_sum($rating)/3, 1);
						$r_average[] = $output['r_average'];
					}
					else
					{
						$output['r_quantity'] = '';
						$output['r_efficiency'] = '';
						$output['r_timeliness'] = '';
						$output['r_average'] = 'Inc';
					}

					echo '<tr>
						<td class="form-rows">', $output['output'], '</td>
						<td class="form-rows">', $output['indicators'], '</td>
						<td class="form-rows">', $output['accountable'], '</td>
						<td class="form-rows">', $output['actual_accom'], '</td>
						<td class="form-rows">', $output['r_quantity'], '</td>
						<td class="form-rows">', $output['r_efficiency'], '</td>
						<td class="form-rows">', $output['r_timeliness'], '</td>
						<td class="form-rows">', $output['r_average'], '</td>
						<td class="form-rows">', $output['remarks'], '</td>
					</tr>';

				} // if output is under categories
			} // foreach outputs
		// } // foreach opcr
	} // foreach categories
	?>
	</tbody>
</table>

<?php
$final_quantity = number_format(array_sum($r_quantity)/count($r_quantity), 1);
$final_efficiency = number_format(array_sum($r_efficiency)/count($r_efficiency), 1);
$final_timeliness = number_format(array_sum($r_timeliness)/count($r_timeliness), 1);
$final_average = number_format(array_sum($r_average)/count($r_average), 1);
?>

Average Rating

<table class="table table-bordered padded">
  <tbody>
    <tr>
      <td>Total Rating</td>
      <?php echo
      '<td width="20">', array_sum($r_quantity), '</td>
      <td width="20">', array_sum($r_efficiency), '</td>
      <td width="20">', array_sum($r_timeliness), '</td>
      <td width="20">', array_sum($r_average), '</td>';
      ?>
      <td width="55"></td>
    </tr>
    <tr>
      <td>Final Average Rating</td>
      <?php echo
      '<td width="20">', $final_quantity, '</td>
      <td width="20">', $final_efficiency, '</td>
      <td width="20">', $final_timeliness, '</td>
      <td width="20">', $final_average, '</td>';
      ?>
      <td width="55"></td>
    </tr>
    <tr>
      <td>Adjectival Rating</td>
      <?php echo 
      '<td width="20" style="font-size:10px">', adjectival_rating($final_quantity), '</td>
      <td width="20" style="font-size:10px">', adjectival_rating($final_efficiency), '</td>
      <td width="20" style="font-size:10px">', adjectival_rating($final_timeliness), '</td>
      <td width="20" style="font-size:10px">', adjectival_rating($final_average), '</td>';
      ?>
      <td width="55"></td>
    </tr>
  </tbody>
</table>

<table class="table table-bordered padded">
	<tbody>
		<tr>
			<td colspan="4">Assessed by:</td>
			<td colspan="2">Final Rating by:</td>
		</tr>
		<tr>
			<td><br></td>
			<td class="text-center" width="75" rowspan="2" style="vertical-align:top">Date</td>
			<td></td>
			<td class="text-center" width="75" rowspan="2" style="vertical-align:top">Date</td>
			<td></td>
			<td class="text-center" width="75" rowspan="2" style="vertical-align:top">Date</td>
		</tr>
		<tr>
			<td width="150" class="text-center">Planning Office</td>
			<td width="150" class="text-center">PMT</td>
			<td width="150" class="text-center">Head of Agency</td>
		</tr>
	</tbody>
</table>

