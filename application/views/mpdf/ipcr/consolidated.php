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
<table class="table table-bordered">
	<tbody>
		<tr>
			<td class="active" style="text-align:left">Accepted by:</td>
			<td class="active" width="75">Date</td>
		</tr>
		<tr>
			<td><br><br><br></td>
			<td></td>
		</tr>
		<tr>
			<td class="text-center">Name and Signature of Head of Agency</td>
			<td></td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered">
	<tr>
		<td class="active" rowspan="2" width="150">MFO/PAP</td>
		<td class="active" rowspan="2" width="150">SUNCCESS INDICATORS<br>(TARGETS + MEASURES)</td>
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
	$counter = 0;
	$attachments = array();
	$r_quantity = array();
	$r_efficiency = array();
	$r_timeliness = array();
	$r_average = array();

	foreach ($categories as $category)
	{
		echo '<tr><th class="category" colspan="9">', $category['category'], '</th></tr>';

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

				$attachment = "";
				foreach ($ipcr_forms as $ipcr)
				{
					foreach ($targets as $target)
					{
						if (($ipcr['ipcr_ID'] == $target['ipcr_ID']) AND ($output['output_ID'] == $target['output_ID']))
						{

							if ($target['attachment'])
							{
								$attachments[$counter++] = $target['attachment'];
								$attachment .= '<a class="glyphicon glyphicon-paperclip" href="#attachment_'.$counter.'" target="_blank">
												<sup style="padding-left:1px;">['.$counter.']</sup>
											</a> ';
							}
				// 			foreach ($users as $user)
				// 			{
				// 				if ($ipcr['user_ID'] == $user['user_ID'])
				// 					$user = $user['first_name'], ' ', $user['middle_name'][0], '. ', $user['last_name'];
				// 			} // foreach users

				// 			if ($target['r_quantity'] AND $target['r_efficiency'] AND $target['r_timeliness'])
				// 			{
				// 				$rating = array($target['r_quantity'], $target['r_efficiency'], $target['r_timeliness']);
				// 				$target['r_average'] = number_format(array_sum($rating)/3, 1);
				// 			}
				// 			else
				// 			{
				// 				$target['r_quantity'] = '';
				// 				$target['r_efficiency'] = '';
				// 				$target['r_timeliness'] = '';
				// 				$target['r_average'] = '';
				// 			}
				// 			// echo targets if targets belongs to ipcr
				// 			echo '<tr>
				// 				<td class="form-rows" style="padding-left: 25px;">', $target['target'], '</td>
				// 				<td class="form-rows" style="padding-left: 25px;">', $target['indicators'], '</td>
				// 				<td class="form-rows">', $user, '</td>
				// 				<td class="form-rows">', $target['actual_accom'], '</td>
				// 				<td class="form-rows">', $target['r_quantity'], '</td>
				// 				<td class="form-rows">', $target['r_efficiency'], '</td>
				// 				<td class="form-rows">', $target['r_timeliness'], '</td>
				// 				<td class="form-rows">', $target['r_average'], '</td>
				// 				<td class="form-rows">', $target['r_timeliness'], '</td>
				// 			</tr>';

						} // if target in under output and ipcr
					} // foreach targets
				} // foreach ipcrs

				echo '<tr>
					<td class="form-rows">', $output['output'], '</td>
					<td class="form-rows">', $output['indicators'], '</td>
					<td class="form-rows">', $output['accountable'], '</td>
					<td class="form-rows">', $output['actual_accom'], '</td>
					<td class="form-rows">', $output['r_quantity'], '</td>
					<td class="form-rows">', $output['r_efficiency'], '</td>
					<td class="form-rows">', $output['r_timeliness'], '</td>
					<td class="form-rows">', $output['r_average'], '</td>
					<td class="form-rows">', $output['remarks'],' ', $attachment ,'</td>
				</tr>';

			} // if output is under categories
		} // foreach outputs
	} // foreach categories

	$session->set('attachments', $attachments);
	?>
</table>

<?php
$final_quantity = (count($r_quantity) ? number_format(array_sum($r_quantity)/count($r_quantity), 1) : 0);
$final_efficiency = (count($r_efficiency) ? number_format(array_sum($r_efficiency)/count($r_efficiency), 1) : 0);
$final_timeliness = (count($r_timeliness) ? number_format(array_sum($r_timeliness)/count($r_timeliness), 1) : 0);
$final_average = (count($r_average) ? number_format(array_sum($r_average)/count($r_average), 1) : 0);
?>

Average Rating
<table class="table table-bordered">
	<thead>
		<tr>
			<th></th>
			<th class="text-center" width="75">Q<sup>1</sup></th>
			<th class="text-center" width="75">E<sup>2</sup></th>
			<th class="text-center" width="75">T<sup>3</sup></th>
			<th class="text-center" width="75">A<sup>4</sup></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Total Rating</td>
			<?php echo
			'<td class="text-center">', array_sum($r_quantity), '</td>
			<td class="text-center">', array_sum($r_efficiency), '</td>
			<td class="text-center">', array_sum($r_timeliness), '</td>
			<td class="text-center">', array_sum($r_average), '</td>';
			?>
		</tr>
		<tr>
			<td>Final Average Rating</td>
			<?php echo
			'<td class="text-center">', $final_quantity, '</td>
			<td class="text-center">', $final_efficiency, '</td>
			<td class="text-center">', $final_timeliness, '</td>
			<td class="text-center">', $final_average, '</td>';
			?>
		</tr>
		<tr>
			<td>Adjectival Rating</td>
			<?php echo 
			'<td class="text-center">', adjectival_rating($final_quantity), '</td>
			<td class="text-center">', adjectival_rating($final_efficiency), '</td>
			<td class="text-center">', adjectival_rating($final_timeliness), '</td>
			<td class="text-center">', adjectival_rating($final_average), '</td>';
			?>
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
			<td class="text-center" width="150">Planning Office</td>
			<td class="text-center" width="150">PMT</td>
			<td class="text-center" width="150">Head of Agency</td>
		</tr>
	</tbody>
</table>

