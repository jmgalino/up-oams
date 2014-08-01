<div class="row">
	<div class="col-xs-6 col-md-4">
		<img src="<?php echo URL::base(), 'application/', $user['pic']; ?>" class="img-responsive">
		<br>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">
		<div class="row details">
			<div class="col-xs-6"><strong>Employee Code</strong></div>
			<div class="col-xs-6"><?php echo $user['employee_code']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>User Type</strong></div>
			<div class="col-xs-6"><?php echo $user['user_type']; ?></div>
		</div>
		<br>

		<div class="row details">
			<div class="col-xs-6"><strong>First Name</strong></div>
			<div class="col-xs-6"><?php echo $user['first_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Middle Initial</strong></div>
			<div class="col-xs-6"><?php echo $user['middle_initial']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Last Name</strong></div>
			<div class="col-xs-6"><?php echo $user['last_name']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Birthday</strong></div>
			<div class="col-xs-6"><?php echo date_format(date_create($user['birthday']), 'F d, Y'); ?></div>
		</div>
		<br>

		<?php if ($user['user_type'] == 'Faculty'): ?>
		<div class="row details">
			<div class="col-xs-6"><strong>Faculty Code</strong></div>
			<div class="col-xs-6"><?php echo $user['faculty_code']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Rank</strong></div>
			<div class="col-xs-6"><?php echo $user['rank']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Degree Program</strong></div>
			<div class="col-xs-6"><?php echo $user['program_short']; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Position</strong></div>
			<?php
			if ($user['position'] == 'none') echo '<div class="col-xs-6">Not Applicable</div>';
			elseif ($user['position'] == 'dept_chair') echo '<div class="col-xs-6">Department Chair</div>';
			else echo '<div class="col-xs-6">College Dean</div>';
			?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php if ($user['user_type'] == 'Faculty'): ?>
<hr>
<div class="row">
	<div class="col-md-4">
		<h4>Accomplishment Reports</h4>
	<?php if ($accom_rows): ?>
			<div class="table-responsive mini-table">
				<table class="table table-striped">
					<tbody>
	<?php
		foreach ($accom_rows as $accom)
		{
			$yearmonth = DateTime::createFromFormat('Y-m-d', $accom['yearmonth']);

			echo "<tr>
					<td>
						<a href='#'>", $yearmonth->format("F Y"), "</a>
					</td>
				<tr>";
		}
	?>
					</tbody>
				</table>
			</div>
	<?php else: ?>
			<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>
	<?php endif; ?>
	</div>

	<div class="col-md-4">
	<h4>IPCR Forms</h4>
	<?php
	if ($ipcr_rows)
	{
		echo '<div class="table-responsive"><table class="table table-striped">';

		foreach ($ipcr_rows as $ipcr)
		{
			foreach ($opcr_rows as $opcr)
			{
				if ($ipcr->opcr_ID == $opcr->opcr_ID)
				{
					$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
					$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);

					echo '<tr>
						<td>
							<a href='.url::site('ipcr/view_admin/'.$ipcr->ipcr_ID).'>',
							$pfrom->format('F Y'), ' - ', $pto->format('F Y'),
							'</a>
						</td>
					</tr>';
				}
			}
		}
		echo '</table></div>';
	}
	else
	{
		echo '<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>';
	}
	?>
	</div>

	<div class="col-md-4">
	<h4>OPCR Forms</h4>
	<?php
	if (count($opcr_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-striped">';

		foreach ($opcr_rows as $opcr)
		{
			$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
			$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);

			echo '<tr>
					<td>
						<a href='.url::site('opcr/view_admin/'.$opcr->opcr_ID).'>',
						$pfrom->format('F Y'), ' - ', $pto->format('F Y'),
						'</a>
					</td>
				</tr>';
		}
		
		echo '</table></div>';
	}
	else
	{
		echo '<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>';
	}
	?>
	</div>
</div>

<?php if ($user['position'] == 'dept_chair'): ?>
<br>
<div class="row">
	<div class="col-md-4">
	<h4>CU Management Assessment Forms</h4>
	<?php
	if (count($cuma_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-striped">';

		foreach ($cuma_rows as $cuma)
		{
			$pfrom = DateTime::createFromFormat('Y-m-d', $cuma->period_from);
			$pto = DateTime::createFromFormat('Y-m-d', $cuma->period_to);

			echo '<tr>
					<td>
						<a href='.url::site('cuma/view_admin/'.$cuma->opcr_ID).'>',
						$pfrom->format('F Y'), ' - ', $pto->format('F Y'),
						'</a>
					</td>
				</tr>';
		}
		
		echo '</table></div>';
	}
	else
	{
		echo '<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>';
	}
	?>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
</div>

<?php endif; ?>

<br><br><hr>
<div class="row">
	<div class="col-md-4">
	<h4>
		Publications
		<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_publication" role="button" href="">Add</a>
	</h4><br>
	<?php
	if (count($pub_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-striped">';

		foreach ($pub_rows as $pub)
		{
			echo '<tr>
				<td>', $pub['title'], '</td>
				<td title="Delete Publication"><a class="pull-right" href='.url::site('user/delete/'.$user['user_ID'].'/pub/'.$pub->publication_ID).'>
				<span class="glyphicon glyphicon-trash"></span></a></td>';
			echo '</tr>';
		}
		
		echo '</table></div>';
	}
	else
	{
		echo '<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>';
	}
	?>
	</div>

	<div class="col-md-4">
	<h4>
		Research
		<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_research" role="button" href="">Add</a>
	</h4><br>
	<?php
	if (count($rch_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-striped">';

		foreach ($rch_rows as $rch)
		{
			echo '<tr>
				<td>', $rch->title, '</td>
				<td title="Research"><a class="pull-right" href='.url::site('user/delete/'.$user['user_ID'].'/rch/'.$rch->research_ID).'>
				<span class="glyphicon glyphicon-trash"></span></a></td>
			</tr>';
		}
		
		echo '</table></div>';
	}
	else
	{
		echo '<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>';
	}
	?>
	</div>
	<div class="col-md-4"></div>
</div>

<?php 
endif;

// $pub = new View('admin/profile/accom/publication');
// $pub->bind('user', $user);
// $pub->render(TRUE);

// $rch = new View('admin/profile/accom/research');
// $rch->bind('user', $user);
// $rch->render(TRUE);
?>

