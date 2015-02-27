<?php
function redate($start, $end)
{
	$date = '';

	$stime = strtotime($start);
	$sdate = date('d', $stime);
	$smonth = date('F', $stime);
	$syear = date('Y', $stime);

	$etime = strtotime($end);
	$edate = date('d', $etime);
	$emonth = date('F', $etime);
	$eyear = date('Y', $etime);

	if (($smonth == $emonth) AND ($syear == $eyear))
	{
		if ($sdate == $edate)
		{
			$date = date('F d, Y', strtotime($start));
		}
		else
		{
			$date = $smonth.' '.$sdate.'-'.$edate.', '.$syear;
		}
	}
	else
		$date = date('F d, Y', strtotime($start)).' - '.date('F d, Y', strtotime($end));

	return $date;
}
?>

<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li><a href=<?php echo URL::site('faculty/accom'); ?>>Accomplishment Report</a></li>
	<li class="active"><?php echo $label; ?></li>
</ol>

<?php if ($success): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $success; ?>
	</p>
</div>
<?php elseif ($error OR $success === FALSE): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo ($error ? $error : 'Something went wrong. Please try again.'); ?>
	</p>
</div>
<?php elseif ($warning): ?>
<div class="alert alert-warning alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $warning; ?>
	</p>
</div>
<?php elseif ($accom): ?>
<div class="alert alert-reminder alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		Don't forget to <strong><?php echo (($session->get('position') == 'dean') ? 'save' : 'submit'); ?></strong>.
	</p>
</div>
<?php endif; ?>

<?php
// Choose accomplishment type
echo View::factory('faculty/accom/form/modals/accom_type')->bind('session', $session);
?>

<div class="row">
	<div class="col-sm-9">
		<pre class="center-block">
			<?php
				echo '<p class="text-center"><img src="', URL::base().'application/assets/img/upmindanao_logo_small.png', '"></p>';
				// echo '<img src="', APPPATH.'assets/img/upmindanao_logo.png', '" class="img-responsive">';
				echo '<h1 class="text-center" style="text-transform:uppercase">', $university, '</h1>';
				echo '<h1 class="text-center" style="text-transform:uppercase">', $college_details['college'], '</h1>';
				echo '<h1 class="text-center">', $department_details['department'], '</h1>';
				echo '<hr style="border-top:1px solid #000; margin: 5px 0 20px;">';
				echo '<h1 class="text-center">Accomplishment Report</h1>';
				echo '<h2 class="text-center">', $label, '</h2><br>';
				// echo '<h2>', $session->get('fullname'), '</h2>';
				// echo '<h3>', $session->get('rank'), '</h3>';
				echo '<br>';
				$session->set('attachment', 0);

				echo View::factory('faculty/accom/form/fragments/publication')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/award')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/research')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/paper')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/creative')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/participation')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/material')->bind('session', $session);
				echo View::factory('faculty/accom/form/fragments/other')->bind('session', $session);

				echo '
				<table>
					<tr>
						<td>
							<table width="200" style="font-size: 100%;">
								<tbody>
									<tr><td>Prepared by:</td></tr>
									<tr><td> </td></tr>
									<tr><td> </td></tr>
									<tr><td class="text-center" style="border-bottom:1pt solid black"></td></tr>
									<tr><td class="text-center">', $session->get('fullname'), '</td></tr>
									<tr><td class="text-center">', $session->get('rank'), '</td></tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table width="200" style="font-size: 100%;">
								<tbody>
									<tr><td>Noted by:</td></tr>
									<tr><td> </td></tr>
									<tr><td> </td></tr>
									<tr><td class="text-center" style="border-bottom:1pt solid black"></td></tr>
									<tr><td class="text-center">', $department_details['rank'], ' ', $department_details['first_name'], ' ', $department_details['middle_name'][0], '. ', $department_details['last_name'], '</td></tr>
									<tr><td class="text-center">Chair, ', $department_details['short'], '</td></tr>
								</tbody>
							</table>
						</td>
						<td width="100"></td>
						<td>
							<table width="200" style="font-size: 100%;">
								<tbody>
									<tr><td>Approved by:</td></tr>
									<tr><td> </td></tr>
									<tr><td> </td></tr>
									<tr><td class="text-center" style="border-bottom:1pt solid black"></td></tr>
									<tr><td class="text-center">', $college_details['rank'], ' ', $college_details['first_name'], ' ', $college_details['middle_name'][0], '. ', $college_details['last_name'], '</td></tr>
									<tr><td class="text-center">Dean, ', $college_details['short'], '</td></tr>
								</tbody>
							</table>
						</td>
					</tr>
				</table>';
			?>
		</pre>
	</div>

	<div class="col-sm-3" role="complementary">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a id="addAccomplishment" data-toggle="modal" data-target="#modal_accom" role="button" href="">Add Accomplishment</a>
			</li>
			<?php if ($accom): ?>
			<hr>
			<li> 
				<a href=<?php echo URL::site('faculty/accom/submit/'.$session->get('accom_details')['accom_ID']); ?>>
				<?php echo (($session->get('position') == 'dean') ? 'Save' : 'Submit'); ?>
				</a>
				<?php if ($session->get('attachment') != 0)
					echo '<span class="help-block" style="padding: 10px 15px;">Tip: Click on the paper clips to view attachments.</span>';
				?>
			</li>
			<?php endif; ?>
			<?php if ($session->get('accom_details')['status'] == 'Rejected'): ?>
			<br><br><br>
			<li style="padding:10px 15px; border: 1px dashed #003619"><br>
				<dl style="padding:15px;">
					<dt>Remarks</dt>
					<dd><?php echo $session->get('accom_details')['remarks']; ?></dd>
				</dl>
			</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
