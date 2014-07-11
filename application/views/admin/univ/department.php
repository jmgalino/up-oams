<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/univ'); ?>>University Settings</a></li>
  <li class="active">Modify University Settings</li>
</ol>

<h3>Departments</h3>
<p>Check the boxes of the category you want to edit.</p>
<br>

<?php
  print form::open('admin/univ/update/department', array('class'=>'form-horizontal', 'role'=>'form'));
  
  foreach ($departments as $department)
  {
    echo '<div class="checkbox">
      <label>
        <input type="checkbox" value='.$department->department_ID.'> ', $department->department,
      '</label>
    </div>';
  }

  echo '<br>';
  print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Save'));
  print form::close();
?>