<table class="table table-bordered">
	<tbody>
		<tr>
			<td style="background-color:#f5f5f5">Approved by:</td>
			<td style="background-color:#f5f5f5" class="text-center" width="75">Date</td>
		</tr>
		<tr>
			<td><br></td>
			<td></td>
		</tr>
		<tr>
			<td class="text-center" colspan="2">Name and Signature of Head of Agency</td>
		</tr>
	</tbody>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<td style="background-color:#f5f5f5" class="text-center" rowspan="2">MFO/PAP</td>
			<td style="background-color:#f5f5f5; padding:10" class="text-center" rowspan="2">Success Indicator<br>(Target + Measure)</td>
			<td style="background-color:#f5f5f5; font-size:10px; padding:10" class="text-center" rowspan="2" width="75">Divisions/<br>Individuals<br>Accountable</td>
			<td style="background-color:#f5f5f5; font-size:10px; padding:10" class="text-center" rowspan="2" width="75">Actual<br>Accomplishments</td>
			<td style="background-color:#f5f5f5" class="text-center" colspan="4">Rating</td>
			<td style="background-color:#f5f5f5; font-size:13px" class="text-center" rowspan="2" width="75">Remarks</td>
		</tr>
		<tr>
			<td style="background-color:#f5f5f5" class="text-center" width="20">Q<sup>1</sup></td>
			<td style="background-color:#f5f5f5" class="text-center" width="20">E<sup>2</sup></td>
			<td style="background-color:#f5f5f5" class="text-center" width="20">T<sup>3</sup></td>
			<td style="background-color:#f5f5f5" class="text-center" width="20">A<sup>4</sup></td>
		</tr>
	</thead>
	<tbody>
		<?php 
		$opcr = $this->opcr->get_opcrs($this->site->session->get('user_ID'));
		if ($opcr)
		{
			$ipcr_ID = $this->opcr->get_ipcrID();
			$opcr_ID = $this->opcr->get_opcrID();// echo $opcr_ID, "opcr_ID";
			$category =  $this->univ->get_category();

			$opcr_rows = $this->opcr->find_output($opcr_ID);
			$program_ID = $this->site->session->get('program_ID');
			$ipcrs = $this->opcr->get_ipcrs_dept($program_ID, $opcr_ID);
			$ipcr_IDs = $this->opcr->get_ipcrids_dept($program_ID, $opcr_ID);// echo "<br>", gettype($ipcr_IDs), print_r($ipcr_IDs);
	
			foreach ($category as $c)
			{
				echo '<tr><td colspan="9">', $c->category, '</td></tr>';
				foreach ($opcr_rows as $opcr)
				{
					if ($c->category_ID == $opcr->category_ID)
					{
						$targets = $this->opcr->find_targets(NULL, $ipcr_IDs, $opcr->otarget_ID); echo "target=", print_r($targets), "<br>";
						echo '<tr><td style="font-size:11px rowspan="'.count($targets).'"">', $opcr->output, '</td>',
							'<td style="font-size:11px" rowspan="'.count($targets).'">', $opcr->r_quantity, '</td>',
							'<td style="font-size:11px" rowspan="'.count($targets).'">', $opcr->r_efficiency, '</td>',
							'<td style="font-size:11px" rowspan="'.count($targets).'">', $opcr->r_timeliness, '</td>',
							'<td style="font-size:11px" rowspan="'.count($targets).'">', $opcr->r_average, '</td>',
							'<td style="font-size:11px" rowspan="'.count($targets).'">', $opcr->remarks, '</td>',
						'</tr>';

						if (isset($targets))
						{
							echo '<tr>';
							foreach ($ipcrs as $ipcr) {
								$ipcr_targets = $this->opcr->find_targets($opcr->ipcr_ID, NULl, NULL);
								foreach ($users as $user) {
									if ($opcr->user_ID == $user->user_ID)
									{
										foreach ($targets as $itarget)
										{
											if ($opcr->otarget_ID == $itarget->otarget_ID)
											{
												echo '<td style="font-size:11px">', $itarget->indicator, '</td>',
												'<td style="font-size:11px">', $user->last_name, '</td>',
												'<td style="font-size:11px">', $itarget->accom, '</td>';
											}
										}
									}
								}
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
			<td></td>
			</tr>';
		}
		?>
	</tbody>
</table>

<table class="table table-bordered">	
	<tbody>
		<tr><td>Average Rating</td><td width="150"></td></tr>
		<tr><td>Total Rating</td><td width="150"></td></tr>
		<tr><td>Final Average Rating</td><td width="150"></td></tr>
		<tr><td>Adjectival Rating</td><td width="150"></td></tr>
	</tbody>
</table>

<table class="table table-bordered">
	<tbody>
		<tr>
			<td colspan="4">Assessed by:</td>
			<td>Final Rating by:</td>
			<td class="text-center" width="75">Date</td>
		</tr>
		<tr>
			<td><br></td>
			<td style="vertical-align:top" class="text-center" rowspan="2" width="75">Date</td>
			<td></td>
			<td style="vertical-align:top" class="text-center" rowspan="2" width="75">Date</td>
			<td></td>
			<td rowspan="2"></td>
		</tr>
		<tr>
			<td class="text-center">Planning Office</td>
			<td class="text-center">PMT</td>
			<td class="text-center">Head of Agency</td>
		</tr>
	</tbody>
</table>