<?php
echo '<h3>VIII. Other Accomplishments</h3>';

if ($session->get('accom_oth'))
{
	$accom_oth = $session->get('accom_oth');

	foreach ($accom_oth as $oth)
	{
		echo $oth['start']; $start = date_format(date_create($oth['start']), 'd F Y');
		echo $oth['end']; $end = date_format(date_create($oth['end']), 'd F Y');

		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo $oth['participation'], '. ';
		echo $oth['activity'], '. ';
		echo $oth['venue'], '. ';
		echo $start, ' to ';
		echo $end;
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		
		$form = '<form action='.URL::site('faculty/accom/edit/oth/'.$oth['other_ID']).' method=\'post\' class=\'form-horizontal\' role=\'form\'>
					<div class=\'form-group\'>
			          <label for=\'participation\' class=\'col-sm-3 control-label\'>Participation</label>
			          <div class=\'col-sm-8\'>
			            <input type=\'text\' class=\'form-control\' id=\'participation\' name=\'participation\' value=\''.$oth['participation'].'\'>
			          </div>
			        </div>

			        <div class=\'form-group\'>
			          <label for=\'activity\' class=\'col-sm-3 control-label\'>Activity</label>
			          <div class=\'col-sm-8\'>
			            <input type=\'text\' class=\'form-control\' id=\'activity\' name=\'activity\' value=\''.$oth['activity'].'\'>
			          </div>
			        </div>

			        <div class=\'form-group\'>
			          <label for=\'venue\' class=\'col-sm-3 control-label\'>Venue</label>
			          <div class=\'col-sm-8\'>
			            <input type=\'text\' class=\'form-control\' id=\'venue\' name=\'venue\' value=\''.$oth['venue'].'\'>
			          </div>
			        </div>

			        <div class=\'form-group\'>
			          <label for=\'dates\' class=\'col-sm-3 control-label\'>Inclusive dates</label>
			          <div class=\'col-sm-8\'>
			            <div class=\'input-daterange input-group\' id=\'datepicker\'>
			              <input type=\'text\' class=\'form-control\' id=\'dates\' name=\'start\' value=\''.$start.'\'>
			              <span class=\'input-group-addon\'>-</span>
			              <input type=\'text\' class=\'form-control\' id=\'dates\' name=\'end\' value=\''.$end.'\'>
			            </div>
			          </div>
			        </div>   

					<div class=\'btn-toolbar pull-right\' role=\'toolbar\' style=\'padding-bottom:10px;\'>
						<input type=\'submit\' class=\'btn btn-primary\' value=\'Save\'>
					</div>
				</form>';

		echo '<a class="btn btn-default" id="editAccom" data-container="body" data-toggle="popover" data-placement="right" data-html="true" data-content="'.$form.'">',
			'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" href='.URL::site('faculty/accom/remove/oth/'.$oth['other_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>