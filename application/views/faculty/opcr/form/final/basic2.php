<?php
echo '<h1 class="text-center">Office Performance Commitment and Review (OPCR)</h1>';
echo '<br>';

echo '<p style="text-indent: 20px;">I, <span style="text-decoration: underline;">', $session->get('fullname'), '</span>',
   ' of the <span style="text-decoration: underline;">', $department['department'], '</span>',
  ' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
  '<span style="text-decoration: underline;">', $period_from->format('F Y'), '</span> to ',
  '<span style="text-decoration: underline;">', $period_to->format('F Y'), '</span>.</p>';
echo '<br>';

echo '<table width="200" align="right">
  <tbody>
    <tr><td class="text-center" style="border-bottom:1pt solid black">', $session->get('fullname'), '</td></tr>
    <tr><td class="text-center">Unit Head, ', $label, '</td></tr>
    <tr><td class="text-center">Date: ', date_format(date_create($opcr_details['date_published']), 'F d, Y'), '</td></tr>
  </tbody>
</table><br>';
?>

<!--BASIC -->

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
      <td class="text-center" colspan="2"><strong>Name and Signature of Head of Agency</<strong></td>
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
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="form-rows">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                    echo $user['first_name'], ' ', $user['middle_name'], '. ', $user['last_name'];
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
                  $average = array_sum($rating)/3;
                  echo number_format($average, 1);

                  $r_quantity[] = $target['r_quantity'];
                  $r_efficiency[] = $target['r_efficiency'];
                  $r_timeliness[] = $target['r_timeliness'];
                  $r_average[] = $average;
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

<!-- LEGEND -->

<p>
	Legend: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	1 - <em>Quantity</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	2 - <em>Efficiency</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	3 - <em>Timeliness</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	4 - <em>Average</em> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</p>

<table class="table table-bordered padded" width="300">
	<thead>
		<tr>
			<th class="text-center" colspan="2">Adjectival Rating (Proposed)</th>
			<th class="text-center" width="80">Numerical Rating</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Outstanding</td>
			<td>96% and above</td>
			<td class="text-center">5</td>
		</tr>
		<tr>
			<td>Very Satisfactory</td>
			<td>86% - 95%</td>
			<td class="text-center">4</td>
		</tr>
		<tr>
			<td>Satisfactory</td>
			<td>76% - 85%</td>
			<td class="text-center">3</td>
		</tr>
		<tr>
			<td>Unsatisfactory</td>
			<td>66% - 75%</td>
			<td class="text-center">2</td>
		</tr>
		<tr>
			<td>Poor</td>
			<td>65% and below</td>
			<td class="text-center">1</td>
		</tr>
	</tbody>
</table>
