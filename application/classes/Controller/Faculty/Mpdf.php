<?php defined('SYSPATH') or die('No direct script access.');
define("_MPDF_TEMP_PATH", DOCROOT.'files/tmp/');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Faculty_Mpdf extends Controller_User {

	public function action_index()
	{
		$this->action_delete_session();
		$id = $this->request->param('id');
		$type = $this->request->param('type');
		$purpose = $this->request->param('purpose');
		
		switch ($type) {
			case 'accom':
			case 'accom-consolidated':
				$this->accom_pdf($id, $type, $purpose);
				break;
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
	// public function action_preview($template, $filename)
	// {
	// 	$fullname = $this->session->get('fullname');

	// 	$mpdf = new mPDF();
	// 	$mpdf->SetAuthor($fullname);
	// 	$mpdf->SetCreator('UP Mindanao OAMS');
	// 	$mpdf->WriteHTML($template);
	// 	$mpdf->Output($filename, 'D');
	// }

	/**
	 * Save PDF to local file
	 */
	public function action_submit($template, $filepath)
	{
		$fullname = $this->session->get('fullname');
		
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		$mpdf = new mPDF('', 'A4');
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($mpdf_css, 1);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filepath, 'F');
	}

	/**
	 * Accomplishment Reports
	 */
	private function accom_pdf($accom_ID, $type, $purpose)
	{
		$accom = new Model_Accom;
			
		$accom_details = $accom->get_details($accom_ID)[0];
		$date = date_format(date_create($accom_details['yearmonth']), 'my');
		$filename = $this->session->get('employee_code').$date.'.pdf';
		$filepath = DOCROOT.'files/document_accom/'.$filename;
		
		$pub = $accom->get_accoms($accom_ID, 'pub'); $this->session->set('accom_pub', $pub);
		$awd = $accom->get_accoms($accom_ID, 'awd'); $this->session->set('accom_awd', $awd);
		$rch = $accom->get_accoms($accom_ID, 'rch'); $this->session->set('accom_rch', $rch);
		$ppr = $accom->get_accoms($accom_ID, 'ppr'); $this->session->set('accom_ppr', $ppr);
		$ctv = $accom->get_accoms($accom_ID, 'ctv'); $this->session->set('accom_ctv', $ctv);
		$par = $accom->get_accoms($accom_ID, 'par'); $this->session->set('accom_par', $par);
		$mat = $accom->get_accoms($accom_ID, 'mat'); $this->session->set('accom_mat', $mat);
		$oth = $accom->get_accoms($accom_ID, 'oth'); $this->session->set('accom_oth', $oth);

		// Monthly Accomplishment Report
		if ($type == 'accom')
		{
			ob_start();
			include_once(APPPATH.'views/mpdf/accom/basic.php');
			$template = ob_get_contents();
			ob_get_clean();
		}

		// Consolidated Accomplishment Reports
		elseif ($type == 'accom-consolidated')
		{
			// ob_start();
			// include(APPPATH.'views/mpdf/accom/consolidated.php');
			// $template = ob_get_contents();
			// ob_get_clean();
		}
		
		// Generate PDF to preview
		if ($purpose == 'preview')
		{} // redirect to preview or save in tmp then delete after preview
		
		// Generate PDF to be submitted
		elseif ($purpose == 'submit')
		{
			$this->action_submit($template, $filepath);

			$details['status'] = 'Pending';
			$details['document'] = $filename;
			$details['date_submitted'] = date_format(date_create(), 'Y-m-d');

			$submit_success = $accom->submit($accom_ID, $details);
			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/accom', 303);
		}
	}

	/**
	 * IPCR Forms
	 */
	private function ipcr_pdf($ipcr_ID, $type, $purpose)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;

		$ipcr_details = $ipcr->get_details($ipcr_ID)[0];
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID'])[0];
		$period_from = DateTime::createFromFormat('Y-m-d', $opcr_details['period_from']);
		$period_to = DateTime::createFromFormat('Y-m-d', $opcr_details['period_to']);
		$filename = $this->session->get('employee_code').$period_from->format('my').$period_to->format('my').'.pdf';
		$filepath = DOCROOT.'files/document_ipcr/'.$filename;
		
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];

		$label = ($this->session->get('identifier') == 'dean'
			? 'Unit Head, '.$college['short']
			: $this->session->get('identifier') == 'dept_chair'
				? 'Unit Head, '.$department['short']
				: 'Faculty, '.$department['short']);

		ob_start();
		include_once(APPPATH.'views/mpdf/ipcr/template.php');

			// OPCR - template for faculty
			if ($type == 'ipcr')
				include_once(APPPATH.'views/mpdf/ipcr/basic.php');

			// OPCR - consolidated for dean
			// elseif ($type == 'opcr-consolidated')
			// 	include_once(APPPATH.'views/mpdf/ipcr/consolidated.php');

		include_once(APPPATH.'views/mpdf/ipcr/legend.php');
		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF to preview
		if ($purpose == 'preview')
		{}

		// Generate PDF to publish/submit
		elseif ($purpose == 'submit')
		{
			$this->action_submit($template, $filepath);

			// IPCR is submitted for approval/checking
			if ($this->session->get('identifier') == 'faculty')
				$details['status'] = 'Pending';
			
			// IPCR by dean/department chair doen't have to be checked
			else
				$details['status'] = 'Saved';

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
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		
		$opcr_details = $opcr->get_details($opcr_ID)[0];
		$period_from = DateTime::createFromFormat('Y-m-d', $opcr_details['period_from']);
		$period_to = DateTime::createFromFormat('Y-m-d', $opcr_details['period_to']);
		$filename = $this->session->get('employee_code').$period_from->format('my').$period_to->format('my').'.pdf';
		$filepath = DOCROOT.'files/document_opcr/'.$filename;
		
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
		$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
		
		$label = 'Unit Head, '.($this->session->get('identifier') == 'dean'
			? $college['short']
			: $department['short']);

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
		
		// Generate PDF to preview
		if ($purpose == 'preview')
		{}

		// Generate PDF to publish/submit
		elseif ($purpose == 'submit')
		{
			$this->action_submit($template, $filepath);

			if ($opcr_details['status'] == 'Draft')
			{
				$position = $this->session->get('position');

				// OPCR can't be submitted thus it is saved.
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

} // End Mpdf
