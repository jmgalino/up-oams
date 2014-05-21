<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li class="active">CU Management Assessment Forms</li>
</ol>

<h3>My CU Management Assessment Forms</h3>
<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_cuma" role="button" href="">Create</a>
<br><br>

<?php
if (count($cuma_rows)>0)
{
	echo '<div class="table-responsive">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>Period</th>
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>';

	foreach ($cuma_rows as $cuma)
	{
		$pfrom = DateTime::createFromFormat('Y-m-d', $cuma->period_from);
		$pto = DateTime::createFromFormat('Y-m-d', $cuma->period_to);
		
		echo '<tr>';
		echo '<td><a href='.url::site('cuma/view/'.$cuma->cuma_ID).'>AY ', $pfrom->format('F Y'), ' - ', $pto->format('F Y').'</a></td>';
		
		echo '<td title="Download Form">
				<a href='.url::site('cuma/download/'.$cuma->cuma_ID).'>
				<span class="glyphicon glyphicon-download"></span></a>
			</td>';
		echo '<td title="Edit Form">
				<a href='.url::site('cuma/edit/'.$cuma->cuma_ID).'>
				<span class="glyphicon glyphicon-pencil"></span></a>
			</td>';
		echo '<td title="Delete Form">
				<a href='.url::site('cuma/delete/'.$cuma->cuma_ID).'>
				<span class="glyphicon glyphicon-trash"></span></a>
			</td>';
		
		echo '</tr>';
	}

	echo '</tbody></table></div>';
}
else
{
	echo '<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>';
}
?>

<?php echo View::factory('faculty/cuma/form/_add/init')->render(); ?><!-- Init Modal -->
