<!-- Site Navigation -->
<ol class="breadcrumb">
  <li><a href=<?php echo URL::site(); ?>>Home</a></li>
  <li class="active">University Settings</li>
</ol>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <p class="text-center">
    <?php echo $success?>
  </p>
</div>
<?php elseif (($error) OR ($success === FALSE)): ?>
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <p class="text-center">
    <?php echo ($error ? $error : 'Something went wrong. Please try again.'); ?>
  </p>
</div>
<?php endif; ?>

<?php
// Edit univ form
echo View::factory('admin/university/form/univ')
  ->bind('university', $university);
// Edit mission form
echo View::factory('admin/university/form/mission')
  ->bind('mission', $mission);
// Edit vision form
echo View::factory('admin/university/form/vision')
  ->bind('vision', $vision);
?>

<div class="row">
  <div class="col-md-9" id="content" role="main">

    <div class="page-header" id="univ">
      <h2>University</h2>&nbsp
      <a class="show-hover" data-toggle="modal" data-target="#modal_univ" href="#">Edit</a>
    </div>
    <?php
      echo '<p>', ($university ? $university : '<em>Not set</em>'), '</p>';
    ?>

    <div class="page-header" id="mission">
      <h2>Mission</h2>&nbsp
      <a class="show-hover" data-toggle="modal" data-target="#modal_mission" href="#">Edit</a>
    </div>
    <?php
      echo '<p>', ($mission ? $mission : '<em>Not set</em>'), '</p>';
    ?>

    <div class="page-header" id="vision">
      <h2>Vision</h2>&nbsp
      <a class="show-hover" data-toggle="modal" data-target="#modal_vision" href="#">Edit</a>
    </div>
    <?php
      echo '<p style="white-space:pre-wrap;">', ($vision ? $vision : '<em>Not set</em>'), '</p>';
    ?>

    <div class="page-header" id="colleges">
      <h2>Colleges</h2>&nbsp
      <a class="show-hover" href="<?php echo URL::site('admin/university/colleges'); ?>">Edit</a>
    </div>
    
    <?php if ($colleges): ?>
    <?php
    foreach ($colleges as $college) {
      echo '<h4 id="', $college['short'], '">', $college['college'], '</h4>
        <dl class="dl-horizontal">

          <dt>Short Name</dt>
          <dd>', $college['short'], '</dd>

          <dt>College Dean</dt>
          <dd>', ($college['first_name'] ? $college['first_name'].' '.$college['middle_name'][0].'. '.$college['last_name'] : '<em>None</em>'), '</dd>
        </dl>';
    }
    ?>

    <?php else: ?>
    <div class="alert alert-danger text-center">
      <p>The list is empty.</p>
    </div>
    <?php endif; ?>

    <div class="page-header" id="departments">
      <h2>Departments</h2>&nbsp
      <a class="show-hover" href="<?php echo URL::site('admin/university/departments'); ?>">Edit</a>
    </div>
    
    <?php if ($departments): ?>
    <?php
    foreach ($departments as $department) {
      echo '<h4 id="', $department['short'], '">', $department['department'], '</h4>
        <dl class="dl-horizontal">

          <dt>College</dt>
          <dd>', $department['college'], '</dd>

          <dt>Short Name</dt>
          <dd>', $department['short'], '</dd>

          <dt>Department Chair</dt>
          <dd>', ($department['first_name'] ? $department['first_name'].' '.$department['middle_name'][0].'. '.$department['last_name'] : '<em>None</em>'), '</dd>
        </dl>';
     }
    ?>

    <?php else: ?>
    <div class="alert alert-danger text-center">
      <p>The list is empty.</p>
    </div>
    <?php endif; ?>

    <div class="page-header" id="programs">
      <h2>Academic Programs</h2>&nbsp
      <a class="show-hover" href="<?php echo URL::site('admin/university/programs'); ?>">Edit</a>
    </div>

    <?php if ($programs): ?>
    <?php
    foreach ($programs as $program) {
      echo '<h4 id="', $program['short'], '">', $program['program'], '</h4>
        <dl class="dl-horizontal">

          <dt>College</dt>
          <dd>', $program['college'], '</dd>

          <dt>Department</dt>
          <dd>';
      echo ($program['department_ID'] ? $program['department'] : 'Not Applicable');
      echo '</dd>

          <dt>Short Name</dt>
          <dd>', $program['short'], '</dd>

          <dt>Date Instituted</dt>
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

    <?php else: ?>
    <div class="alert alert-danger text-center">
      <p>The list is empty.</p>
    </div>
    <?php endif; ?>
  </div>

  <div class="col-md-3" id="secondary-nav">
    <div class="hidden-xs hidden-sm affix" data-spy="affix" role="complementary"><!-- style="padding-top: 65px;" -->
      <ul class="nav nav-stacked affix-top" data-spy="affix" data-offset-top="200" id="affix">
        <li><a href="#univ">University</a></li>
        <li><a href="#mission">Mission</a></li>
        <li><a href="#vision">Vision</a></li>
        <li><a href="#colleges">Colleges</a></li>
        <li><a href="#departments">Departments</a></li>
        <li><a href="#programs">Academic Programs</a></li>
      </ul>
    </div>
  </div>
</div>