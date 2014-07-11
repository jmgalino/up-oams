<ol class="breadcrumb">
	<li><a href=<?php echo url::site('faculty/index'); ?>>Home</a></li>
	<li><a href=<?php echo url::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<?php if (isset($label)): ?> <li class="active">View <?php echo $label; ?></li>
	<?php else: ?> <li class="active">New</li>
	<?php endif; ?>
</ol>

<?php if ($this->site->session->get('position') !== 'dean'): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to submit before leaving the page.
	</p>
</div>
<?php endif; ?>

<div class="col-sm-9">
	<pre class="center-block pre-scrollable">
		<?php
			$dept = $this->site->session->get('department');
			$college = $this->site->session->get('college');
			$ipcr_ID = $this->ipcr->get_ipcrID();
			$ipcr = $this->ipcr->get_details($ipcr_ID);
			$opcr_ID = $ipcr[0]->opcr_ID;
		    $opcr = $this->opcr->get_details($opcr_ID);
		    $pfrom = DateTime::createFromFormat('Y-m-d', $opcr[0]->period_from);
		    $pto = DateTime::createFromFormat('Y-m-d', $opcr[0]->period_to);

			echo '<h4 class="text-center">Individual Performance Commitment and Review (IPCR)</h4>';
			echo '<br>';
			echo '<p>I, <span style="text-decoration: underline;">', $this->site->session->get('fullname'), '</span>',
				 ' of the <span style="text-decoration: underline;">', $dept->department, '</span>',
				' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
				'<span style="text-decoration: underline;">', $pfrom->format('F Y'), '</span> to ',
				'<span style="text-decoration: underline;">', $pto->format('F Y'), '</span>.</p>';

			echo '<table style="font-size:14px" width="200" align="right">
				<tbody>
					<tr><td class="text-center" style="border-bottom:1pt solid black">', $this->site->session->get('fullname'), '</td></tr>
					<tr><td class="text-center">';

				if ($this->site->session->get('identifier') == 'faculty')
					echo 'Faculty, ', $dept->short;
				elseif ($this->site->session->get('identifier') == 'dept_chair')
					echo 'Unit Head, ', $dept->short;
				else
					echo 'Unit Head, ', $college->short;

			echo	'</td></tr>
					<tr><td class="text-center">Date: ', date('F d, Y'), '</td></tr>
				</tbody>
			</table><br><br><br>';

			echo View::factory('faculty/ipcr/form/_create/fragment')->render();
		?>
	</pre>
</div>

<div class="col-sm-3">
	<div class="bs-sidebar hidden-print affix" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li><a data-toggle="modal" data-target="#modal_ipcr" role="button" href="">Add Target</a></li>
			<?php if ($this->site->session->get('targets')): ?>
			<hr>
			<?php if ($this->site->session->get('position') !== 'dean'): ?>
			<li><a href=<?php echo url::site('ipcr/submit/'.$this->site->session->get('ipcr_details')['ipcr_ID']); ?>>Submit</a></li>
			<?php else: ?>
			<li><a href=<?php echo url::site('ipcr/submit/'.$this->site->session->get('ipcr_details')['ipcr_ID']); ?>>Save</a></li>
			<?php endif; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>

<?php echo View::factory('faculty/ipcr/form/_create/target')->render(); ?> <!-- Add target -->
