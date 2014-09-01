<?php
function redate($start, $end)
{
	$date = '';

	$stime = strtotime($start);
	$sdate = date('d', $stime);
	$smonth = date('F', $stime);
	$syear = date('Y', $stime);

	$etime = strtotime($end);
	$edate = date('d', $etime);;
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
	<li><a href="<?php echo URL::site('faculty/accom'); ?>">Accomplishment Reports</a></li>
	<li class="active">My Accomplishments</li>
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
		<a class="btn btn-default pull-right" href="<?php echo URL::site('faculty/accom'); ?>" role="button">
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
		echo '<td class="first">', $name;

		if ($pub['author']) echo ' and ', $pub['author'];

		echo '</td>';
		echo '<td>', $pub['year'], '</td>';
		echo '<td>', $pub['title'], '</td>';
		echo '<td>', $pub['type'], '</td>';
		echo '<td>';

		echo ($pub['type'] === 'Journal'
			? $pub['journal_volume'].'('.$pub['journal_issue'].'): '
			: $pub['book_publisher'].'. '.$pub['book_place'].'. ');

		echo $pub['year'], '</td>';
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
			<th class="first">Award/Grant</th>
			<th>Duration</th>
			<th>Source</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_awd as $awd)
	{
		echo '<tr>';
		echo '<td class="first">', $awd['award'], '</td>';
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
			<th class="first" rowspan="2">Title</th>
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
		echo '<td class="first">', $rch['title'], '</td>';
		echo '<td>';

		echo ($rch['fund_external'] 
			? $rch['fund_up']
				? 'UP System Research Grant and '.$rch['fund_external']
				: $rch['fund_external']
			: 'UP System Research Grant');

		echo '</td>';
		echo '<td>', redate($rch['start'], $rch['end']), '</td>';
		echo '<td>', number_format($rch['fund_amount'], 2), '</td>';
		echo '<td>', number_format($rch['fund_up'], 2), '</td>';
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
		echo '<td class="first">', $name;

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
		echo '<td class="first">', $name;

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
			<th class="first">Participation</th>
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
		echo '<td class="first">', $par['participation'], '</td>';
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
		echo '<td class="first">', $name;

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
			<th class="first">Participation</th>
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
		echo '<td class="first">', $oth['participation'], '</td>';
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

<?php elseif (!$accom_reports): ?>
<div class="alert alert-danger text-center">
	<p>The list is empty.</p>
</div>
<span class="help-block">Note: Only accomplishments from submitted report will be included.</span>
<?php endif; ?>