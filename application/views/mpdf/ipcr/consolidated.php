<?php
function adjectival_rating($value)
{
	if ($value >= 5 ) return 'Outstanding';
	elseif ($value >= 4 ) return 'Very Satisfactory';
	elseif ($value >= 3 ) return 'Satisfactory';
	elseif ($value >= 2 ) return 'Unsatisfactory';
	elseif ($value >= 1 ) return 'Poor';
}
?>
<table class="table table-bordered padded">
	<tbody>
		<tr>
			<td style="background-color:#f5f5f5">Reviewed by:</td>
			<td class="text-center" width="75" style="background-color:#f5f5f5">Date</td>
			<td style="background-color:#f5f5f5">Approved by:</td>
			<td class="text-center" width="75" style="background-color:#f5f5f5">Date</td>
		</tr>
		<tr>
			<td><br><br><br></td>
			<td rowspan="2"></td>
			<td></td>
			<td rowspan="2"></td>
		</tr>
		<tr>
			<td class="text-center">Immediate Supervisor</td>
			<td class="text-center">Head of Office</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered padded">
	<thead>
		<tr>
      <th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">MFO/PAP</th>
      <th class="template-header" rowspan="2" width="150" style="background-color:#f5f5f5;">Success Indicators<br>(Targets + Measures)</th>
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
					$r_quantity[] = $output['r_quantity'];
					$r_efficiency[] = $output['r_efficiency'];
					$r_timeliness[] = $output['r_timeliness'];
					
					$rating = array($output['r_quantity'], $output['r_efficiency'], $output['r_timeliness']);
					$r_average[] = number_format(array_sum($rating)/3, 1);
					echo number_format(array_sum($rating)/3, 1);
				}
				else
					echo 'Inc';

				echo '</td>
				<td class="form-rows">', $output['remarks'], '</td>
				</tr>';

				// foreach ($ipcr_forms as $ipcr)
				// {
				// 	foreach ($targets as $target)
				// 	{
				// 		if (($ipcr['ipcr_ID'] == $target['ipcr_ID']) AND ($output['output_ID'] == $target['output_ID']))
				// 		{
				// 	          // echo targets if targets belongs to ipcr
				// 			echo '<tr>
				// 			<td class="form-rows" style="padding-left: 25px;">', $target['target'], '</td>
				// 			<td class="form-rows" style="padding-left: 25px;">', $target['indicators'], '</td>
				// 			<td class="form-rows">';

				// 			foreach ($users as $user)
				// 			{
				// 				if ($ipcr['user_ID'] == $user['user_ID'])
				// 				{
				// 					echo $user['first_name'], ' ', $user['middle_name'][0], '. ', $user['last_name'];
				// 				}
				// 			} // foreach users

				// 			echo '</td>
				// 			<td class="form-rows">', $target['actual_accom'], '</td>
				// 			<td class="form-rows">', $target['r_quantity'], '</td>
				// 			<td class="form-rows">', $target['r_efficiency'], '</td>
				// 			<td class="form-rows">', $target['r_timeliness'], '</td>
				// 			<td class="form-rows">';

				// 			if ($target['r_quantity'] AND $target['r_efficiency'] AND $target['r_timeliness'])
				// 			{
				// 				$rating = array($target['r_quantity'], $target['r_efficiency'], $target['r_timeliness']);
				// 				echo number_format(array_sum($rating)/3, 1);
				// 			}

				// 			echo '</td>
				// 			<td class="form-rows">', $target['remarks'], '</td>
				// 			</tr>';
				// 		} // if target in under output and ipcr
				// 	} // foreach targets
			 //    } // foreach ipcrs
			} // if output is under categories
		} // foreach outputs
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
		<tr><td colspan="6" style="background-color:#f5f5f5">Comments and Recommendations for Development Purposes</td></tr>
		<tr>
			<td colspan="6"><br><br><br><br></td>
		</tr>
		<tr>
			<td class="text-center" width="150">Discussed with</td>
			<td class="text-center" width="75">Date</td>
			<td class="text-center" width="150">Assessed by:</td>
			<td class="text-center" width="75">Date</td>
			<td class="text-center" width="150">Final Rating by:</td>
			<td class="text-center" width="75">Date</td>
		</tr>
		<tr>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
			<td class="text-center" style="font-size:12px">
				I certify that I discussed my assessment of the performance with the employee
			</td>
			<td rowspan="3"></td>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
		</tr>
		<tr><td><br><br></td></tr>
		<tr>
			<td class="text-center">Employee</td>
			<td class="text-center">Supervisor</td>
			<td class="text-center">Head of Office</td>
		</tr>
	</tbody>
</table>

