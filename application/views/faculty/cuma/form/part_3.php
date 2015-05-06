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

Table 1.2
<table class="table table-bordered table-condensed cuma-table" width="100%">
	<thead>
		<tr>
			<th rowspan="3">Academic Program</th>
			<th colspan="4">Average Age of Faculty Complement</th>
			<th colspan="4">Research Activities</th>
		</tr>
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Senior (Associate &<br>Full Professors)</th>
			<th rowspan="2">No.</th>
			<th rowspan="2">Junior (Instructor &<br>Assistant<br>Professors)</th>
			<th colspan="2">Researches in the<br>past 3 years</th>
			<th colspan="2">Publications</th>
		</tr>
		<tr>
			<th>No.</th>
			<th>Nature</th>
			<th>No.</th>
			<th>ISI/<br>Peer-reviewed</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($programs as $program)
	{
		if (in_array($program['program_ID'], $program_IDs))
		{
			$senior = array();
			$junior = array();
			$research = 0;
			$research_basic = 0;
			$research_applied = 0;
			$research_policy = 0;
			$publication = 0;
			$publication_isi = 0;
			$publication_peer = 0;

			foreach ($department_users as $department_user)
			{
				if ($program['program_ID'] == $department_user['program_ID'])
				{
					// Age of Faculty
					if (in_array($department_user['rank'], array('Prof.', 'Assoc. Prof.')))
						$senior[] = date_diff(date_create(), date_create($department_user['birthday']))->y;
					elseif (in_array($department_user['rank'], array('Asst. Prof.', 'Inst.')))
						$junior[] = date_diff(date_create(), date_create($department_user['birthday']))->y;

					$accom_IDs = $accom->get_faculty_accom($department_user['user_ID'], $cuma_details['period_from'], $cuma_details['period_to'], TRUE);
					if ($accom_IDs)
					{
						$accom_rch = $accom->get_accoms($accom_IDs, 'rch');
						$accom_pub = $accom->get_accoms($accom_IDs, 'pub');

						// Research
						if ($accom_rch)
						{
							$research += count($accom_rch);

							foreach ($accom_rch as $rch)
							{
								switch ($rch['nature']) {
									case 'Basic':
										$research_basic++;
										break;
								
									case 'Applied':
										$research_applied++;
										break;

									case 'Policy':
										$research_policy++;
										break;
								}
							}
						}
						
						// Publication
						if ($accom_pub)
						{
							$publication += count($accom_pub);

							foreach ($accom_pub as $pub)
							{
								if ($pub['isi'] == 'Yes')
									$publication_isi++;

								if ($pub['peer_reviewed'] == 'Yes')
									$publication_peer++;
							}
						}
					}
				}
			}

			$senior_count = count($senior);
			$junior_count = count($junior);
			
			$senior_ave = ($senior_count
				? number_format(array_sum($senior)/count($senior))
				: '-');
			$junior_ave = ($junior_count
				? number_format(array_sum($junior)/count($junior))
				: '-');

			$nature = ($research
				? $research_basic.' Basic; '.$research_applied.' Applied; '.$research_policy.' Policy'
				: '-');
			
			$recognition = ($publication
				? $publication_isi.' ISI; '.$publication_peer.' Peer-reviewed'
				: '-');

			echo '<tr>
				<td>', $program['program_short'], '</td>
				<td>', ($senior_count ? $senior_count : 'None'), '</td>
				<td>', $senior_ave, '</td>
				<td>', ($junior_count ? $junior_count : 'None'), '</td>
				<td>', $junior_ave, '</td>
				<td>', $research, '</td>
				<td>', $nature,'</td>
				<td>', $publication, '</td>
				<td>', $recognition, '</td>
			</tr>';
		}
	}
	?>
	</tbody>
</table>
