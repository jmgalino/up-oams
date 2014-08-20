<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">OAMS Setting</li>
</ol>

<div class="row" data-spy="scroll" data-target=".navbar-example">
	<div class="col-md-9" role="main">

		<div class="page-header" id="title">
			<h2>Title</h2> &nbsp
			<a class="show-hover" href="#">Update</a>
		</div>
		<?php
			echo '<p>', $title, '</p>';
		?>

		<div class="page-header" id="about">
			<h2>About</h2> &nbsp
			<a class="show-hover" href="#">Update</a>
		</div>
		<?php
			echo '<p>', $about, '</p>';
		?>

		<div class="page-header" id="categories">
			<h2>IPCR/OPCR Categories</h2> &nbsp
			<a class="show-hover" data-toggle="modal" data-target="#modal_categories" href="#">Edit</a>
		</div>
		<ul class="list-unstyled">
		<?php
			foreach ($categories as $category) {
				echo '<li style="font-size: 18px;">', $category['category'], '</li>';
			}
		?>
		</ul>
	</div>

	<div class="col-md-3" role="complementary">
		<div class="navbar-example" data-spy="scroll" data-target="#navbar-example" data-offset="0">
			<ul class="nav nav-stacked">
	            <li><a href="#title">Title</a></li>
	            <li><a href="#about">About</a></li>
	            <li><a href="#categories">IPCR/OPCR Categories</a></li>
	        </ul>
		</div>
	</div>
</div>
