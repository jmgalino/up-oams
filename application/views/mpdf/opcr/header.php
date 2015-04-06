<?php
echo '<h1 class="text-center">OFFICE PERFORMANCE COMMITMENT REPORT (OPCR)</h1>';
echo '<br>';

echo '<p style="text-indent: 20px;">I, <span style="text-decoration: underline;">', $fullname, '</span>',
   ' of the <span style="text-decoration: underline;">', $unit['fullname'], '</span>',
  ' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
  '<span style="text-decoration: underline;">', $start, '</span> to ',
  '<span style="text-decoration: underline;">', $end, '</span>.</p>';
echo '<br>';

echo '<table width="200" align="right">
  <tbody>
    <tr><td class="text-center" style="border-bottom:1px solid #000;">', $fullname, '</td></tr>
    <tr><td class="text-center">Unit Head, ', $unit['short'], '</td></tr>
    <tr><td class="text-center">Date: ', $date, '</td></tr>
  </tbody>
</table><br>';
?>