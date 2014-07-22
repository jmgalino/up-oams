<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/univ/edit/category'); ?>>University Settings</a></li>
  <li class="active">Edit Category</li>
</ol>

<h3>IPCR/OPCR Output Categories</h3>
<br>

<?php print form::open('univ/save/category/'.$category[0]->category_ID, array('class'=>'form-horizontal', 'role'=>'form'));?>
<div class="form-group">
	<label for="category" class="col-sm-3 control-label">Category</label>
	<div class="col-sm-5">
		<input type="text" class="form-control" id="category" name="category" placeholder="<?php echo $category[0]->category; ?>" required>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-5 col-sm-offset-3">
		<?php print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Save')); ?>
	</div>
</div>
<?php print form::close();?>
