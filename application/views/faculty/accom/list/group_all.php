<?php
/**
 * Return names
 */
function reuser($user_IDs, $users)
{
	$name = '';

	if (count($user_IDs) == 1)
	{
		foreach ($users as $user)
		{
			if ($user_IDs == $user['user_ID'])
			{
				$name = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'][0].'.';
				break;
			}
		}
	}
	else
	{
		$names = array();
		$names2 = array();
		foreach ($user_IDs as $user_ID)
		{
			if (is_numeric($user_ID))
			{
				foreach ($users as $user)
				{
					if ($user_ID == $user['user_ID'])
					{
						$names[] = $user['last_name'].', '.$user['first_name'].' '.$user['middle_name'][0].'.';
						break;
					}
				}
			}
			else
			{
				$names2[] = $user_ID; echo $user_ID, 'in';
			}
		}

		$count = count($names);
		for ($i = 0; $i < $count; $i++)
		{
			$name .= $names[$i];

			if (($count == 2) AND ($i == $count-2) AND (!$names2))
				$name .= ' and ';
			else if (($count > 2) AND ($i == $count-2) AND (!$names2))
				$name .= ', and ';
			else if ($i == $count-1)
				$name .= '';
			else
				$name .= ', ';
		}
		
		if ($names2)
		{
			$count2 = count($names2);
			for ($i = 0; $i < $count2; $i++)
			{
				$name .= $names2[$i];

				if (($count2 == 2) AND ($i == $count2-2))
					$name .= ' and ';
				else if (($count2 > 2) AND ($i == $count2-2))
					$name .= ', and ';
				else if ($i == $count2-1)
					$name .= '';
				else
					$name .= ', ';
			}
		}

	}

	return $name;
}

/**
 * Change and improve date format
 */
function redate($start, $end)
{
	$date = '';

	$stime = strtotime($start);
	$sdate = date('d', $stime);
	$smonth = date('F', $stime);
	$syear = date('Y', $stime);

	$etime = strtotime($end);
	$edate = date('d', $etime);
	$emonth = date('F', $etime);
	$eyear = date('Y', $etime);

	if (($smonth == $emonth) AND ($syear == $eyear))
	{
		if ($sdate == $edate)
		{
			$date = date('F d, Y', strtotime($start));
		}
		else
		{
			$date = $smonth.' '.$sdate.'-'.$edate.', '.$syear;
		}
	}
	else
		$date = date('F d, Y', strtotime($start)).' - '.date('F d, Y', strtotime($end));

	return $date;
}
?>

<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active"><?php echo ($identifier == 'chair'
		? 'Accomplishment Reports - Department'
		: 'Accomplishment Reports - College'); ?></li>
</ol>

<?php if ($accom_reports): ?>
<div class="row">
	<div class="col-md-6">
		<form class="form-inline" role="form">
			<div class="form-group">
				<label for="search" style="font-size: 16px; font-weight: normal; padding-right: 20px;">Search</label>
				<input type="text" class="form-control" id="search">
			</div>
		</form>
	</div>
	<div class="col-md-6">
		<a class="btn btn-default pull-right" href="<?php echo ($identifier == 'chair'
		? URL::site('faculty/accom_dept')
		: URL::site('faculty/accom_coll')); ?>" role="button">
		<span class="glyphicon glyphicon-arrow-left"></span> Back</a>
	</div>
</div><br>

<!-- Publication Table -->
<?php if ($accom_pub): ?>
<h4>I. Journal Publication/Book/Chapter in a Book</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Author/s</th>
			<th>Year</th>
			<th>Title</th>
			<th>Type</th>
			<th>Other Details</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_pub as $pub)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($pub['user_ID'], $users);

		if ($pub['author']) echo ' and ', $pub['author'];

		echo '</td>';
		echo '<td>', $pub['year'], '</td>';
		echo '<td>', $pub['title'], '</td>';
		echo '<td>', $pub['type'], '</td>';
		echo '<td>';

		echo ($pub['type'] === 'Journal'
			? $pub['journal_volume'].'('.$pub['journal_issue'].'): '
			: $pub['book_publisher'].'. '.$pub['book_place'].'. ');

		echo $pub['page'], '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Award Table -->
<?php if ($accom_awd): ?>
<h4>II. Awards/Grants Received</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Name/s of Faculty</th>
			<th>Award/Grant</th>
			<th>Duration</th>
			<th>Source</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_awd as $awd)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($awd['user_ID'], $users), '</td>';
		echo '<td>', $awd['award'], '</td>';
		echo '<td>', redate($awd['start'], $awd['end']), '</td>';
		echo '<td>', $awd['source'], '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Research Table -->
<?php if ($accom_rch): ?>
<h4>III. Research Grants/Fellowship Received</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first" rowspan="2">Name/s of Faculty</th>
			<th rowspan="2">Title</th>
			<th rowspan="2">Fund Source</th>
			<th rowspan="2">Duration</th>
			<th colspan="2" style="border-bottom: 1px solid #ddd;">Amount of Grant</th>
		</tr>
		<tr>
			<th>External</th>
			<th>UP</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_rch as $rch)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($rch['user_ID'], $users), '</td>';
		echo '<td>', $rch['title'], '</td>';
		echo '<td>';

		echo ($rch['fund_external'] 
			? $rch['fund_up']
				? 'UP System Research Grant and '.$rch['fund_external']
				: $rch['fund_external']
			: 'UP System Research Grant');

		echo '</td>';
		echo '<td>', redate($rch['start'], $rch['end']), '</td>';
		echo '<td>Php ', number_format($rch['fund_amount'], 2), '</td>';
		echo '<td>Php ', number_format($rch['fund_up'], 2), '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Paper Table -->
<?php if ($accom_ppr): ?>
<h4>IV. Oral Paper/Poster Presentation</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Author/s</th>
			<th>Title</th>
			<th>Activity</th>
			<th>Venue</th>
			<th>Inclusive Dates</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_ppr as $ppr)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($ppr['user_ID'], $users);

		if ($ppr['author']) echo ' and ', $ppr['author'];

		echo '</td>';
		echo '<td>', $ppr['title'], '</td>';
		echo '<td>', $ppr['activity'], '</td>';
		echo '<td>', $ppr['venue'], '</td>';
		echo '<td>', redate($ppr['start'], $ppr['end']), '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Creative Table -->
<?php if ($accom_ctv): ?>
<h4>V. Presentation of Creative Work Output</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Author/s</th>
			<th>Title of Artistic Work</th>
			<th>Venue</th>
			<th>Inclusive Dates</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_ctv as $ctv)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($ctv['user_ID'], $users);

		if ($ctv['author']) echo ' and ', $ctv['author'];

		echo '</td>';
		echo '<td>', $ctv['title'], '</td>';
		echo '<td>', $ctv['venue'], '</td>';
		echo '<td>', redate($ctv['start'], $ctv['end']), '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Participation Table -->
<?php if ($accom_par): ?>
<h4>VI. Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Name/s of Faculty</th>
			<th>Participation</th>
			<th>Title</th>
			<th>Venue</th>
			<th>Inclusive Dates</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_par as $par)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($par['user_ID'], $users), '</td>';
		echo '<td>', $par['participation'], '</td>';
		echo '<td>', $par['title'], '</td>';
		echo '<td>', $par['venue'], '</td>';
		echo '<td>', redate($par['start'], $par['end']), '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Material Table -->
<?php if ($accom_mat): ?>
<h4>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Author/s</th>
			<th>Year</th>
			<th>Title</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_mat as $mat)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($mat['user_ID'], $users);

		if ($mat['author']) echo ' and ', $mat['author'];

		echo '</td>';
		echo '<td>', $mat['year'], '</td>';
		echo '<td>', $mat['title'], '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<!-- Other Table -->
<?php if ($accom_oth): ?>
<h4>VIII. Other</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Name/s of Faculty</th>
			<th>Participation</th>
			<th>Activity</th>
			<th>Venue</th>
			<th>Inclusive Dates</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_oth as $oth)
	{
		echo '<tr>';
		echo '<td class="first">', reuser($oth['user_ID'], $users), '</td>';
		echo '<td>', $oth['participation'], '</td>';
		echo '<td>', $oth['activity'], '</td>';
		echo '<td>', $oth['venue'], '</td>';
		echo '<td>', redate($oth['start'], $oth['end']), '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<?php else: ?>
<div class="alert alert-danger text-center"><p>The list is empty.</p></div>
<span class="help-block">Note: Only accomplishments from approved reports will be included.</span>
<?php endif; ?>