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
          $rating = array($output['r_quantity'], $output['r_efficiency'], $output['r_timeliness']);
          $output['r_average'] = number_format(array_sum($rating)/3, 1);

          $r_quantity[] = $output['r_quantity'];
          $r_efficiency[] = $output['r_efficiency'];
          $r_timeliness[] = $output['r_timeliness'];
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
  } // foreach categories
  ?>
</table>

<?php
$final_quantity = ($r_quantity ? number_format(array_sum($r_quantity)/count($r_quantity), 1) : NULL);
$final_efficiency = ($r_efficiency ? number_format(array_sum($r_efficiency)/count($r_efficiency), 1) : NULL);
$final_timeliness = ($r_timeliness ? number_format(array_sum($r_timeliness)/count($r_timeliness), 1) : NULL);
$final_average = ($r_average ? number_format(array_sum($r_average)/count($r_average), 1) : NULL);
?>

Average Rating
<table class="table table-bordered">
  <thead>
    <tr>
      <th></th>
      <th class="text-center">Q<sup>1</sup></th>
      <th class="text-center">E<sup>2</sup></th>
      <th class="text-center">T<sup>3</sup></th>
      <th class="text-center">A<sup>4</sup></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Total Rating</td>
      <?php echo
      '<td class="text-center" width="20">', ($r_quantity ? array_sum($r_quantity) : ''), '</td>
      <td class="text-center" width="20">', ($r_efficiency ? array_sum($r_efficiency) : ''), '</td>
      <td class="text-center" width="20">', ($r_timeliness ? array_sum($r_timeliness) : ''), '</td>
      <td class="text-center" width="20">', ($r_average ? array_sum($r_average) : ''), '</td>';
      ?>
    </tr>
    <tr>
      <td>Final Average Rating</td>
      <?php echo
      '<td class="text-center" width="20">', ($final_quantity ? $final_quantity : ''), '</td>
      <td class="text-center" width="20">', ($final_efficiency ? $final_efficiency : ''), '</td>
      <td class="text-center" width="20">', ($final_timeliness ? $final_timeliness : ''), '</td>
      <td class="text-center" width="20">', ($final_average ? $final_average : ''), '</td>';
      ?>
    </tr>
    <tr>
      <td>Adjectival Rating</td>
      <?php echo 
      '<td class="text-center" width="20">', ($final_quantity ? adjectival_rating($final_quantity) : ''), '</td>
      <td class="text-center" width="20">', ($final_efficiency ? adjectival_rating($final_efficiency) : ''), '</td>
      <td class="text-center" width="20">', ($final_timeliness ? adjectival_rating($final_timeliness) : ''), '</td>
      <td class="text-center" width="20">', ($final_average ? adjectival_rating($final_average) : ''), '</td>';
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