<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">University Settings</li>
</ol>


<div class="row">
  <div class="col-md-9" role="main">
    <h2 id="programs" class="page-header">Degree Programs</h2>
    <?php
    $count = count($programs);

    foreach ($programs as $program) {
      echo '<h4 id="', $program['short'], '">', $program['program'], '<a href="#" class="permalink">Update</a></h4>';
      echo '<p><strong>Department</strong>: -- insert --</p>';
      echo '<p><strong>College</strong>: -- insert --</p>';
      echo '<p><strong>Date Instituted</strong>: ', $program['date_instituted'], '</p>';
      echo '<p><strong>Type</strong>: ', $program['type'], '</p>';
      echo '<p><strong>Vision</strong>:<br>', $program['vision'], '</p>';
      echo '<p><strong>Goals</strong>:<br>', $program['goals'], '</p>';

      if ($count > $program['program_ID']) echo '<br>';
    }
    ?>

    <h2 id="departments" class="page-header">Departments</h2>
    <?php
    $count = count($departments);

    foreach ($departments as $department) {
      echo '<h4 id="', $department['short'], '">', $department['department'], '<a href="#" class="permalink">Update</a></h4>';
      echo '<p><strong>Department</strong>: -- insert --</p>';
      echo '<p><strong>Department Chair</strong>: -- insert --</p>';

      if ($count > $department['department_ID']) echo '<br>';
   }
   ?>

   <h2 id="colleges" class="page-header">Colleges</h2>
   <?php
    $count = count($colleges);

    foreach ($colleges as $college) {
      echo '<h4 id="', $college['short'], '">', $college['college'], '<a href="#" class="permalink">Update</a></h4>';
      echo '<p><strong>College Dean</strong>: -- insert --</p>';

      if ($count > $college['college_ID']) echo '<br>';
    }
    ?>
  </div>

  <div data-spy="scroll" data-target="#affix-nav" class="col-md-3">
    <nav id="affix-nav">
      <ul class="nav sidenav" data-spy="affix" data-offset-top="1">
        <!-- Sections -->
        <li class>
          <a href="#programs">Degree Programs</a>
          <ul class="nav">
            <?php
            // foreach ($programs as $program) {
            //   echo '<li><a href="#', $program['short'], '">', $program['program_short'], '</a></li>';
            // }
            ?>
          </ul>
        </li>

        <li class>
          <a href="#departments">Departments</a>
          <ul class="nav">
            <?php
            // foreach ($departments as $department) {
            //   echo '<li><a href="#', $department['short'], '">', $department['short'], '</a></li>';
            // }
            ?>
          </ul>
        </li>

        <li class>
          <a href="#colleges">Colleges</a>
          <ul class="nav">
            <?php
            // foreach ($colleges as $college) {
            //   echo '<li><a href="#', $college['short'], '">', $college['short'], '</a></li>';
            // }
            ?>
          </ul>
        </li>
      </ul>
    </nav>
  </div>

</div>