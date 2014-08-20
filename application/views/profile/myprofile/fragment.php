<?php if ($user['user_type'] == 'Faculty'): ?>
<hr>
<div>
	<h4>Educational Background</h4><br>
	<div class="alert alert-warning mini-alert"><p class="text-center">Coming soon.</p></div>
</div><br>

<hr>
<div class="row">
	<div class="col-md-4">
	<h4>Publications</h4>
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
	<h4>Research</h4>
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

<?php endif; ?>

