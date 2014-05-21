<table class="table">
	<thead>
		<tr>
			<th class="active text-center" colspan="2">MFO/PAP</th>
<!--			<th class="active text-center">Success Indicator (Target + Measure)</th>-->
<!--			<th class="active text-center" colspan="2">Divisions/Individual Accountable</th>-->
		</tr>
	</thead>
	<tbody>
		<?php
		$opcr_rows = $this->site->session->get('opcr_rows');
		$category = $this->site->session->get('category');
		foreach ($category as $c)
		{

			echo '<tr><td colspan="2">', $c->category, '</td></tr>';
				
			if ($this->site->session->get('opcr_rows'))
			{

				foreach ($opcr_rows as $opcr)
				{
					if ($c->category_ID == $opcr->category_ID)
					{
						echo '<tr>',
								'<td class="pcr">', $opcr->output, '</td>',
//								'<td class="pcr">', $opcr->indicator, '</td>',
//								'<td class="pcr">', $opcr->accountable, '</td>',
								'<td>',
									'<a class="pull-right" href="'.url::site('opcr/delete_output/'.$opcr->otarget_ID).'">',
									'<span class="glyphicon glyphicon-remove-circle"></span></a>',
								'</td>',
							'</tr>';
					}
				}
			}
		}
		?>
	</tbody>
</table>