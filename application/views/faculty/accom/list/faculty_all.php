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
<h4>I. Publications</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Test</th>
			<th>Test</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_pub as $pub)
	{
		echo '<tr>';
		echo '<td>test</td>';
		echo '<td>test</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Award Table -->
<?php if ($accom_awd): ?>
<h4>II. Awards</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Award</th>
			<th>Source</th>
			<th>Duration</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_awd as $awd)
	{
		echo '<tr>';
		echo '<td>';
		print_r($awd);
		echo '</td>';
		// echo '<td class="first">', $awd['award'], '</td>';
		// echo '<td>', $awd['source'], '</td>';
		// echo '<td>', date_format(date_create($awd['start']), 'F d, Y'), ' to ', date_format(date_create($awd['end']), 'F d, Y'), '</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Research Table -->
<?php if ($accom_rch): ?>
<h4>III. Research</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first" rowspan="2">Title</th>
			<th colspan="2" style="border-bottom: 1px solid #ddd;">Amount of Grant</th>
			<th rowspan="2">Duration</th>
		</tr>
		<tr>
			<th>External</th>
			<th style="border-right: 1px solid #ddd;">UP</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_rch as $rch)
	{
		// echo '<tr>';
		// echo '<td class="first">', $rch['title'], '</td>';
		// echo '<td>', number_format($rch['fund_amount'], 2), '</td>';
		// echo '<td>', number_format($rch['fund_up'], 2), '</td>';
		// echo '<td>', date_format(date_create($rch['start']), 'F d, Y'), ' to ', date_format(date_create($rch['end']), 'F d, Y'), '</td>';
		// echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Paper Table -->
<?php if ($accom_ppr): ?>
<h4>IV. Paper</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Test</th>
			<th>Test</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_ppr as $ppr)
	{
		echo '<tr>';
		echo '<td>test</td>';
		echo '<td>test</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Creative Table -->
<?php if ($accom_ctv): ?>
<h4>V. Creative</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Test</th>
			<th>Test</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_ctv as $ctv)
	{
		echo '<tr>';
		echo '<td>test</td>';
		echo '<td>test</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Participation Table -->
<?php if ($accom_par): ?>
<h4>VI. Participation</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Test</th>
			<th>Test</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_par as $par)
	{
		echo '<tr>';
		echo '<td>test</td>';
		echo '<td>test</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Material Table -->
<?php if ($accom_mat): ?>
<h4>VII. Material</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Test</th>
			<th>Test</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_mat as $mat)
	{
		echo '<tr>';
		echo '<td>test</td>';
		echo '<td>test</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<!-- Other Table -->
<?php if ($accom_oth): ?>
<h4>VIII. Other</h4>
<table class="table table-bordered table-condensed display" id="" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th class="first">Test</th>
			<th>Test</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($accom_oth as $oth)
	{
		echo '<tr>';
		echo '<td>test</td>';
		echo '<td>test</td>';
		echo '</tr>';
	}
	?>
	</tbody>
</table>
</br>
<?php endif; ?>

<?php elseif (!$accom_reports): ?>
<div class="alert alert-danger text-center">
	<p>The list is empty.</p>
</div>
<span class="help-block">Note: Only accomplishments from submitted report will be included.</span>
<?php endif; ?>