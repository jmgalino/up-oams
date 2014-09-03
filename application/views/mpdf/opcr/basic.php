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
                  echo $user['first_name'], ' ', $user['middle_initial'], '. ', $user['last_name'];
                }
              } // foreach users

              echo '</td>
                <td class="form-rows">', $target['actual_accom'], '</td>
                <td class="form-rows">', $target['r_quantity'], '</td>
                <td class="form-rows">', $target['r_efficiency'], '</td>
                <td class="form-rows">', $target['r_timeliness'], '</td>
                <td class="form-rows">';

              if ($target['r_quantity'] AND $target['r_efficiency'] AND $target['r_timeliness'])
                echo array_sum($rating)/count($rating);

              echo '</td>
                <td class="form-rows">', $target['r_timeliness'], '</td>
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