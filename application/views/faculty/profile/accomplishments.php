<h4 style="font-size:20px">
	Accomplishments&nbsp
	<button class="btn btn-default" id="accomplishments_toggle_show" style="display:none">Show</button>
	<button class="btn btn-default" id="accomplishments_toggle_hide">Hide</button>
</h4>

<div id="accomplishments">
	<?php if ($accom_reports): ?>
	<?php if ($accom_pub): ?>
	<!-- Publication Table -->
	<h4>Journal Publication/Book/Chapter in a Book</h4>
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

	<?php if ($accom_awd): ?>
	<!-- Award Table -->
	<h4>Awards/Grants Received</h4>
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
			$duration = Request::factory('extras/reconstructor/redate')
				->post(array(
					'start' => $awd['start'],
					'end' => $awd['end']))
				->execute()
				->body;

			echo 
			'<tr>
				<td class="first">', $awd['award'], '</td>
				<td>', $duration, '</td>
				<td>', $awd['source'], '</td>
			</tr>';
		}
		?>
		</tbody>
	</table>
	<br>
	<?php endif; ?>

	<?php if ($accom_rch): ?>
	<!-- Research Table -->
	<h4>Research Grants/Fellowship Received</h4>
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

			$duration = Request::factory('extras/reconstructor/redate')
				->post(array(
					'start' => $rch['start'],
					'end' => $rch['end']))
				->execute()
				->body;

			echo
			'<tr>
				<td class="first">', $rch['title'], '</td>
				<td>', $fund_source, '</td>
				<td>', $duration, '</td>
				<td>Php ', number_format($rch['fund_amount'], 2), '</td>
				<td>Php ', number_format($rch['fund_up'], 2), '</td>
			</tr>';
		}
		?>
		</tbody>
	</table>
	<br>
	<?php endif; ?>

	<?php if ($accom_ppr): ?>
	<!-- Paper Table -->
	<h4>Oral Paper/Poster Presentation</h4>
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

			$dates = Request::factory('extras/reconstructor/redate')
				->post(array(
					'start' => $ppr['start'],
					'end' => $ppr['end']))
				->execute()
				->body;

			echo
			'<tr>
				<td class="first">', $author, '</td>
				<td>', $ppr['title'], '</td>
				<td>', $ppr['activity'], '</td>
				<td>', $ppr['venue'], '</td>
				<td>', $dates, '</td>
			</tr>';
		}
		?>
		</tbody>
	</table>
	<br>
	<?php endif; ?>

	<?php if ($accom_ctv): ?>
	<!-- Creative Table -->
	<h4>Presentation of Creative Work Output</h4>
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

			$dates = Request::factory('extras/reconstructor/redate')
				->post(array(
					'start' => $ctv['start'],
					'end' => $ctv['end']))
				->execute()
				->body;

			echo
			'<tr>
				<td class="first">', $faculty, '</td>
				<td>', $ctv['title'], '</td>
				<td>', $ctv['venue'], '</td>
				<td>', $dates, '</td>
			</tr>';
		}
		?>
		</tbody>
	</table>
	<br>
	<?php endif; ?>

	<?php if ($accom_par): ?>
	<!-- Participation Table -->
	<h4>Participation in Seminars/Conferences/Workshops/Training Courses/Fora</h4>
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
			$dates = Request::factory('extras/reconstructor/redate')
				->post(array(
					'start' => $par['start'],
					'end' => $par['end']))
				->execute()
				->body;

			echo
			'<tr>
				<td class="first">', $par['participation'], '</td>
				<td>', $par['title'], '</td>
				<td>', $par['venue'], '</td>
				<td>', $dates, '</td>
			</tr>';
		}
		?>
		</tbody>
	</table>
	<br>
	<?php endif; ?>

	<?php if ($accom_mat): ?>
	<!-- Material Table -->
	<h4>Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h4>
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

	<?php if ($accom_oth): ?>
	<!-- Other Table -->
	<h4>Other</h4>
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
			$dates = Request::factory('extras/reconstructor/redate')
				->post(array(
					'start' => $oth['start'],
					'end' => $oth['end']))
				->execute()
				->body;

			echo
			'<tr>
				<td class="first">', $oth['participation'], '</td>
				<td>', $oth['activity'], '</td>
				<td>', $oth['venue'], '</td>
				<td>', $dates, '</td>
			</tr>';
		}
		?>
		</tbody>
	</table>
	<br>
	<?php endif; ?>

	<?php else: ?>
	<div class="alert alert-danger text-center">
		<p>The list is empty.</p>
	</div>
	<?php endif; ?>

	<span class="help-block">Note: Only accomplishments from <?php echo ($user['position'] == 'dean' ? 'saved' : 'accepted')?> reports will be included.</span>
</div>
