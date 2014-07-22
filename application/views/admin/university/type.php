<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('admin/university'); ?>>University Settings</a></li>
  <li class="active">Modify University Settings</li>
</ol>

<h3>Accomplishment Report Types</h3>
<p>Check the boxes of the category you want to edit.</p>
<br>

<?php
  // print form::open('admin/university/update/type', array('class'=>'form-horizontal', 'role'=>'form'));
  
  // foreach ($types as $type)
  // {
  //   echo '<div class="checkbox">
  //     <label>
  //       <input type="checkbox" value='.$type->type_ID.'> ', $type->type,
  //     '</label>
  //   </div>

  //   <hidden>
  //   </>';
  // }

  // echo '<br>';
  // print form::submit(array('type'=>'submit', 'class'=>'btn btn-primary', 'value'=>'Save'));
  // print form::close();
?>