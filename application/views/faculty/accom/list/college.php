<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li class="active">Accomplishment Report</li>
</ol>

<h3>
	Accomplishment Reports <small><?php echo $college; ?></small>
	<div class="btn-toolbar pull-right" role="toolbar">
		<?php if ($filtered): ?>
		<div class="btn-group">
			<a class="btn btn-default" href=<?php echo url::site('faculty/accom_college/unfilter'); ?> role="button">Remove Filter</a>
		</div>
		<?php elseif (count($ar_college)>0) : ?>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_filter">Filter Reports</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_consolidate">Consolidate Reports</button>
		</div>
		<?php endif; ?>
	</div>
</h3>
<br>


<?php
if (count($ar_college) > 0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Month & Year</th>
				<th>Author</th>
				<th>Degree Program</th>
				<th>Date Submitted</th>
				<th>Status</th>
				<th>Remarks</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>';
	
	foreach ($ar_college as $accom)
	{
		if (($accom->status == 'Pending') OR ($accom->status == 'Approved'))
		{
			$date = DateTime::createFromFormat('Y-m-d', $accom->date);
			$month = DateTime::createFromFormat('n', $accom->month);
			$month_year = $month->format('F').' '.$accom->year;

			echo '<tr>';
			echo '<td title="Month & Year"><a href='.url::site('accom/view_college/'.$accom->accom_ID).'>', $month_year, '</a></td>';
			
			foreach ($users as $user)
			{
				if ($user->user_ID == $accom->user_ID)
				{
					echo '<td>', $user->faculty_code, '</td>';

					foreach ($programs as $program)
					{
						if($user->program_ID == $program->program_ID)
							echo '<td>', $program->short, '</td>';	
					}
				}
			}

			echo '<td>', $date->format('F d, Y'), '</td>';
			echo '<td>', $accom->status, '</td>';

			if (isset($accom->remarks))
			{
				echo '<td>', $accom->remarks, '</td>';
			}
			else
			{
				echo '<td>None</td>';
			}

			echo '<td title="Download Report">
					<a href='.url::site('accom/download/'.$accom->accom_ID).'>
					<span class="glyphicon glyphicon-download"></span></a>
				</td>';
			// echo '<td title="Evaluate Report">
			// 		<a data-toggle="modal" data-target="#modal_evaluate" href="">
			// 		<span class="glyphicon glyphicon-stats"></span>
			// 		</a>
			// 	</td>';

			echo '</tr>';
		}
	}
	echo '</tbody></table></div>';
}

else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}

// Filter Reports
echo View::factory('faculty/ar/form/filter')->render();

// Consolidate Reports
echo View::factory('faculty/ar/form/consolidate')->render();


?>
