<ol class="breadcrumb">
  <li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
  <li><a href=<?php echo url::site('faculty/ipcr_dept'); ?>>Department's IPCR Forms</a></li>
  <li><a href=<?php echo url::site('ipcr/view_dept/'.$ipcr_ID); ?>>View IPCR Form</a></li>
  <li class="active">Evaluate IPCR Form</li>
</ol>

<h3>
  <?php echo $label; ?>
  <div class="btn-toolbar pull-right" role="toolbar">
    <div class="btn-group">
      <a class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_evaluate" role="button" href="">
        Save Evaluation
      </a>
    </div>
  </div>
</h3>
<br>

<div class="container">
  <?php
  	$view = new View('faculty/ipcr/form/_evaluate/fragment');
  	$view->bind('ipcr_ID', $ipcr_ID);
    $view->bind('category', $category);
    $view->bind('target_rows', $ipcr_rows);
    $view->render(TRUE);
  ?>
</div>

<?php 
$view = new View('faculty/ipcr/form/_evaluate/evaluate');
$view->bind('ipcr_ID', $ipcr_ID);
$view->render(TRUE);
?><!-- Evaluate Modal -->