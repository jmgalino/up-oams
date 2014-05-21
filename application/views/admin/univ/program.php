<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/univ'); ?>>University Settings</a></li>
  <li class="active">Modify University Settings</li>
</ol>

<h3>
  Degree Programs
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
        <th>Degree Program</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>';

foreach ($programs as $program)
{
  echo
  '<tr>',
    '<td>', $program->program, '</td>',
    '<td><a class="owned" href="'.url::site('univ/edit/program/'.$program->program_ID).'">',
      '<span class="glyphicon glyphicon-pencil"></span></a></td>',
    '<td><a class="owned" href="'.url::site('univ/edit/program/'.$program->program_ID).'">',
      '<span class="glyphicon glyphicon-trash"></span></a></td>';
  '</tr>';
}

echo '</tbody></table></div><br>';

// New program
echo View::factory('admin/univ/form/_add/program')->render();
?>