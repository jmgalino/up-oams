<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/ipcr'); ?>>Individual Performance Commitment and Review</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<?php if ($targets): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <?php echo (($session->get('position') == 'dean') ? 'save' : 'submit'); ?>.
	</p>
</div>
<?php endif; ?>

<?php
// foreach ($categories as $category => $category_ID)
// {
// 	foreach ($outputs as $output)
// 	{
// 		if($category = $output['category_ID'])
// 		{
// 			echo '<option id="'.$category.'" value="'.$output['output_ID'].'" style="display:none;">'.$output['output'].'</option>';
// 		}
// 	}
// }

 // $array['E'] =  'Letter E'; 
 // $array['F'] =  'Letter F'; 
 // $array['G'] =  'Letter G'; 
 // $array['selected'] =  'F';
 // print json_encode($array);

// Add output
echo View::factory('faculty/ipcr/form/modals/output')
	->bind('categories', $categories)
	->bind('outputs', $outputs);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block pre-scrollable">
		<?php
			echo '<h1 class="text-center">Individual Performance Commitment and Review (IPCR)</h1>';
			echo '<br>';

			// echo '<p>I, <span style="text-decoration: underline;">', $session->get('fullname'), '</span>',
			// 	 ' of the <span style="text-decoration: underline;">', $department, '</span>',
			// 	' commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period ',
			// 	'<span style="text-decoration: underline;">', date_format(date_create($session->get('opcr_details')['period_from']), 'F Y'), '</span> to ',
			// 	'<span style="text-decoration: underline;">', date_format(date_create($session->get('opcr_details')['period_to']), 'F Y'), '</span>.</p>';
			// echo '<br>';
			
			// echo '<table style="font-size:14px" width="200" align="right">
			// 	<tbody>
			// 		<tr><td class="text-center" style="border-bottom:1pt solid black">', $session->get('fullname'), '</td></tr>
			// 		<tr><td class="text-center">','Unit Head, ', $title, '</td></tr>
			// 		<tr><td class="text-center">Date: ', date('F d, Y'), '</td></tr>
			// 	</tbody>
			// </table><br><br><br><br>';

			echo View::factory('faculty/ipcr/form/fragment')
				->bind('categories', $categories)
				->bind('targets', $targets)
				->bind('outputs', $outputs);
		?>
		</pre>
	</div>

	<div class="col-sm-3">
		<div class="bs-sidebar hidden-print affix" role="complementary">
			<ul class="nav nav-pills nav-stacked">
				<li>
					<a data-toggle="modal" data-target="#modal_output" role="button" href="">Add Output</a>
				</li>
				<?php if ($targets): ?>
				<hr>
				<li> 
					<a href=<?php echo URL::site('faculty/opcr/publish/'.$session->get('opcr_details')['opcr_ID']); ?>>
					<?php echo (($session->get('position') == 'dean') ? 'Save' : 'Submit'); ?>
					</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
