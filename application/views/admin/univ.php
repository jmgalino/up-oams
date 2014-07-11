<ol class="breadcrumb">
  <li><a href=<?php echo url::site('admin/index'); ?>>Home</a></li>
  <li class="active">University Settings</li>
</ol>

<div class="container">
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#types">
          Accomplishment Report Types
        </a>
      </h4>
    </div>
    <div id="types" class="panel-collapse collapse in">
      <div class="panel-body">
      	<!-- <a class="btn btn-default pull-right" href=<?php echo url::site('admin/univ/edit/type'); ?>>Edit</a> -->
        <?php
        foreach ($types as $type) {
        	echo $type->type, "<br>";
        }
        ?>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#category">
          IPCR/OPCR Output Categories
        </a>
      </h4>
    </div>
    <div id="category" class="panel-collapse collapse">
      <div class="panel-body">
      	<a class="btn btn-default pull-right" href=<?php echo url::site('admin/univ/edit/category'); ?>>Edit</a>
        <?php
        foreach ($category as $c) {
        	echo $c->category, "<br>";
        }
        ?>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#programs">
          Degree Programs
        </a>
      </h4>
    </div>
    <div id="programs" class="panel-collapse collapse">
      <div class="panel-body">
      	<a class="btn btn-default pull-right" href=<?php echo url::site('admin/univ/edit/program'); ?>>Edit</a>
        <?php
        foreach ($programs as $program) {
        	echo $program->program, "<br>";
        }
        ?>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#departments">
          Departments
        </a>
      </h4>
    </div>
    <div id="departments" class="panel-collapse collapse">
      <div class="panel-body">
      	<a class="btn btn-default pull-right" href=<?php echo url::site('admin/univ/edit/department'); ?>>Edit</a>
        <?php
        foreach ($departments as $department) {
        	echo $department->department, "<br>";
        }
        ?>
      </div>
    </div>
  </div>

    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#colleges">
          Colleges
        </a>
      </h4>
    </div>
    <div id="colleges" class="panel-collapse collapse">
      <div class="panel-body">
      	<a class="btn btn-default pull-right" href=<?php echo url::site('admin/univ/edit/college'); ?>>Edit</a>
        <?php
        foreach ($colleges as $college) {
        	echo $college->college, "<br>";
        }
        ?>
      </div>
    </div>
  </div>

</div>
</div>