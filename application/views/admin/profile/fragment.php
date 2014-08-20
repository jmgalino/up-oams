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
<div>
	<h4>Educational Background</h4><br>
	<div class="alert alert-warning mini-alert"><p class="text-center">Coming soon.</p></div>
</div><br>

<hr>
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
		echo '<div class="alert alert-danger mini-alert"><p class="text-center">The list is empty.</p></div>';
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
		echo '<div class="alert alert-danger mini-alert"><p class="text-center">The list is empty.</p></div>';
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

