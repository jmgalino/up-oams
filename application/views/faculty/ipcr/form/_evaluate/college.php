<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('faculty/ipcr_college'); ?>>College's IPCR Forms</a></li>
  <li><a href=<?php echo url::site('ipcr/view_college/'.$ipcr_ID); ?>>View IPCR Form</a></li>
  <li class="active">Evaluate IPCR Form</li>
</ol>

<?php if(isset($filepath)): ?>
<h3><?php echo $label; ?></h3>
<a class="btn btn-default pull-right" role="button" href=<?php echo url::site('ipcr/submit_evaluation/'.$ipcr_ID); ?>>
Save Evaluation
</a>
<br><br>

<div class="container">
  <?php
  	$view = new View('faculty/ipcr/form/_evaluate/fragment');
  	$view->bind('ipcr_ID', $ipcr_ID);
    $view->bind('category', $category);
    $view->bind('target_rows', $ipcr_rows);
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