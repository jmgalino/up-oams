<div class="row">
	<div class="col-xs-6 col-md-4">
		<img src="../../<?php echo $user->pic; ?>" class="img-responsive">
		<br>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-8">
		<div class="row details">
			<div class="col-xs-6"><strong>Employee Code</strong></div>
			<div class="col-xs-6"><?php echo $user->employee_code; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>User Type</strong></div>
			<?php if ($user->user_type == 'admin'): ?>
			<div class="col-xs-6">Admin</div>
			<?php else: ?>
			<div class="col-xs-6">Faculty</div>
			<?php endif; ?>
		</div>
		<br>

		<div class="row details">
			<div class="col-xs-6"><strong>First Name</strong></div>
			<div class="col-xs-6"><?php echo $user->first_name; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Middle Initial</strong></div>
			<div class="col-xs-6"><?php echo $user->middle_initial; ?>.</div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Last Name</strong></div>
			<div class="col-xs-6"><?php echo $user->last_name; ?></div>
		</div>
		<br>

		<?php if ($user->user_type == 'faculty'): ?>
		<div class="row details">
			<div class="col-xs-6"><strong>Faculty Code</strong></div>
			<div class="col-xs-6"><?php echo $user->faculty_code; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Rank</strong></div>
			<div class="col-xs-6"><?php echo $user->rank; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Degree Program</strong></div>
			<div class="col-xs-6"><?php echo $user->short; ?></div>
		</div>
		<div class="row details">
			<div class="col-xs-6"><strong>Position</strong></div>
			<?php
			if ($user->position == 'none') echo '<div class="col-xs-6">Not Applicable</div>';
			elseif ($user->position == 'dept_chair') echo '<div class="col-xs-6">Department Chair</div>';
			else echo '<div class="col-xs-6">College Dean</div>';
			?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php if ($user->user_type == 'faculty'): ?>
<br><br><hr>
<div class="row">
	<div class="col-md-4">
		<h4>Accomplishment Reports</h4>
	<?php
	if (count($ar_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-hover">';

		foreach ($ar_rows as $accom)
		{
			$month = DateTime::createFromFormat('n', $accom->month);
			$month_year = $month->format('F').' '.$accom->year;

			echo '<tr>
					<td>
						<a href='.url::site('accom/view_/'.$accom->accom_ID).'>', $month_year, '</a>
					</td>
				<tr>';
		}
		
		echo '</tbody></table></div>';
	}
	else
	{
		echo '<div class="alert alert-danger alert-profile"><p class="text-center">The list is empty.</p></div>';
	}	
	?>
	</div>

	<div class="col-md-4">
	<h4>IPCR Forms</h4>
	<?php
	if (count($ipcr_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-hover">';

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
		echo '<div class="table-responsive"><table class="table table-hover">';

		foreach ($opcr_rows as $opcr)
		{
			$pfrom = DateTime::createFromFormat('Y-m-d', $opcr->period_from);
			$pto = DateTime::createFromFormat('Y-m-d', $opcr->period_to);

			echo '<tr>
					<td>
						<a href='.url::site('opcr/view_/'.$opcr->opcr_ID).'>',
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

<?php if ($user->position == 'dept_chair'): ?>
<br>
<div class="row">
	<div class="col-md-4">
	<h4>CU Management Assessment Forms</h4>
	<?php
	if (count($cuma_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-hover">';

		foreach ($cuma_rows as $opcr)
		{
			$pfrom = DateTime::createFromFormat('Y-m-d', $cuma->period_from);
			$pto = DateTime::createFromFormat('Y-m-d', $cuma->period_to);

			echo '<tr>
					<td>
						<a href='.url::site('cuma/view_/'.$cuma->opcr_ID).'>',
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
	<h4>Publications</h4>
	<?php
	if (count($pub_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-hover">';

		foreach ($pub_rows as $pub)
		{
			echo '<tr><td>', $pub->title, '</td></tr>';
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
	<h4>Research</h4>
	<?php
	if (count($rch_rows)>0)
	{
		echo '<div class="table-responsive"><table class="table table-hover">';

		foreach ($rch_rows as $rch)
		{
			echo '<tr><td>', $rch->title, '</td></tr>';
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

<?php endif; ?>