<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Modify University Settings</li>
</ol>

<h3>Colleges</h3>
<p>Check the boxes of the category you want to edit.</p>
<br>

<?php
  print Form::open('admin/university/edit/college', array('class'=>'form-horizontal', 'role'=>'form'));
  
  foreach ($colleges as $college)
  {
    echo '<div class="checkbox">
      <label>
        <input type="checkbox" value='.$college->college_ID.'> ', $college->college,
      '</label>
    </div>';
  }

  echo '<br>';
  print Form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Save'));
  print Form::close();
?>