<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">OAMS Setting</li>
</ol>

<h2 class="page-header">
	Title
	<a href="#" class="permalink">Update</a>
</h2>
<?php
	echo '<p>', $title, '</p>';
?>

<h2 class="page-header">
	About
	<a href="#" class="permalink">Update</a>
</h2>
<?php
	echo '<p>', $about, '</p>';
?>

<!-- <h2 class="page-header">Accomplishment Report Types</h2>
<?php
	// foreach ($types as $type) {
	// 	echo '<h4>', $type['type'], '<a href="#" class="permalink">Rename</a></h4>';
	// }
?> -->

<h2 class="page-header">IPCR/OPCR Output Categories</h2>
<?php
	foreach ($categories as $category) {
		echo '<h4>', $category['category'], '<a href="#" class="permalink">Rename</a></h4>';
	}
?>
