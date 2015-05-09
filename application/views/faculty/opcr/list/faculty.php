<!-- Site Navigation -->
<ol class="breadcrumb">
	<li><a href=<?php echo URL::site(); ?>>Home</a></li>
	<li class="active">Office Performance Commitment and Review</li>
</ol>

<h3>
	My OPCR Forms
	<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal_opcr" id="new-form">New Form</button>
</h3>
<br>

<?php if ($submit): ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $submit; ?>
	</p>
</div>
<?php elseif ($delete): ?>
<div class="alert <?php echo (is_bool($delete) ? 'alert-success' : 'alert-danger' ); ?> alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo (is_bool($delete) ? 'OPCR was successfully deleted.' : $delete ); ?>
	</p>
</div>
<?php elseif ($error): ?>
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<p class="text-center">
		<?php echo $error; ?>
	</p>
</div>
<?php endif; ?>

<?php
// Init Modal
echo View::factory('faculty/opcr/form/modals/initialize')
	->bind('ipcr_forms', $ipcr_forms)
	->bind('opcr_forms', $opcr_forms);
?>

<?php if ($opcr_forms): ?>
<!-- Table -->
<table class="table table-hover" id="opcr_table" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th></th>
			<th>Period</th>
			<th>Date Published</td>
			<th>Date Submitted</td>
			<th>Status</th>
			<th>Remarks</th>
			<th class="action">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$ipcr = new Model_Ipcr;
	
	foreach ($opcr_forms as $opcr)
	{
		$period_from = date('F Y', strtotime($opcr['period_from']));
		$period_to = date('F Y', strtotime($opcr['period_to']));
		$period = $period_from.' - '.$period_to;

		echo '<tr>
			<td>', $opcr['period_from'], '</td>
			<td>', $period, '</td>';

		echo ($opcr['date_published']
			? '<td>'.date('F d, Y', strtotime($opcr['date_published'])).'</td>'
			: '<td>Not published</td>');

		echo ($opcr['date_submitted']
			? '<td>'.date('F d, Y', strtotime($opcr['date_submitted'])).'</td>'
			: '<td>Not submitted</td>');

		echo '<td>', $opcr['status'], '</td>
			<td>', $opcr['remarks'], '</td>
			<td class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown">Select <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li>
						<a href='.URL::site('faculty/opcr/preview/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-file"></span> Preview Report</a>
					</li>';

		if ($opcr['status'] == 'Returned')
		{
			// Download PDF
			echo '<li>
					<a href='.URL::base().'files/document_opcr/'.$opcr['document'].' download="', $department, ' [', $period, ']">
					<span class="glyphicon glyphicon-download"></span> Download Form (Returned)</a>
				</li>';
			// Download draft
			echo '<li>
					<a href='.URL::site('extras/mpdf/download/opcr/'.$opcr['opcr_ID']).'>
					<span class="glyphicon glyphicon-download"></span> Download Form (Current)</a>
				</li>';

		}
		elseif ($opcr['document'])
		{
			// Download PDF
			echo '<li>
					<a href='.URL::base().'files/document_opcr/'.$opcr['document'].' download="', $department, ' [', $period, ']">
					<span class="glyphicon glyphicon-download"></span> Download Form</a>
				</li>';
		}
		else
		{
			// Download draft
			echo '<li>
					<a href='.URL::site('extras/mpdf/download/opcr/'.$opcr['opcr_ID']).'>
					<span class="glyphicon glyphicon-download"></span> Download Form</a>
				</li>';
		}

		if ($opcr['status'] == 'Draft')
		{
			echo 	'<li>
						<a href='.URL::site('faculty/opcr/update/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-pencil"></span> Edit Form</a>
					</li>
					<li>
						<a id="deleteForm" href='.URL::site('faculty/opcr/delete/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-trash"></span> Delete Form</a>
					</li>';
		}
		elseif (in_array($opcr['status'], array('Published', 'Returned')))
		{
			$ipcr_forms = $ipcr->get_opcr_ipcr($opcr['opcr_ID']);
			
			$accepted = array();
			foreach ($ipcr_forms as $ipcr_form)
			{
				if (in_array($ipcr_form['status'], array('Saved', 'Accepted')))
					$accepted[] = $ipcr_form;
			}

			if ($accepted)
			{
				echo '<li style="color:red">
						<a href='.URL::site('faculty/dept/ipcr/consolidate/'.$opcr['opcr_ID']).'>
						<span class="glyphicon glyphicon-link"></span> Consolidate Form</a>
					</li>';
			}
			else
			{
				echo '<li class="disabled">
						<a href="#" title="No available IPCR Forms to consolidate.">
							<span class="glyphicon glyphicon-link"></span> Consolidate Form
						</a>
					</li>';
			}
		}

		echo '	</ul>
			</td>
			</tr>';
	}?>
	</tbody>
</table>

<?php else: ?>
<div class="alert alert-danger"><p class="text-center">The list is empty.</p></div>
<?php endif; ?>
