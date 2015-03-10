<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Faculty_Mpdf extends Controller_User {

	public function action_index()
	{
		$id = $this->request->param('id');
		$type = $this->request->param('type');
		$purpose = $this->request->param('purpose');

		switch ($type)
		{
			case 'accom':
				if ($purpose == 'consolidate')
					$id = $this->session->get('consolidate_data')['accom_ID'];
				$this->accom_pdf($id, $type, $purpose);
				break;
			case 'accom-group':
				$this->accom_group_pdf();
			case 'ipcr':
			case 'ipcr-consolidated':
				$this->ipcr_pdf($id, $type, $purpose);
				break;
			case 'opcr':
			case 'opcr-consolidated':
				$this->opcr_pdf($id, $type, $purpose);
				break;
		}
	}

	/**
	 * Show PDF
	 */
	// private function pdf_preview($template, $filename)
	// {
	// 	$fullname = $this->session->get('fullname');
	// 	$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
	// 	$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

	// 	ob_start();
	// 	include_once(APPPATH.'views/mpdf/defaults/header.php');
	// 	$header = ob_get_contents();
	// 	ob_get_clean();

	// 	$mpdf = new mPDF('','', 0, '', 25, 25, 55, 25, 6.5, 6.5);
	// 	$mpdf->SetAuthor($fullname);
	// 	$mpdf->SetCreator('UP Mindanao OAMS');
	// 	$mpdf->WriteHTML($bootstrap_css, 1);
	// 	$mpdf->WriteHTML($mpdf_css, 1);
	// 	$mpdf->SetHTMLHeader($header);
	// 	$mpdf->WriteHTML($template);
	// 	$mpdf->Output($filename, 'I');
	// 	exit;
	// }

	/**
	 * Download PDF
	 */
	private function pdf_download($template, $filename, $top)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		ob_start();
		include_once(APPPATH.'views/mpdf/defaults/header.php');
		$header = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF('','', 0, '', 25, 25, $top, 25, 6.5, 6.5);
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($mpdf_css, 1);
		$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filename, 'D');
		exit;
	}

	/**
	 * Save PDF to local file
	 */
	private function pdf_save($template, $filepath)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		ob_start();
		include_once(APPPATH.'views/mpdf/defaults/header.php');
		$header = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF('','', 0, '', 25, 25, 55, 25, 6.5, 6.5);
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($mpdf_css, 1);
		$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filepath, 'F');
	}

	/**
	 * Accomplishment Reports - Faculty
	 */
	private function accom_pdf($accom_ID, $type, $purpose)
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		
		$pub = $accom->get_accoms($accom_ID, 'pub'); $this->session->set('accom_pub', $pub);
		$awd = $accom->get_accoms($accom_ID, 'awd'); $this->session->set('accom_awd', $awd);
		$rch = $accom->get_accoms($accom_ID, 'rch'); $this->session->set('accom_rch', $rch);
		$ppr = $accom->get_accoms($accom_ID, 'ppr'); $this->session->set('accom_ppr', $ppr);
		$ctv = $accom->get_accoms($accom_ID, 'ctv'); $this->session->set('accom_ctv', $ctv);
		$par = $accom->get_accoms($accom_ID, 'par'); $this->session->set('accom_par', $par);
		$mat = $accom->get_accoms($accom_ID, 'mat'); $this->session->set('accom_mat', $mat);
		$oth = $accom->get_accoms($accom_ID, 'oth'); $this->session->set('accom_oth', $oth);
		$this->session->set('accom_type', 'faculty');

		$university = $univ->get_university(); $this->session->set('university', $university);
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID')); $this->session->set('college_details', $college_details);
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID')); $this->session->set('department_details', $department_details);
		
		// Consolidate Accomplishment Reports
		if ($purpose == 'consolidate')
		{
			$consolidate_data = $this->session->get_once('consolidate_data');
			$this->session->set('accom_period', $this->redate($consolidate_data['start'], $consolidate_data['end'], TRUE));
			$period = $this->redate($consolidate_data['start'], $consolidate_data['end'], FALSE);
			$filename = $this->session->get('employee_code').'['.$period.'].pdf';

			ob_start();
			include_once(APPPATH.'views/mpdf/accom/consolidated.php');
			$template = ob_get_contents();
			ob_get_clean();
			
			$this->pdf_download($template, $filename, 55);
		}

		// Monthly Accomplishment Report
		else
		{
			$accom_details = $accom->get_details($accom_ID);
			$date = date_format(date_create($accom_details['yearmonth']), 'my');
			$label = date('F Y', strtotime($accom_details['yearmonth']));
			$filename = $label.'.pdf';

			ob_start();
			include_once(APPPATH.'views/mpdf/accom/basic.php');
			$template = ob_get_contents();
			ob_get_clean();
		
			// Generate PDF to download
			if ($purpose == 'download')
				$this->pdf_download($template, $filename, 55);
			
			// Generate PDF for draft
			// elseif ($purpose == 'draft')
			// {
			// 	$filepath = DOCROOT.'files/tmp/'.$filename;
			// 	$this->pdf_save($template, $filepath);
			// 	return $filename;
			// }
			
			// Generate PDF for preview
			elseif ($purpose == 'preview')
			{
				$filepath = DOCROOT.'files/tmp/'.$filename;
				$this->pdf_save($template, $filepath);
				$this->session->set('pdf_draft', $filename);
				$this->redirect('faculty/accom/preview/'.$accom_ID);
			}
			
			// Generate PDF to submit
			elseif ($purpose == 'submit')
			{
				$filepath = DOCROOT.'files/document_accom/'.$filename;
				$this->pdf_save($template, $filepath);

				$details['status'] = ($this->session->get('identifier') == 'dean' ? 'Saved' : 'Pending');
				$details['document'] = $filename;
				$details['date_submitted'] = date_format(date_create(), 'Y-m-d');

				$submit_success = $accom->submit($accom_ID, $details);
				$this->session->set('submit', $submit_success);
				$this->redirect('faculty/accom', 303);
			}
		}
	}

	/**
	 * Accomplishment Reports - College/Department
	 */
	private function accom_group_pdf()
	{
		$univ = new Model_Univ;

		$data = $this->session->get_once('consolidate_data');
		$this->session->set('accom_type', 'group');
		$this->session->set('accom_period', $this->redate($data['start'], $data['end'], TRUE));
		
		$university = $univ->get_university(); $this->session->set('university', $university);
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID')); $this->session->set('college_details', $college_details);
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID')); $this->session->set('department_details', $department_details);
		
		$period = $this->redate($data['start'], $data['end'], TRUE);
		$prefix = ($this->session->get('identifier') == 'dean' ? $college_details['short'] : $department_details['short']);
		$filename = $prefix.' ('.$period.').pdf';
		$top = ($this->session->get('identifier') == 'dean' ? 45 : 55);

		ob_start();
		include_once(APPPATH.'views/mpdf/accom/consolidated.php');
		$template = ob_get_contents();
		ob_get_clean();

		$this->pdf_download($template, $filename, $top);
	}

	/**
	 * IPCR Forms
	 */
	private function ipcr_pdf($ipcr_ID, $type, $purpose)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		$period_from = DateTime::createFromFormat('Y-m-d', $opcr_details['period_from']);
		$period_to = DateTime::createFromFormat('Y-m-d', $opcr_details['period_to']);
		$filename = $this->session->get('employee_code').$period_from->format('my').$period_to->format('my').'.pdf';
		$filepath = DOCROOT.'files/document_ipcr/'.$filename;
		
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));

		$label = ($this->session->get('identifier') == 'dean'
			? 'Unit Head, '.$college['short']
			: $this->session->get('identifier') == 'dept_chair'
				? 'Unit Head, '.$department['short']
				: 'Faculty, '.$department['short']);

		ob_start();
		include_once(APPPATH.'views/mpdf/ipcr/header.php');

			// IPCR (Individual) - For faculty members
			if ($type == 'ipcr')
				include_once(APPPATH.'views/mpdf/ipcr/basic.php');

			// IPCR (Consolidated) - For department chairs
			elseif ($type == 'opcr-consolidated')
			{
				include_once(APPPATH.'views/mpdf/ipcr/consolidated.php');
				include_once(APPPATH.'views/mpdf/ipcr/legend.php');
			}

		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF for preview
		if ($purpose == 'preview')
		{}

		// Generate PDF to publish/submit
		elseif ($purpose == 'submit')
		{
			$this->pdf_save($template, $filepath);

			$details['status'] = ($this->session->get('identifier') == 'dean' ? 'Saved' : 'Pending');
			$details['document'] = $filename;
			$details['date_submitted'] = date_format(date_create(), 'Y-m-d');
			$submit_success = $ipcr->submit($ipcr_ID, $details);
			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/ipcr', 303);
		}
	}

	/**
	 * OPCR Forms
	 */
	private function opcr_pdf($opcr_ID, $type, $purpose)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		$user = new Model_User;

		$opcr_details = $opcr->get_details($opcr_ID);
		$period_from = DateTime::createFromFormat('Y-m-d', $opcr_details['period_from']);
		$period_to = DateTime::createFromFormat('Y-m-d', $opcr_details['period_to']);
		$filename = $this->session->get('employee_code').$period_from->format('my').$period_to->format('my').'.pdf';
		$filepath = DOCROOT.'files/document_opcr/'.$filename;
			
		if ($this->session->get('identifier') == 'dean')
		{
			$college = $univ->get_college_details(NULL, $this->session->get('program_ID'));
			$label = $college['short'];
			$programIDs = $univ->get_college_programIDs($college['college_ID']);
			$users = $user->get_user_group($programIDs, NULL);
		}
		else
		{
			$department = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$label = $department['short'];
			$programIDs = $univ->get_department_programIDs($department['department_ID']);
			$users = $user->get_user_group($programIDs, 'dean');
		}

		$outputs = $opcr->get_outputs($opcr_ID);
		$targets = $ipcr->get_output_targets($outputs);
		$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);
		$categories = $this->oams->get_categories();

		ob_start();
		include_once(APPPATH.'views/mpdf/opcr/template.php');

			// OPCR - template for faculty
			if ($type == 'opcr')
				include_once(APPPATH.'views/mpdf/opcr/basic.php');

			// OPCR - consolidated for dean
			// elseif ($type == 'opcr-consolidated')
			// 	include_once(APPPATH.'views/mpdf/opcr/consolidated.php');

		include_once(APPPATH.'views/mpdf/opcr/legend.php');
		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF for preview
		if ($purpose == 'preview')
		{}

		// Generate PDF to publish/submit
		elseif ($purpose == 'submit')
		{
			$this->pdf_save($template, $filepath);

			if ($opcr_details['status'] == 'Draft')
			{
				$position = $this->session->get('position');

				// OPCR is saved
				if ($position == 'dean')
					$details['status'] = 'Saved';

				// OPCR is published for faculty use - as template for IPCRs
				else
				{
					$details['status'] = 'Published';
					$details['date_published'] = date_format(date_create(), 'Y-m-d');
				}
			}

			// OPCR by a department is submitted to the dean
			else
			{
				$details['status'] = 'Pending';
				$details['date_submitted'] = date_format(date_create(), 'Y-m-d');
			}

			$details['document'] = $filename;
			$submit_success = $opcr->submit($opcr_ID, $details);
			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/opcr', 303);
		}
	}

	/**
	 * Change and improve date format
	 */
	private function redate($start, $end, $words)
	{
		$date = '';

		$stime = strtotime($start);
		$smonth = ($words ? date('F', $stime) : date('m', $stime));
		$syear = date('Y', $stime);

		$etime = strtotime($end);
		$emonth = ($words ? date('F', $etime) : date('m', $etime));
		$eyear = date('Y', $etime);

		if ($syear == $eyear)
			$date = $smonth.' - '.$emonth.' '.$syear;
		else
			$date = $start.' - '.$end;

		return $date;
	}

} // End Mpdf
