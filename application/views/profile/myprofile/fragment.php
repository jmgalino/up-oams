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
			echo '<tr>
					<td>
						<a href='.URL::site('faculty/myprofile/preview/'.$accom['accom_ID']).'>',
						date_format(date_create($accom['yearmonth']), 'F Y'),
						'</a>
					</td>
				<tr>';
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
							<a href='.URL::site('ipcr/view_admin/'.$ipcr->ipcr_ID).'>',
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
	<h4>Publications</h4><br>
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
	<h4>Research</h4><br>
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

<?php endif; ?>

