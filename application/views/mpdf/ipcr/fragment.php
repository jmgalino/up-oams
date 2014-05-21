<table class="table table-bordered">
	<tbody>
		<tr>
			<td style="background-color:#f5f5f5">Reviewed by:</td>
			<td style="background-color:#f5f5f5" class="text-center">Date</td>
			<td style="background-color:#f5f5f5">Approved by:</td>
			<td style="background-color:#f5f5f5" class="text-center">Date</td>
		</tr>
		<tr>
			<td><br><br><br></td>
			<td rowspan="2"></td>
			<td></td>
			<td rowspan="2"></td>
		</tr>
		<tr>
			<td class="text-center">Immediate Supervisor</td>
			<td class="text-center">Head of Office</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<td style="background-color:#f5f5f5" class="text-center" rowspan="2">Output</td>
			<td style="background-color:#f5f5f5; padding:10" class="text-center" rowspan="2">Success Indicator<br>(Target + Measure)</td>
			<td style="background-color:#f5f5f5; font-size:10; padding:10" class="text-center" rowspan="2" width="75">Actual<br>Accomplishments</td>
			<td style="background-color:#f5f5f5" class="text-center" colspan="4">Rating</td>
			<td style="background-color:#f5f5f5" class="text-center" rowspan="2" width="75">Remarks</td>
		</tr>
		<tr>
			<td style="background-color:#f5f5f5; font-size:12" class="text-center" width="20">Q<sup>1</sup></td>
			<td style="background-color:#f5f5f5; font-size:12" class="text-center" width="20">E<sup>2</sup></td>
			<td style="background-color:#f5f5f5; font-size:12" class="text-center" width="20">T<sup>3</sup></td>
			<td style="background-color:#f5f5f5; font-size:12" class="text-center" width="20">A<sup>4</sup></td>
		</tr>
	</thead>
	<tbody>
		<?php
		$category = $this->site->session->get('category');
		$outputs = $this->site->session->get('outputs');
		$targets = $this->site->session->get('targets');

		if ($this->site->session->get('targets'))
		{
			foreach ($category as $c)
			{
				echo '<tr><td colspan="8">', $c->category, '</td></tr>';
				
				foreach ($outputs as $output)
				{
					if ($c->category_ID == $output->category_ID)
					{
						foreach ($targets as $target)
						{
							if ($output->otarget_ID == $target->otarget_ID)
							{
								echo '<tr>',
									'<td style="font-size:11">', $output->output, '</td>',
									'<td style="font-size:11">', $target->indicator, '</td>',
									'<td style="font-size:11">', $target->accom, '</td>',
									'<td style="font-size:11">', $target->r_quantity, '</td>',
									'<td style="font-size:11">', $target->r_efficiency, '</td>',
									'<td style="font-size:11">', $target->r_timeliness, '</td>',
									'<td style="font-size:11">', $target->r_average, '</td>',
									'<td style="font-size:11">', $target->remarks, '</td>',
								'</tr>';
							}
						}
					}
				}
			}
		}
		else
		{
			echo'<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>';
		}
		?>
	</tbody>
</table>

<table class="table table-bordered">
	<tbody>
		<tr><td style="background-color: #f5f5f5" colspan="8">Comments and Recommendations for Development Purposes</td></tr>
		<tr>
			<td colspan="8"><br><br><br><br></td>
		</tr>
		<tr>
			<td class="text-center" width="250">Discussed with</td>
			<td class="text-center" width="80">Date</td>
			<td class="text-center" width="250">Assessed by:</td>
			<td class="text-center" width="80">Date</td>
			<td class="text-center" width="250">Final Rating by:</td>
			<td class="text-center" width="80">Date</td>
		</tr>
		<tr>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
			<td style="font-size:12" class="text-center">
				I certify that I discussed my assessment of the performance with the employee
			</td>
			<td rowspan="3"></td>
			<td rowspan="2"></td>
			<td rowspan="3"></td>
		</tr>
		<tr><td><br><br></td></tr>
		<tr>
			<td class="text-center">Employee</td>
			<td class="text-center">Supervisor</td>
			<td class="text-center">Head of Office</td>
		</tr>
	</tbody>
</table>
