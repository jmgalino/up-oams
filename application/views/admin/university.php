<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">University Settings</li>
</ol>


<div class="row">
  <div class="col-md-9" id="content" role="main">

    <div class="page-header" id="colleges">
      <h2>Colleges</h2> &nbsp
      <a class="show-hover" href="#">Edit</a>
    </div>
    <?php
    foreach ($colleges as $college) {
      echo '<h4 id="', $college['short'], '">', $college['college'], '</h4>
        <dl class="dl-horizontal">
          <dt>Initials</dt>
          <dd>', $college['short'], '</dd>

          <dt>College Dean</dt>';
          foreach ($users as $user) {
            if ($college['user_ID'] == $user['user_ID'])
            {
              echo '<dd>', $user['first_name'], ' ', $user['middle_initial'], '. ', $user['last_name'], '</dd>';
              break;
            }
          }

      echo '</dl>';
    }
    ?>

    <div class="page-header" id="departments">
      <h2>Departments</h2> &nbsp
      <a class="show-hover" href="#">Edit</a>
    </div>
    <?php
    foreach ($departments as $department) {
      echo '<h4 id="', $department['short'], '">', $department['department'], '</h4>
        <dl class="dl-horizontal">
          <dt>Initials</dt>
          <dd>', $department['short'], '</dd>

          <dt>College</dt>';
          foreach ($colleges as $college) {
            if ($department['college_ID'] == $college['college_ID'])
            {
              echo '<dd>', $college['short'], '</dd>';
              break;
            }
          }

      echo '<dt>Department Chair</dt>';
          foreach ($users as $user) {
            if ($department['user_ID'] == $user['user_ID'])
            {
              echo '<dd>', $user['first_name'], ' ', $user['middle_initial'], '. ', $user['last_name'], '</dd>';
              break;
            }
          }

      echo '</dl>';
   }
   ?>

    <div class="page-header" id="programs">
      <h2>Degree Programs</h2> &nbsp
      <a class="show-hover" href="#">Edit</a>
    </div>
    <?php
    foreach ($programs as $program) {
      echo '<h4 id="', $program['short'], '">', $program['program_short'], '</h4>
        <dl class="dl-horizontal">
          <dt>Full</dt>
          <dd>', $program['program'], '</dd>

          <dt>Initials</dt>
          <dd>', $program['short'], '</dd>

          <dt>College</dt>';
          foreach ($colleges as $college) {
            if ($program['college_ID'] == $college['college_ID'])
            {
              echo '<dd>', $college['short'], '</dd>';
              break;
            }
          }

      echo '<dt>Department</dt>';
          if (!$program['department_ID'])
            echo '<dd> Not Applicable</dd>';
          else
          {
            foreach ($departments as $department) {
              if ($program['department_ID'] == $department['department_ID'])
              {
                echo '<dd>', $department['short'], '</dd>';
                break;
              }
            }
          }

      echo '<dt>Date Instituted</dt>
          <dd>', $program['date_instituted'], '</dd>

          <dt>Type</dt>
          <dd>', $program['type'], '</dd>

          <dt>Vision</dt>
          <dd>', $program['vision'], '</dd>

          <dt>Goals</dt>
          <dd>', $program['goals'], '</dd>
        </dl>';
    }
    ?>
  </div>

  <div class="col-md-3" id="secondary-nav">
    <div class="hidden-xs hidden-sm affix" data-spy="affix" role="complementary"><!-- style="padding-top: 65px;" -->
      <ul class="nav nav-stacked affix-top" data-spy="affix" data-offset-top="200" id="affix">
        <!-- Sections -->
        <li>
          <a href="#colleges">Colleges</a>
          <ul class="nav">
            <?php
            // foreach ($colleges as $college) {
            //   echo '<li><a href="#', $college['short'], '">', $college['short'], '</a></li>';
            // }
            ?>
          </ul>
        </li>
        <li class="active">
          <a href="#departments">Departments</a>
          <ul class="nav">
            <?php
            foreach ($departments as $department) {
              echo '<li><a href="#', $department['short'], '">', $department['short'], '</a></li>';
            }
            ?>
          </ul>
        </li>
        <li>
          <a href="#programs">Degree Programs</a>
          <ul class="nav">
            <?php
            foreach ($programs as $program) {
              echo '<li><a href="#', $program['short'], '">', $program['program_short'], '</a></li>';
            }
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>