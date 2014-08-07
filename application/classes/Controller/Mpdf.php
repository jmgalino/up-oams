<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Mpdf extends Controller_User {

	/**
	 * Accomplishment Report
	 */
	public function action_accom()
	{
		$accom_details = $this->session->get('accom_details');
		$date = date_format(date_create($accom_details['yearmonth']), 'my');
		$filename = $this->session->get('employee_code').$date.'.pdf';
		$filepath = APPPATH.'files/document_accom/'.$filename;
		$fullname = $this->session->get('fullname');
		
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$my_code_css = file_get_contents(APPPATH.'assets/css/my_code.css');
		$overide = 'body {background-color: #ffffff;font-size: 14px;} 
		h1 {margin-top: -20px;font-size: 18	px;}
		h2 {margin-top: 0px;font-size: 16px;}
		h3 {margin-top: 10px;font-size: 14px;}';

		ob_start();
		include(APPPATH.'views/mpdf/accom/basic.php');
		$template = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF();
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($my_code_css, 1);
		$mpdf->WriteHTML($overide, 1);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filepath, 'F');

		$details['status'] = 'Pending';
		$details['document'] = 'files/document_accom/'.$filename;
		$details['date'] = date_format(date_create(), 'Y-m-d');

		$accom = new Model_Accom;
		$submit_success = $accom->submit($accom_details['accom_ID'], $details);
		$this->session->set('submit', $submit_success);
		
		$this->redirect('faculty/accom');
	}

} // End Mpdf
