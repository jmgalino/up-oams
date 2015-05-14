<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Extras_Mpdf extends Controller {

	private $mpdf_css;
	private $session;

	/**
	 * Set session instance
	 */
	public function before()
	{
    	$this->session = Session::instance();
    }

	/**
	 * Reroute
	 */
	public function action_index()
	{
		$univ = new Model_Univ;

		$id = $this->request->param('id');
		$type = $this->request->param('type');
		$purpose = $this->request->param('purpose');

		$header['university'] = $univ->get_university();
		$header['college'] = $univ->get_college_details(NULL, $this->session->get('program_ID'))['college'];
		$header['department'] = $univ->get_department_details(NULL, $this->session->get('program_ID'))['department'];

		switch ($type)
		{
			case 'accom':
			case 'accom-consolidated':
				$this->mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf-accom.css');
				
				if ($type == 'accom') $this->accom_pdf($id, $purpose, $header);
				else $this->accom_consolidated_pdf($header);
				break;
				
			case 'ipcr':
			case 'ipcr-consolidated':
			case 'opcr':
			case 'opcr-consolidated':
				$this->mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf-ipcr_opcr.css');
				
				if ($type == 'ipcr') $this->ipcr_pdf($id, $purpose);
				elseif ($type == 'ipcr-consolidated') $this->ipcr_consolidated_pdf($id, $purpose);
				elseif ($type == 'opcr') $this->opcr_pdf($id, $purpose);
				else $this->opcr_consolidated_pdf();
				break;

			case 'cuma':
				$this->mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf-accom.css');
				$this->cuma_pdf($id, $purpose);
				break;
		}
	}

	/**
	 * Download PDF
	 */
	private function pdf_download($template, $filename, $format, $top, $header_contents)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');

		ob_start();
		echo View::factory('mpdf/defaults/header')->bind('header_contents', $header_contents);
		$header = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF('', $format, 0, '', 25, 25, $top, 25, 6.5, 6.5);
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($this->mpdf_css, 1);
		$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filename, 'D');
		exit;
	}

	/**
	 * Save PDF to local file
	 */
	private function pdf_save($template, $filepath, $format, $top, $header_contents)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');

		ob_start();
		echo View::factory('mpdf/defaults/header')->bind('header_contents', $header_contents);
		$header = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF('', $format, 0, '', 25, 25, $top, 25, 6.5, 6.5);
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($this->mpdf_css, 1);
		$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filepath, 'F');
	}

	/**
	 * Accomplishment Report - Faculty
	 */
	private function accom_pdf($accom_ID, $purpose, $header)
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));

		$pub = $accom->get_accoms($accom_ID, 'pub');
		$awd = $accom->get_accoms($accom_ID, 'awd');
		$rch = $accom->get_accoms($accom_ID, 'rch');
		$ppr = $accom->get_accoms($accom_ID, 'ppr');
		$ctv = $accom->get_accoms($accom_ID, 'ctv');
		$par = $accom->get_accoms($accom_ID, 'par');
		$mat = $accom->get_accoms($accom_ID, 'mat');
		$oth = $accom->get_accoms($accom_ID, 'oth');
		$accom_details = $accom->get_details($accom_ID);
		
		$yearmonth_words = date('F Y', strtotime($accom_details['yearmonth']));
		
		ob_start();

		echo View::factory('mpdf/accom/basic')
			->bind('yearmonth', $yearmonth_words)
			->bind('pub', $pub)
			->bind('awd', $awd)
			->bind('rch', $rch)
			->bind('ppr', $ppr)
			->bind('ctv', $ctv)
			->bind('par', $par)
			->bind('mat', $mat)
			->bind('oth', $oth)
			->bind('department_details', $department_details)
			->bind('college_details', $college_details)
			->bind('session', $this->session);

		$template = ob_get_contents();
		ob_get_clean();
	
		$yearmonth = date('my', strtotime($accom_details['yearmonth']));
		$filename = $this->session->get('employee_code').$yearmonth.'.pdf';
			
		// Generate PDF to download
		if ($purpose == 'download')
		{	
			$filename = $yearmonth_words.'.pdf';
			$this->pdf_download($template, $filename, 'A4', 55, $header);
		}
		
		// Generate PDF for preview
		elseif ($purpose == 'preview')
		{
			$filepath = DOCROOT.'files/tmp/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 55, $header);

			$this->response->body = $filename;
		}
		
		// Generate PDF to submit
		elseif ($purpose == 'submit')
		{
			$filepath = DOCROOT.'files/document_accom/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 55, $header);

			$this->response->body = $filename;
		}
	}

	/**
	 * Accomplishment Report - Consolidated for faculty/department/college
	 */
	private function accom_consolidated_pdf($header)
	{
		$univ = new Model_Univ;
		
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));

		$consolidate_data = $this->session->get_once('consolidate_data');
		$header['level'] = $consolidate_data['level'];
		$period = $this->redate($consolidate_data['start'], $consolidate_data['end'], TRUE);
		
		$pub = $consolidate_data['accoms']['pub'];
		$awd = $consolidate_data['accoms']['awd'];
		$rch = $consolidate_data['accoms']['rch'];
		$ppr = $consolidate_data['accoms']['ppr'];
		$ctv = $consolidate_data['accoms']['ctv'];
		$par = $consolidate_data['accoms']['par'];
		$mat = $consolidate_data['accoms']['mat'];
		$oth = $consolidate_data['accoms']['oth'];

		ob_start();

		echo View::factory('mpdf/accom/consolidated')
			->bind('period', $period)
			->bind('pub', $pub)
			->bind('awd', $awd)
			->bind('rch', $rch)
			->bind('ppr', $ppr)
			->bind('ctv', $ctv)
			->bind('par', $par)
			->bind('mat', $mat)
			->bind('oth', $oth)
			->bind('department_details', $department_details)
			->bind('college_details', $college_details)
			->bind('session', $this->session);

		$template = ob_get_contents();
		ob_get_clean();

		$filename = ($this->session->get('accom_type') == 'group'
			? $this->session->get('identifier') == 'dean'
				? $college_details['short'].' ('.$period.').pdf'
				: $department_details['short'].' ('.$period.').pdf'
			: $period.'.pdf');
		$top = ($this->session->get('identifier') == 'dean' ? 45 : 55);
		$this->pdf_download($template, $filename, 'A4', $top, $header);
	}

	/**
	 * OPCR Form - Guide for IPCR forms
	 */
	private function opcr_pdf($opcr_ID, $purpose)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$oams = new Model_Oams;
		$univ = new Model_Univ;
		$user = new Model_User;

		$opcr_details = $opcr->get_details($opcr_ID);
		$outputs = $opcr->get_outputs($opcr_ID);
		$start = date('F Y', strtotime($opcr_details['period_from']));
		$end = date('F Y', strtotime($opcr_details['period_to']));
		$date = ($opcr_details['status'] == 'Published' ? date('F d, Y', strtotime($opcr_details['date_published'])) : date('F d, Y'));
		
		$fullname = $this->session->get('fullname');
		$categories = $oams->get_categories();
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$unit['fullname'] = $department_details['department'];
		$unit['short'] = $department_details['short'];
		
		ob_start();

		echo View::factory('mpdf/opcr/header')
			->bind('fullname', $fullname)
			->bind('unit', $unit)
			->bind('start', $start)
			->bind('end', $end)
			->bind('date', $date);
		
		echo View::factory('mpdf/opcr/basic')
			->bind('categories', $categories)
			->bind('outputs', $outputs);

		echo View::factory('mpdf/opcr/legend');

		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF to download
		if ($purpose == 'download')
		{
			$period = date('F Y', strtotime($opcr_details['period_from'])).' - '.date('F Y', strtotime($opcr_details['period_to']));
			$filename = $unit.' ['.$period.'].pdf';
			$this->pdf_download($template, $filename, 'A4', 25, NULL);
		}
		
		$period = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to']));
		$filename = $this->session->get('employee_code').$period.'.pdf';
			
		// Generate PDF for preview
		if ($purpose == 'preview')
		{
			$filepath = DOCROOT.'files/tmp/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 25, NULL);

			$this->response->body = $filename;
		}

		// Generate PDF to publish
		elseif ($purpose == 'submit')
		{
			$filepath = DOCROOT.'files/document_opcr/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 25, NULL);

			$details['status'] = 'Published';
			$details['date_published'] = date('Y-m-d');
			$details['document'] = $filename;
			$submit_success = $opcr->submit($opcr_ID, $details);
			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/opcr', 303);
		}
	}

	/**
	 * IPCR Form - Faculty
	 */
	private function ipcr_pdf($ipcr_ID, $purpose)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$oams = new Model_Oams;
		$univ = new Model_Univ;

		$ipcr_details = $ipcr->get_details($ipcr_ID);
		$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$categories = $oams->get_categories();
		$targets = $ipcr->get_targets($ipcr_ID);
		$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);

		$fullname = $this->session->get('fullname');
		$title = 'Faculty, '.$department_details['short'];

		ob_start();

		echo View::factory('mpdf/ipcr/header')
			->bind('fullname', $fullname)
			->bind('department', $department_details['department'])
			->bind('opcr_details', $opcr_details)
			->bind('title', $title);

		echo View::factory('mpdf/ipcr/basic')
			->bind('fullname', $fullname)
			->bind('department', $department_details['department'])
			->bind('opcr_details', $opcr_details)
			->bind('title', $title)
			->bind('categories', $categories)
			->bind('targets', $targets)
			->bind('outputs', $outputs)
			->bind('session', $this->session);

		echo View::factory('mpdf/ipcr/legend');

		echo '<pagebreak />';
		echo View::factory('mpdf/ipcr/attachments')
			->bind('session', $this->session);

		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF to download
		if ($purpose == 'download')
		{
			$period = date('F Y', strtotime($opcr_details['period_from'])).' - '.date('F Y', strtotime($opcr_details['period_to']));
			$filename = $period.'.pdf';
			$this->pdf_download($template, $filename, 'A4', 25, NULL);
		}
		
		$period = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to']));
		$filename = $this->session->get('employee_code').$period.'.pdf';
		
		// Generate PDF for preview
		if ($purpose == 'preview')
		{
			$filepath = DOCROOT.'files/tmp/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 25, NULL);

			$this->session->set('pdf_draft', $filename);
			$this->redirect('faculty/ipcr/preview/'.$ipcr_ID);
		}

		// Generate PDF to submit
		elseif ($purpose == 'submit')
		{
			$filepath = DOCROOT.'files/document_ipcr/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 25, NULL);

			$details['status'] = ($this->session->get('identifier') == 'faculty' ? 'Pending' : 'Saved');
			$details['document'] = $filename;
			$details['date_submitted'] = date('Y-m-d');
			$submit_success = $ipcr->update($ipcr_ID, $details);

			$this->session->set('submit', $submit_success);
			$this->redirect('faculty/ipcr', 303);
		}
	}

	/**
	 * OPCR Form - Consolidated IPCR forms for department
	 */
	private function ipcr_consolidated_pdf($opcr_ID, $purpose)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$oams = new Model_Oams;
		$univ = new Model_Univ;

		$categories = $oams->get_categories();
		
		if ($this->session->get('identifier') == 'chair')
		{
			$opcr_details = $opcr->get_details($opcr_ID);
			$outputs = $opcr->get_outputs($opcr_ID);
			
			$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$unit['fullname'] = $department_details['department'];
			$unit['short'] = $department_details['short'];
			$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);
			$targets = $ipcr->get_output_targets(NULL, $outputs);

			$fullname = $this->session->get('fullname');
			$start = date('F Y', strtotime($opcr_details['period_from']));
			$end = date('F Y', strtotime($opcr_details['period_to']));
			$date = date('F d, Y');

			ob_start();

			echo View::factory('mpdf/opcr/header')
				->bind('fullname', $fullname)
				->bind('unit', $unit)
				->bind('start', $start)
				->bind('end', $end)
				->bind('date', $date);

			echo View::factory('mpdf/ipcr/consolidated')
				->bind('categories', $categories)
				->bind('outputs', $outputs)
				->bind('ipcr_forms', $ipcr_forms)
				->bind('targets', $targets)
				->bind('session', $this->session);

			echo View::factory('mpdf/ipcr/legend');

			echo View::factory('mpdf/ipcr/attachments')
				->bind('session', $this->session);

			$template = ob_get_contents();
			ob_get_clean();
		}	
		elseif ($this->session->get('identifier') == 'dean')
		{
			$ipcr_forms = $this->session->get_once('ipcr_forms');
			
			ob_start();
			$template = '';
			foreach ($ipcr_forms as $ipcr_details)
			{
				$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
				$department_details = $univ->get_department_details(NULL, $ipcr_details['program_ID']);

				$targets = $ipcr->get_targets($ipcr_details['ipcr_ID']);
				$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);

				$fullname = $ipcr_details['first_name'].' '.$ipcr_details['middle_name'][0].'. '.$ipcr_details['last_name'];
				$title = 'Faculty, '.$department_details['short'];
					
				echo View::factory('mpdf/ipcr/header')
					->bind('fullname', $fullname)
					->bind('department', $department_details['department'])
					->bind('opcr_details', $opcr_details)
					->bind('title', $title);

				echo View::factory('mpdf/ipcr/basic')
					->bind('fullname', $fullname)
					->bind('department', $department_details['department'])
					->bind('opcr_details', $opcr_details)
					->bind('title', $title)
					->bind('categories', $categories)
					->bind('targets', $targets)
					->bind('outputs', $outputs)
					->bind('session', $this->session);

				echo View::factory('mpdf/ipcr/legend');
				echo '<pagebreak />';
			}

			echo View::factory('mpdf/ipcr/attachments')
				->bind('session', $this->session);

			$template = ob_get_contents();
			ob_get_clean();
		}

		$period = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to']));
		$filename = $this->session->get('employee_code').$period.'.pdf';
		
		if ($purpose == 'download')
		{
			$period = $this->session->get_once('period');
			$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
			$filename = $college_details['short'].' ('.$period.').pdf';
			$this->pdf_download($template, $filename, 'A4', 25, NULL);
		}

		// Generate PDF for preview
		elseif ($purpose == 'preview')
		{
			$filepath = DOCROOT.'files/tmp/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 25, NULL);

			$this->response->body = $filename;
		}
		
		else
		{
			$filepath = DOCROOT.'files/document_opcr/'.$filename;
			$this->pdf_save($template, $filepath, 'A4', 25, NULL);

			$details['status'] = 'Pending';
			$details['document'] = $filename;
			$details['date_submitted'] = date('Y-m-d');
			$submit_success = $opcr->update($opcr_ID, $details);

			$this->session->set('submit', 'The OPCR was successfully submitted.');
			$this->redirect('faculty/opcr', 303);
		}
	}

	/**
	 * OPCR Form - Consolidated OPCR forms for college
	 */
	private function opcr_consolidated_pdf()
	{
		$oams = new Model_Oams;
		$univ = new Model_Univ;
		
		$consolidate_data = $this->session->get('consolidate_data');
		$start = date('F Y', strtotime($consolidate_data['start']));
		$end = date('F Y', strtotime($consolidate_data['end']));
		$period = $start.' - '.$end;

		$categories = $oams->get_categories();
		$fullname = $this->session->get('fullname');
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$unit['fullname'] = $college_details['college'];
		$unit['short'] = $college_details['short'];
		$date = date('F d, Y');
		
		ob_start();

		echo View::factory('mpdf/opcr/header')
			->bind('fullname', $fullname)
			->bind('unit', $unit)
			->bind('start', $start)
			->bind('end', $end)
			->bind('date', $date);

		echo View::factory('mpdf/opcr/consolidated')
			->bind('categories', $categories)
			->bind('outputs', $consolidate_data['opcr_outputs'])
			->bind('session', $this->session);

		echo View::factory('mpdf/opcr/legend');

		echo '<pagebreak />';
		echo View::factory('mpdf/opcr/attachments')
			->bind('session', $this->session);

		$template = ob_get_contents();
		ob_get_clean();

		$filename = $college_details['short'].' ('.$period.').pdf';
		$this->pdf_download($template, $filename, 'A4', 25, NULL);
	}

	/**
	 * CUMA Form
	 */
	private function cuma_pdf($cuma_ID, $purpose)
	{
		$accom = new Model_Accom;
		$cuma = new Model_Cuma;
		$user = new Model_User;
		$univ = new Model_Univ;

		$cuma_details = $cuma->get_details($cuma_ID);
		$start = date('Y', strtotime($cuma_details['period_from']));
		$end = date('Y', strtotime($cuma_details['period_to']));
		$period = 'AY '.$start.' - '.$end;

		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$department_programs = $univ->get_department_programIDs($department_details['department_ID']);
		$department_users = $user->get_user_group($department_programs);
		$programs = $univ->get_programs();

		$department_programIDs = array();
		foreach ($department_programs as $program) {
			$department_programIDs[] = $program['program_ID'];
		}
		
		$university['mission'] = $univ->get_mission();
		$university['vision'] = $univ->get_vision();
		
		ob_start();

		echo View::factory('mpdf/cuma/template')
			->bind('department_details', $department_details)
			->bind('period', $period)
			->bind('university', $university)
			->bind('programs', $programs)
			->bind('department_programIDs', $department_programIDs)
			->bind('department_users', $department_users)
			->bind('accom', $accom)
			->bind('cuma_details', $cuma_details)
			->bind('user', $user);

		$template = ob_get_contents();
		ob_get_clean();

		$start = date('Y', strtotime($cuma_details['period_from']));
		$end = date('Y', strtotime($cuma_details['period_to']));
		$filename = $this->session->get('employee_code').$start.$end.'.pdf';
		
		// Generate PDF for preview
		if ($purpose == 'preview')
		{
			$filepath = DOCROOT.'files/document_cuma/'.$filename;
			$this->pdf_save($template, $filepath, 'A4-L', 25, NULL);
			// $this->pdf_download($template, $filename, 'A4-L', 25, NULL);
			$cuma->update(array('cuma_ID' => $cuma_ID, 'document' => $filename));
			$this->response->body = $filename;
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
