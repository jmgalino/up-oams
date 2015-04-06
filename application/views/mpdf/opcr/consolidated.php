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
<table class="table table-bordered">
	<tbody>
		<tr>
			<td class="active" style="text-align:left">Approved by:</td>
			<td class="active" width="75">Date</td>
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

<table class="table table-bordered">
  <tr>
    <td class="active" rowspan="2" width="150">MFO/PAP</td>
    <td class="active" rowspan="2" width="150">Success Indicators<br>(Targets + Measures)</td>
    <td class="active" rowspan="2" width="80">Divisions/<br>Individuals<br>Accountable</td>
    <td class="active" rowspan="2" width="80">Actual Accomplishments</td>
    <td class="active" colspan="4">Rating</td>
    <td class="active" rowspan="2" width="55">Remarks</td>
  </tr>
  <tr>
    <td class="active" width="20">Q<sup>1</sup></td>
    <td class="active" width="20">E<sup>2</sup></td>
    <td class="active" width="20">T<sup>3</sup></td>
    <td class="active" width="20">A<sup>4</sup></td>
  </tr>
	<?php
	$r_quantity = array();
	$r_efficiency = array();
	$r_timeliness = array();
	$r_average = array();

	foreach ($categories as $category)
	{
		echo '<tr><th class="category" colspan="9">', $category['category'], '</th></tr>';

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
						$output['r_quantity'] = ($output['r_quantity'] ? $output['r_quantity'] : '');
						$output['r_efficiency'] = ($output['r_efficiency'] ? $output['r_efficiency'] : '');
						$output['r_timeliness'] = ($output['r_timeliness'] ? $output['r_timeliness'] : '');
						$output['r_average'] = ($output['r_quantity'] OR $output['r_efficiency'] OR $output['r_timeliness'] ? 'Inc' : '');
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
</table>

<?php
$final_quantity = number_format(array_sum($r_quantity)/count($r_quantity), 1);
$final_efficiency = number_format(array_sum($r_efficiency)/count($r_efficiency), 1);
$final_timeliness = number_format(array_sum($r_timeliness)/count($r_timeliness), 1);
$final_average = number_format(array_sum($r_average)/count($r_average), 1);
?>

Average Rating

<table class="table table-bordered">
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
      '<td width="20">', adjectival_rating($final_quantity), '</td>
      <td width="20">', adjectival_rating($final_efficiency), '</td>
      <td width="20">', adjectival_rating($final_timeliness), '</td>
      <td width="20">', adjectival_rating($final_average), '</td>';
      ?>
      <td width="55"></td>
    </tr>
  </tbody>
</table>

<table class="table table-bordered">
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

