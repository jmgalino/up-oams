<ol class="breadcrumb">
  <li><a href=<?php echo url::site($this->session->get('identifier').'/index'); ?>>Home</a></li>
  <li class="active">CU Management Assessment Forms</li>
</ol>

<h3>My CU Management Assessment Forms</h3>
<a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_opcr" role="button" href="">Create</a>
<br><br>

<?php 
	echo '<div class="alert alert-danger">
			<p class="text-center">
				The list is empty.
			</p>
		</div>';
	?>

<!-- Init Modal -->