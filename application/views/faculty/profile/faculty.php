<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">Faculty Members</li>
</ol>

<h3>
	Faculty Members
	<small><?php echo $group; ?></small>
</h3>
<br>

<!-- Table -->
<table class="table table-hover" id="faculty_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th></th>
			<th>Faculty</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php
	$model = new Model_User;

	foreach ($users as $user)
	{
		$photo = ($user['pic']
			? URL::base().'files/upload_photos/'.$user['pic']
				: URL::base().'application/assets/img/default.jpg');

		foreach ($programs as $program)
		{
			if ($program['program_ID'] == $user['program_ID'])
			{
				$program = $program['program_short'];
				break;
			}
		}

		$education = ($model->get_education($user['user_ID'], 1)
			? $model->get_education($user['user_ID'], 1)['major']
			: 'Not Available');

		echo
		'<tr>
			<td width="125"><img class="img-responsive" src="', $photo, '" title="', $user['faculty_code'], '"></td>
			<td>
				<p>', $user['last_name'], ', ', $user['first_name'], ' ', $user['middle_name'][0], '.</p>
				<p style="font-size: 90%">', $education, '</p>
				<p style="font-size: 90%">', $program, '</p>
			</td>
			<td width="125" style="vertical-align:top;"><a class="btn btn-default" href="', $profile_url, $user['employee_code'], '">View Profile</a></td>
		</tr>';
	}
	?>
	</tbody>
</table>
