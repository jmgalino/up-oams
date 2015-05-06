<?php
$accom = new Model_Accom;
$univ = new Model_Univ;
$user = new Model_User;
$session = Session::instance();

$cuma_details = $session->get('cuma_details');
$department_details = $univ->get_department_details(NULL, $session->get('program_ID'));
$department_programs = $univ->get_department_programIDs($department_details['department_ID']);
$department_users = $user->get_user_group($department_programs, NULL);
$programs = $univ->get_programs();

$program_IDs = array();
foreach ($department_programs as $program) {
	$program_IDs[] = $program['program_ID'];
}
?>

Table 1.4
<?php
foreach ($programs as $program)
{
	if (in_array($program['program_ID'], $program_IDs))
	{
		echo '<table class="table table-bordered table-condensed cuma-table" width="100%">
			<thead>
				<tr>
					<th colspan="9" style="text-align:left">Academic Program: ', $program['program_short'], '</th>
				</tr>
				<tr>
					<th rowspan="2">Name of Faculty<br>', $session->get('period'), '</th>
					<th rowspan="2">No. of<br>researches</th>
					<th colspan="3">Funding source and amount</th>
					<th rowspan="2">No. of<br>students<br>mentored</th>
					<th colspan="3">No. of awards<br>received</th>
				</tr>
				<tr>
					<th>UP</th>
					<th>External<br>(Specify)</th>
					<th>Total</th>
					<th>Acad</th>
					<th>Natl</th>
					<th>Intl</th>
				</tr>
			</thead>
			<tbody>';
		
		foreach ($department_users as $department_user)
		{
			if ($program['program_ID'] == $department_user['program_ID'])
			{
				$research = 0;
				$fund_up = 0.00;
				$research_external = '';
				$fund_external = 0.00;

				$awd_acad = 0;
				$awd_natl = 0;
				$awd_intl = 0;

				// Research
				$accom_IDs = $accom->get_faculty_accom($department_user['user_ID'], $cuma_details['period_from'], $cuma_details['period_to'], TRUE);
				if ($accom_IDs)
				{
					$accom_rch = $accom->get_accoms($accom_IDs, 'rch');
					
					if ($accom_rch)
					{
						$research += count($accom_rch);

						foreach ($accom_rch as $rch)
						{
							if ($rch['fund_up'])
								$fund_up += floatval(str_replace(',', '', $rch['fund_up']));
							if ($rch['fund_external'])
							{
								$research_external .= 'Php '.number_format($rch['fund_amount'], 2).'  '.$rch['fund_external'].'; ';
								$fund_external += floatval(str_replace(',', '', $rch['fund_amount']));
							}
						}
					}

					$accom_awd = $accom->get_accoms($accom_IDs, 'awd');

					if ($accom_awd)
					{
						foreach ($accom_awd as $awd)
						{
							switch ($awd['type']) {
								case 'Academe':
									$awd_acad++;
									break;
								
								case 'National':
									$awd_natl++;
									break;
								
								case 'International':
									$awd_intl++;
									break;
							}
						}
					}
				}

				$research_up = ($fund_up ? 'Php '.number_format($fund_up, 2) : '-');
				$research_total = (($fund_up OR $fund_external) ?'Php '.number_format(floatval(str_replace(',', '', $fund_up)) + floatval(str_replace(',', '', $fund_external)), 2) : '-');

				switch ($department_user['students_mentored']) {
					case 0:
						$students_mentored = 'None';
						break;

					case null:
						$students_mentored = 'Not Available';
						break;

					default:
						$students_mentored = '-';
						break;
				}

				echo '<tr>
					<td>', $department_user['last_name'], ', ', $department_user['first_name'], ' ', $department_user['middle_name'][0], '.', '</td>
					<td>', ($research ? $research : 'None'), '</td>
					<td>', $research_up, '</td>
					<td>', ($research_external == '' ? '-' : $research_external), '</td>
					<td>', $research_total, '</td>
					<td>', $students_mentored, '</td>
					<td>', ($awd_acad ? $awd_acad : 'None'), '</td>
					<td>', ($awd_natl ? $awd_natl : 'None'), '</td>
					<td>', ($awd_intl ? $awd_intl : 'None'), '</td>
				</tr>';
			}
		}

		echo '</tbody>
	</table>';
	}
}
?>
