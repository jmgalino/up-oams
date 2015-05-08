<?php
$univ = new Model_Univ;
$session = Session::instance();

$mission = $univ->get_mission();
$vision = $univ->get_vision();
$department_details = $univ->get_department_details(NULL, $session->get('program_ID'));
?>

<strong>Annex D - CU Management Aseessment Form</strong>
<br>
<br>

<p class="text-center">
	<strong>University of the Philippines</strong>
	<br>
	<strong>OFFICE OF THE VICE PRESIDENT FOR ACADEMIC AFFAIRS</strong>
</p>

<div style="border: 1px solid #000000; padding: 15px;">
	<strong>Assessment of existing programs by CU</strong>
	<br>
	&nbsp;&nbsp;&nbsp;(This assessment form should be filled up by the Chancellors Management Team,
	Budget Officer and Registrar and should be done every 3 years or at the start of a new term of the Chancellor).
	No new academic programs from a CU will be evaluated unless the CU submits this assessment.
</div>
<br>

<p>Constituent Unit: <?php echo $department_details['department']; ?></p>

<p>Date of Submission: <?php echo date('F d, Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assessment Period: <?php echo $session->get('period'); ?></p>

<p><strong>Mission/Vision of the CU:</strong></p>
<p style="margin-left:15px"><?php echo $mission; ?></p>

<p><strong>Vision:</strong></p>
<p style="margin-left:15px; white-space:pre;"><?php echo $vision; ?></p>
