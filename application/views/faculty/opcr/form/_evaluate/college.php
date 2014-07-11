<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('faculty/opcr_college'); ?>>College's OPCR Forms</a></li>
  <li><a href=<?php echo url::site('opcr/view_college/'.$opcr_ID); ?>>View OPCR Form</a></li>
  <li class="active">Evaluate OPCR Form</li>
</ol>

<?php if(isset($filepath)): ?>
<h3><?php echo $label; ?></h3>
<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('opcr/submit_evaluation/'.$opcr_ID); ?>>
Save Evaluation
</a>
<br><br>

<div class="container">
  <?php
  	$view = new View('faculty/opcr/form/_evaluate/fragment');
  	$view->bind('opcr_ID', $opcr_ID);
    $view->bind('category', $category);
    $view->bind('target_rows', $opcr_rows);
    $view->render(TRUE);
  ?>
</div>

<?php else: ?>
<div class="alert alert-danger alert-dismissable">
  <p class="text-center">
    File is missing.
  </p>
</div>
<?php endif; ?>