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

<?php
echo '
<p>Constituent Unit: ', $department_details['department'], '</p>
<p>Date of Assessment: ', date('F d, Y'), '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'Period: ', $period, '</p>
<p><strong>Mission/Vision of the CU:</strong></p>
<p style="margin:-25px 0 0 15px">', $university['mission'], '</p>
<p><strong>Vision:</strong></p>
<p style="margin:-25px 0 0 15px; white-space:pre-wrap;">', $university['vision'], '</p>
';

echo View::factory('mpdf/cuma/table11')
	->bind('programs', $programs)
	->bind('program_IDs', $program_IDs);

echo View::factory('mpdf/cuma/table12')
	->bind('programs', $programs)
	->bind('program_IDs', $program_IDs);

echo View::factory('mpdf/cuma/table13')
	->bind('programs', $programs)
	->bind('program_IDs', $program_IDs)
	->bind('period', $period);

echo View::factory('mpdf/cuma/table14')
	->bind('programs', $programs)
	->bind('program_IDs', $program_IDs)
	->bind('period', $period);

echo View::factory('mpdf/cuma/table15')
	->bind('programs', $programs)
	->bind('program_IDs', $program_IDs);

echo View::factory('mpdf/cuma/table20')
	->bind('programs', $programs)
	->bind('program_IDs', $program_IDs);

echo '<p style="white-space:normal; word-wrap:normal;">
	Personnel (faculty and staff) should be computed as average man hours devoted to the program X salary/hour including overload
</p>',
'**attach all computations as appendix
***utilities include water, electricity, telephone, IT
<br>
',
'QUALITIVE
<p style="white-space:normal; word-wrap:normal;">
	Show the development plans of the CU for the next 3 years in relation to its programs, research and extension services.
	How relevant will be the programs in relation to the development plans of the CU, and national and international changes.
</p>';
?>



