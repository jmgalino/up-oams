<?php
echo'<h4>VII. Authorship of Audio-Visual Materials/Learning Objects/Laboratory or Lecture Manuals</h4>';

if ($session->get('accom_mat'))
{
	$accom_mat = $session->get('accom_mat');
	
	foreach ($accom_mat as $mat)
	{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '-';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';	
		echo $mat['year'], '. ';
		echo $mat['title'], '.';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

		$form = '<form action='.URL::site('faculty/accom/edit/mat/'.$mat['material_ID']).' method=\'post\' class=\'form-horizontal\' role=\'form\'>
					<div class=\'form-group\'>
						<label for=\'year\' class=\'col-sm-3 control-label\'>Year</label>
						<div class=\'col-sm-8\'>
							<input type=\'text\' class=\'form-control\' id=\'year\' name=\'year\' maxlength=\'4\' pattern=\'([0-9][0-9][0-9][0-9])\' value='.$mat['year'].'>
						</div>
					</div>

					<div class=\'form-group\'>
						<label for=\'title\' class=\'col-sm-3 control-label\'>Title</label>
						<div class=\'col-sm-8\'>
							<input type=\'text\' class=\'form-control\' id=\'title\' name=\'title\' value='.$mat['title'].'>
						</div>
					</div>

					<div class=\'btn-toolbar pull-right\' role=\'toolbar\' style=\'padding-bottom:10px;\'>
						<input type=\'submit\' class=\'btn btn-primary\' value=\'Save\'>
					</div>
				</form>';

		echo '<a class="btn btn-default" id="editAccom" data-container="body" data-toggle="popover" data-placement="right" data-html="true" data-content="'.$form.'">',
			'<span class="glyphicon glyphicon-pencil"></span></a>', '  ';
		echo '<a class="btn btn-default" id="deleteAccom" href='.URL::site('faculty/accom/remove/mat/'.$mat['material_ID']).'>',
			'<span class="glyphicon glyphicon-remove-circle"></span></a>';
		echo '<br>';
	}
}
?>