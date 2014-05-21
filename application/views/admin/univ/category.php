<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/univ'); ?>>University Settings</a></li>
</ol>

<h3>
  IPCR/OPCR Output Categories
  <div class="btn-toolbar pull-right" role="toolbar">
    <div class="btn-group">
      <a class="btn btn-default" href=<?php echo url::site('admin/univ'); ?> role="button">Back</a>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_add">Add</button>
    </div>
  </div>
</h3>
<br>

<?php
echo '<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>';

foreach ($category as $c)
{
  echo
  '<tr>',
    '<td>', $c->category, '</td>',
    '<td><a class="owned" href="'.url::site('univ/edit/category/'.$c->category_ID).'">',
      '<span class="glyphicon glyphicon-pencil"></span></a></td>',
    '<td><a class="owned" href="'.url::site('univ/edit/category/'.$c->category_ID).'">',
      '<span class="glyphicon glyphicon-trash"></span></a></td>';
  '</tr>';
}

echo '</tbody></table></div><br>';

// New Category
echo View::factory('admin/univ/form/_add/category')->render();
?>