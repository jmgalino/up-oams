<table class="table">
	<thead>
		<tr>
			<th class="active text-center" style="vertical-align:middle">Output</th>
			<th class="active text-center" width="400" colspan="2">Success Indicator<br>(Target + Measure)</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$category = $this->site->session->get('category');
		$outputs = $this->site->session->get('outputs');
		$targets = $this->site->session->get('targets');
 
		foreach ($category as $c)
		{
			echo '<tr><td colspan="3">', $c->category, '</td></tr>';
				
			if ($this->site->session->get('targets'))
			{
				foreach ($outputs as $output)
				{
					if ($c->category_ID == $output->category_ID)
					{
						foreach ($targets as $target)
						{
							if ($output->otarget_ID == $target->otarget_ID)
							{
								echo '<tr>',
									'<td class="pcr">', $output->output, '</td>',
									'<td class="pcr">', $target->indicator, '</td>',
									'<td>',
										'<a class="pull-right" href="'.url::site('ipcr/delete_target/'.$target->itarget_ID).'">',
										'<span class="glyphicon glyphicon-remove-circle"></span></a>',
									'</td>',
								'</tr>';
							}
						}
					}
				}
			}
		}
		?>
	</tbody>
</table>