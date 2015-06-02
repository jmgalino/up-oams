<?php
function redate($start, $end)
{
	$duration = Request::factory('extras/reconstructor/redate')
		->post(array(
			'start' => $start,
			'end' => $end))
		->execute()
		->body;

	return $duration;
}
?>

<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Accomplishment Reports</a></li>
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
		$author = $fullname;

		if ($pub['author'])
			$author .= ' and '.$pub['author'];

		$details = ($pub['type'] === 'Journal'
			? $pub['journal_volume'].'('.$pub['journal_issue'].'): '
			: $pub['book_publisher'].'. '.$pub['book_place'].'. ');

		echo
		'<tr>
			<td class="first">', $author, '</td>
			<td>', $pub['year'], '</td>
			<td>', $pub['title'], '</td>
			<td>', $pub['type'], '</td>
			<td>', $details, $pub['page'], '</td>
		</tr>';
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
		echo 
		'<tr>
			<td class="first">', $awd['award'], '</td>
			<td>', redate($awd['start'], $awd['end']), '</td>
			<td>', $awd['source'], '</td>
		</tr>';
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
		$fund_source = ($rch['fund_external']
			? $rch['fund_up']
				? 'UP System Research Grant and '.$rch['fund_external']
				: $rch['fund_external']
			: 'UP System Research Grant');

		echo
		'<tr>
			<td class="first">', $rch['title'], '</td>
			<td>', $fund_source, '</td>
			<td>', redate($rch['start'], $rch['end']), '</td>
			<td>Php ', number_format($rch['fund_amount'], 2), '</td>
			<td>Php ', number_format($rch['fund_up'], 2), '</td>
		</tr>';
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
		$author = $fullname;

		if ($ppr['author'])
			$author .= ' and '.$ppr['author'];

		echo
		'<tr>
			<td class="first">', $author, '</td>
			<td>', $ppr['title'], '</td>
			<td>', $ppr['activity'], '</td>
			<td>', $ppr['venue'], '</td>
			<td>', redate($ppr['start'], $ppr['end']), '</td>
		</tr>';
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
		$author = $fullname;

		if ($ctv['author'])
			$author .= ' and '.$ctv['author'];

		echo
		'<tr>
			<td class="first">', $faculty, '</td>
			<td>', $ctv['title'], '</td>
			<td>', $ctv['venue'], '</td>
			<td>', redate($ctv['start'], $ctv['end']), '</td>
		</tr>';
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
		echo
		'<tr>
			<td class="first">', $par['participation'], '</td>
			<td>', $par['title'], '</td>
			<td>', $par['venue'], '</td>
			<td>', redate($par['start'], $par['end']), '</td>
		</tr>';
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
		$author = $fullname;

		if ($mat['author'])
			$author .= ' and '.$mat['author'];

		echo
		'<tr>
			<td class="first">', $author, '</td>
			<td>', $mat['year'], '</td>
			<td>', $mat['title'], '</td>
		</tr>';
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
		echo
		'<tr>
			<td class="first">', $oth['participation'], '</td>
			<td>', $oth['activity'], '</td>
			<td>', $oth['venue'], '</td>
			<td>', redate($oth['start'], $oth['end']), '</td>
		</tr>';
	}
	?>
	</tbody>
</table>
<br>
<?php endif; ?>

<?php else: ?>
<div class="row">
	<div class="col-md-offset-6 col-md-6">
	<a class="btn btn-default pull-right" href="<?php echo URL::site('faculty/accom'); ?>" role="button">
	<span class="glyphicon glyphicon-arrow-left"></span> Back</a></div>
</div><br>

<div class="alert alert-danger text-center">
	<p>The list is empty.</p>
</div>
<?php endif; ?>

<span class="help-block">Note: Only accomplishments from <?php echo ($identifier == 'faculty' ? 'accepted' : 'saved')?> reports will be included.</span>
