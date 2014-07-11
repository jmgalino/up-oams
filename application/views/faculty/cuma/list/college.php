<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li class="active">CU Management Assessment Forms</li>
</ol>

<?php echo '<h3>CU Management Assessment Forms <small>'.$college.'</small></h3>';?>
<br>

<?php
if (count($cuma_rows)>0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Period</th>
				<th>Author</th>
				<th>Department</th>
			</tr>
		</thead>
		<tbody>';

	foreach ($departments as $dept)
	{

		foreach ($users as $user)
		{
		
			if ($dept->user_ID == $user->user_ID)
			{

				foreach ($cuma_rows as $cuma) {
					
					$pfrom = DateTime::createFromFormat('Y-m-d', $cuma->period_from);
					$pto = DateTime::createFromFormat('Y-m-d', $cuma->period_to);
					
					echo '<tr>';
					echo '<td><a href='.url::site('cuma/view_college/'.$cuma->cuma_ID).'>', $pfrom->format('F Y'), ' - ', $pto->format('F Y').'</a></td>';
					echo '<td>'.$user->faculty_code.'</td>';
					echo '<td>'.$dept->short.'</td>';
				}
			}
		}
	}

	echo '</tbody></table></div>';
}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}
?>

<?php echo View::factory('faculty/cuma/form/_add/init')->render(); ?><!-- Init Modal -->
