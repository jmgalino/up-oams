<p><strong>Annex D - CU Management Aseessment Form</strong></p>

<p class="text-center"><strong>University of the Philippines</strong></p>
<p class="text-center"><strong>OFFICE OF THE VICE PRESIDENT FOR ACADEMIC AFFAIRS</strong></p>

<table class="table table-bordered">
	<tr>
		<td>
			<strong>Assessment of existing programs by CU</strong>
			<p>
				&nbsp;&nbsp;&nbsp;
				(This assessment form should be filled up by the Chancellors Management Team, Budget Officer and Registrar and should be done every 3 years or at the start of anew term of the Chancellor).
				No bew academic programs from a CU will be evaluated unless the CU submits this assessment.
			</p>
		</td>
	</tr>
</table>

<p>Constituent Unit: <?php echo $department_details['department']; ?></p>

<p>Date of Submission: <?php echo date('F d, Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assessment Period: <?php echo $period; ?></p>

<p><strong>Mission/Vision of the CU:</strong></p>
<p style="margin-left:15px"><?php echo $university['mission']; ?></p>

<p><strong>Vision:</strong></p>
<p style="margin-left:15px;"><?php echo $university['vision']; ?></p>

<?php
echo View::factory('mpdf/cuma/table11')
	->bind('programs', $programs)
	->bind('department_programIDs', $department_programIDs);

echo View::factory('mpdf/cuma/table12')
	->bind('programs', $programs)
	->bind('department_programIDs', $department_programIDs)
	->bind('department_users', $department_users)
	->bind('accom', $accom)
	->bind('cuma_details', $cuma_details);

echo View::factory('mpdf/cuma/table13')
	->bind('programs', $programs)
	->bind('department_programIDs', $department_programIDs)
	->bind('period', $period)
	->bind('department_users', $department_users)
	->bind('user', $user)
	->bind('accom', $accom)
	->bind('cuma_details', $cuma_details);

echo View::factory('mpdf/cuma/table14')
	->bind('programs', $programs)
	->bind('department_programIDs', $department_programIDs)
	->bind('period', $period)
	->bind('department_users', $department_users)
	->bind('accom', $accom)
	->bind('cuma_details', $cuma_details);

echo View::factory('mpdf/cuma/table15')
	->bind('programs', $programs)
	->bind('department_programIDs', $department_programIDs);

echo View::factory('mpdf/cuma/table20')
	->bind('programs', $programs)
	->bind('department_programIDs', $department_programIDs);
?>

<p>Personnel (faculty and staff) should be computed as average man hours devoted to the program X salary/hour including overload
<br>**attach all computations as appendix
<br>***utilities include water, electricity, telephone, IT
</p>

QUALITIVE
<p>Show the development plans of the CU for the next 3 years in relation to its programs, research and extension services. 
How relevant will be the programs in relation to the development plans of the CU, and national and international changes.
</p>
