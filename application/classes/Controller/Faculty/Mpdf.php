<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Faculty_Mpdf extends Controller_User {

	private $mpdf;

	public function action_index()
	{
		$this->action_delete_session();
		$id = $this->request->param('id');
		$type = $this->request->param('type');
		$purpose = $this->request->param('purpose');
		
		switch ($type) {
			case 'accom':
			case 'accom-consolidated':
				$this->action_accom($id, $type, $purpose);
				break;
			case 'ipcr':
			case 'ipcr-consolidated':
				// $this->action_ipcr($id, $type, $purpose);
				break;
			case 'opcr':
			case 'opcr-consolidated':
				$this->action_opcr($id, $type, $purpose);
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
	 * Save PDF
	 */
	public function action_submit($template, $filepath)
	{
		$fullname = $this->session->get('fullname');
		
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		$this->mpdf->SetAuthor($fullname);
		$this->mpdf->SetCreator('UP Mindanao OAMS');
		$this->mpdf->WriteHTML($bootstrap_css, 1);
		$this->mpdf->WriteHTML($mpdf_css, 1);
		$this->mpdf->WriteHTML($template);
		$this->mpdf->Output($filepath, 'F');
	}

	/**
	 * Accomplishment Reports
	 */
	private function action_accom($accom_ID, $type, $purpose)
	{
		$accom = new Model_Accom;
			
		$accom_details = $accom->get_details($accom_ID)[0];
		$date = date_format(date_create($accom_details['yearmonth']), 'my');
		$filename = $this->session->get('employee_code').$date.'.pdf';
		$filepath = APPPATH.'files/document_accom/'.$filename;
		
		$this->session->set('accom_details', $accom_details);
		$pub = $accom->get_accoms($accom_details['accom_ID'], 'pub'); $this->session->set('accom_pub', $pub);
		$awd = $accom->get_accoms($accom_details['accom_ID'], 'awd'); $this->session->set('accom_awd', $awd);
		$rch = $accom->get_accoms($accom_details['accom_ID'], 'rch'); $this->session->set('accom_rch', $rch);
		$ppr = $accom->get_accoms($accom_details['accom_ID'], 'ppr'); $this->session->set('accom_ppr', $ppr);
		$ctv = $accom->get_accoms($accom_details['accom_ID'], 'ctv'); $this->session->set('accom_ctv', $ctv);
		$par = $accom->get_accoms($accom_details['accom_ID'], 'par'); $this->session->set('accom_par', $par);
		$mat = $accom->get_accoms($accom_details['accom_ID'], 'mat'); $this->session->set('accom_mat', $mat);
		$oth = $accom->get_accoms($accom_details['accom_ID'], 'oth'); $this->session->set('accom_oth', $oth);

		if ($type == 'accom')
		{
			ob_start();
			include_once(APPPATH.'views/mpdf/accom/basic.php');
			$template = ob_get_contents();
			ob_get_clean();
		}
		elseif ($type == 'accom-consolidated')
		{
			// ob_start();
			// include(APPPATH.'views/mpdf/accom/consolidated.php');
			// $template = ob_get_contents();
			// ob_get_clean();
		}
		
		$this->mpdf = new mPDF('', 'A4');
		if ($purpose == 'preview')
		{} // redirect to preview or save in tmp then delete after preview
		elseif ($purpose == 'submit')
		{
			$this->action_submit($template, $filepath);

			$details['status'] = 'Pending';
			$details['document'] = 'files/document_accom/'.$filename;
			$details['date_submitted'] = date_format(date_create(), 'Y-m-d');

			$submit_success = $accom->submit($accom_ID, $details);
			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/accom');
		}
	}

	/**
	 * IPCR Forms
	 */
	private function action_ipcr($ipcr_ID, $type, $purpose)
	{}

	/**
	 * OPCR Forms
	 */
	private function action_opcr($opcr_ID, $type, $purpose)
	{
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		
		$opcr_details = $opcr->get_details($opcr_ID)[0];
		$period_from = date_format(date_create($opcr_details['period_from']), 'my');
		$period_to = date_format(date_create($opcr_details['period_to']), 'my');
		$filename = $this->session->get('employee_code').$period_from.$period_to.'.pdf';
		$filepath = APPPATH.'files/document_opcr/'.$filename;
		
		$department = $univ->get_department_details(NULL, $this->session->get('program_ID'))[0];
		$this->session->set('opcr_details', $details);
		$this->session->set('department', $department['department']);

		if ($this->session->get('identifier') == 'dean')
		{
			$college = $univ->get_college_details(NULL, $this->session->get('program_ID'))[0];
			$this->session->set('title', $college['short']);
		}
		else 
		{
			$this->session->set('title', $department['short']);
		}

		ob_start();
		include_once(APPPATH.'views/mpdf/opcr/template.php');
			if ($type == 'opcr')
				include_once(APPPATH.'views/mpdf/opcr/basic.php');
			elseif ($type == 'opcr-consolidated')
				include_once(APPPATH.'views/mpdf/opcr/consolidated.php');
		include_once(APPPATH.'views/mpdf/opcr/legend.php');
		$template = ob_get_contents();
		ob_get_clean();	
		
		$this->mpdf = new mPDF('', 'A4-L');
		if ($purpose == 'preview')
		{}
		elseif ($purpose == 'submit')
		{
			$this->action_submit($template, $filepath);

			if ($opcr_details['status'] == 'Draft')
			{
				$position = $this->session->get('position');
				if ($position == 'dean')
					$details['status'] = 'Saved';
				else
				{
					$details['status'] = 'Published';
					$details['date_published'] = date_format(date_create(), 'Y-m-d');
				}
			}
			else
			{
				$details['status'] = 'Pending';
				$details['date_submitted'] = date_format(date_create(), 'Y-m-d');
			}

			$details['document'] = 'files/document_opcr/'.$filename;
			$submit_success = $opcr->submit($opcr_ID, $details);
			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/opcr');
		}
	}

} // End Mpdf
