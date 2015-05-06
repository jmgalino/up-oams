<?php
$univ = new Model_Univ;
$session = Session::instance();

$university['mission'] = $univ->get_mission();
$university['vision'] = $univ->get_vision();
$department_details = $univ->get_department_details(NULL, $session->get('program_ID'));

echo '<p><strong>Annex D - CU Management Assessment Form</strong></p>
<p class="text-center"><strong>University of the Philippines</strong></p>';

echo '<p class="text-center"><strong>OFFICE OF THE VICE PRESIDENT FOR ACADEMIC AFFAIRS</strong></p>
<table class="table table-bordered cuma-table">
	<tr>
		<td style="white-space:normal">
			<strong>Assessment of existing programs by CU</strong>
			<p style="margin:5px 0 10px 15px">
				(This assessment form should be filled up by the Chancellors Management Team, Budget Officer and Registrar and should be done every 3 years or at the start of anew term of the Chancellor). No new academic programs from a CU will be evaluated unless the CU submits this assessment.
			</p>
		</td>
	</tr>
</table>
<p>Constituent Unit: ', $department_details['department'], '</p>
<p>Date of Submission: ', date('F d, Y'), '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'Assessment Period: ', $session->get('period'), '</p>
<p><strong>Mission/Vision of the CU:</strong></p>
<p style="margin:-25px 0 0 15px">', $university['mission'], '</p>
<p><strong>Vision:</strong></p>
<p style="margin:-25px 0 0 15px; white-space:pre-wrap;">', $university['vision'], '</p>
';
?>

