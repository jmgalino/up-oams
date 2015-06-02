<pagebreak>

Table 1.3
<?php
foreach ($programs as $program)
{
	if (in_array($program['program_ID'], $department_programIDs))
	{
		echo '<table class="table table-bordered table-condensed cuma-table" width="100%">
			<thead>
				<tr>
					<th colspan="9" style="text-align:left">Academic Program: ', $program['program_short'], '</th>
				</tr>
				<tr>
					<th rowspan="2">Name of Faculty<br>', $period, '</th>
					<th colspan="4">Educational Qualifications</th>
					<th rowspan="2" width="50">Average SATE Scores</th>
					<th colspan="3">Publications</th>
				</tr>
				<tr>
					<th>Highest<br>Degree</th>
					<th>Date<br>Obtained</th>
					<th>Where<br>Obtained</th>
					<th>Training/<br>Continuing<br>Education</th>
					<th width="50">No. of ISI<br>publications</th>
					<th width="50">No. of refereed<br>publications</th>
					<th width="50">No. of popular<br>publications</th>
				</tr>
			</thead>
			<tbody>';

		foreach ($department_users as $department_user)
		{
			$publication_isi = 0;
			$publication_refereed = 0;
			$publication_popular = 0;

			if ($program['program_ID'] == $department_user['program_ID'])
			{
				// Education
				$education = $user->get_education($department_user['user_ID'], 1);
				if ($education)
				{
					$date = ($education['date_obtained']
					? date('F Y', strtotime($education['date_obtained']))
					: 'N/A');
				}
				else
				{
					$education['major'] = '-';
					$date = '-';
					$education['institution'] = '-';
					$education['continuing'] = '-';
				}

				// Publication
				$accom_IDs = $accom->get_faculty_accom($department_user['user_ID'], $cuma_details['period_from'], $cuma_details['period_to'], TRUE);
				if ($accom_IDs)
				{
					$accom_pub = $accom->get_accoms($accom_IDs, 'pub');
					
					if ($accom_pub)
					{
						foreach ($accom_pub as $pub)
						{
							if ($pub['isi'] == 'Yes')
								$publication_isi++;

							if ($pub['refereed'] == 'Yes')
								$publication_refereed++;

							if ($pub['popular'] == 'Yes')
								$publication_popular++;
						}
					}
				}

				echo '<tr>
					<td class="first">', $department_user['last_name'], ', ', $department_user['first_name'], ' ', $department_user['middle_name'][0], '.', '</td>
					<td>', $education['major'], '</td>
					<td>', $date, '</td>
					<td>', $education['institution'], '</td>
					<td>', $education['continuing'], '</td>
					<td>', ($department_user['average_sate'] ? $department_user['average_sate'] : 'Not Available'), '</td>
					<td>', ($publication_isi ? $publication_isi : 'None'), '</td>
					<td>', ($publication_refereed ? $publication_refereed : 'None'), '</td>
					<td>', ($publication_popular ? $publication_popular : 'None'), '</td>
				</tr>';
			}
		}
		echo '</tbody>
	</table>';
	}
}
?>
