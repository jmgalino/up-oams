<?php defined('SYSPATH') or die('No direct script access.');
include_once APPPATH.'assets/lib/mpdf/mpdf.php';

class Controller_Faculty_Mpdf extends Controller_User {

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
			case 'accom-group':
				$this->accom_pdf($id, $type, $purpose, $header);
				break;
			case 'ipcr':
			case 'ipcr-consolidated':
				$this->ipcr_pdf($id, $type, $purpose, $header);
				break;
			case 'opcr':
			case 'opcr-consolidated':
				$this->opcr_pdf($id, $type, $purpose, $header);
				break;
		}
	}

	/**
	 * Show PDF
	 */
	private function pdf_preview($template, $filename, $top, $header_contents)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		ob_start();
		echo View::factory('mpdf/defaults/header')->bind('header_contents', $header_contents);
		$header = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF('','', 0, '', 25, 25, $top, 25, 6.5, 6.5);
		$mpdf->SetAuthor($fullname);
		$mpdf->SetCreator('UP Mindanao OAMS');
		$mpdf->WriteHTML($bootstrap_css, 1);
		$mpdf->WriteHTML($mpdf_css, 1);
		$mpdf->SetHTMLHeader($header);
		$mpdf->WriteHTML($template);
		$mpdf->Output($filename, 'I');
		exit;
	}

	/**
	 * Download PDF
	 */
	private function pdf_download($template, $filename, $top, $header_contents)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		ob_start();
		echo View::factory('mpdf/defaults/header')->bind('header_contents', $header_contents);
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
	private function pdf_save($template, $filepath, $top, $header_contents)
	{
		$fullname = $this->session->get('fullname');
		$bootstrap_css = file_get_contents(APPPATH.'assets/css/bootstrap.min.css');
		$mpdf_css = file_get_contents(APPPATH.'assets/css/my_code_mpdf.css');

		ob_start();
		echo View::factory('mpdf/defaults/header')->bind('header_contents', $header_contents);
		$header = ob_get_contents();
		ob_get_clean();

		$mpdf = new mPDF('','', 0, '', 25, 25, $top, 25, 6.5, 6.5);
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
	private function accom_pdf($accom_ID, $type, $purpose, $header)
	{
		$accom = new Model_Accom;
		$univ = new Model_Univ;
		
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));

		// Consolidate Accomplishment Reports
		if ($purpose == 'consolidate')
		{
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
			$this->pdf_download($template, $filename, $top, $header);
		}

		// Monthly Accomplishment Report
		else
		{
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
				$this->pdf_download($template, $filename, 55, $header);
			}
			
			// Generate PDF for preview
			elseif ($purpose == 'preview')
			{
				$filepath = DOCROOT.'files/tmp/'.$filename;
				$this->pdf_save($template, $filepath, 55, $header);
				$this->session->set('pdf_draft', $filename);
				$this->redirect('faculty/accom/preview/'.$accom_ID);
			}
			
			// Generate PDF to submit
			elseif ($purpose == 'submit')
			{
				$filepath = DOCROOT.'files/document_accom/'.$filename;
				$this->pdf_save($template, $filepath, 55, $header);

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
	 * IPCR Forms
	 */
	private function ipcr_pdf($ipcr_ID, $type, $purpose, $header)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$oams = new Model_Oams;
		$univ = new Model_Univ;
		$user = new Model_User;

		if ($type == 'ipcr')
		{
			$ipcr_details = $ipcr->get_details($ipcr_ID);
			$opcr_details = $opcr->get_details($ipcr_details['opcr_ID']);
		}
		else
			$opcr_details = $opcr->get_details($ipcr_ID);

		$categories = $oams->get_categories();
		$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
		$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));

		$fullname = $this->session->get('fullname');
		$title = ($this->session->get('identifier') == 'dean'
			? 'Unit Head, '.$college_details['short']
			: $this->session->get('identifier') == 'chair'
				? 'Unit Head, '.$department_details['short']
				: 'Faculty, '.$department_details['short']);

		ob_start();
		echo View::factory('mpdf/ipcr/header')
			->bind('fullname', $fullname)
			->bind('department', $department_details['department'])
			->bind('opcr_details', $opcr_details)
			->bind('title', $title);

			// IPCR (Individual) - For faculty members
			if ($type == 'ipcr')
			{
				$targets = $ipcr->get_targets($ipcr_ID);
				$outputs = $opcr->get_outputs($ipcr_details['opcr_ID']);

				echo View::factory('mpdf/ipcr/basic')
					->bind('categories', $categories)
					->bind('targets', $targets)
					->bind('outputs', $outputs);
			}

			// IPCR (Consolidated) - For department chairs
			else
			{
				$programIDs = $univ->get_department_programIDs($department_details['department_ID']);
				$users = $user->get_user_group($programIDs, 'dean');
				
				$outputs = $opcr->get_outputs($ipcr_ID);
				$targets = $ipcr->get_output_targets(NULL, $outputs);
				$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);

				echo View::factory('mpdf/ipcr/consolidated')
					->bind('categories', $categories)
					->bind('outputs', $outputs);
					// ->bind('ipcr_forms', $ipcr_forms)
					// ->bind('targets', $targets)
					// ->bind('users', $users);
			}

		echo View::factory('mpdf/ipcr/legend');
		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF to download
		if ($purpose == 'download')
		{
			$period = date('F Y', strtotime($opcr_details['period_from'])).' - '.date('F Y', strtotime($opcr_details['period_to']));
			$filename = $period.'.pdf';
			$this->pdf_download($template, $filename, 25, NULL);
		}
		
		// Generate PDF for preview
		if ($purpose == 'preview')
		{
			$filename = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to'])).'.pdf';
			$filepath = DOCROOT.'files/tmp/'.$filename;
			$this->pdf_save($template, $filepath, 25, NULL);
			$this->session->set('pdf_draft', $filename);
			$this->redirect('faculty/ipcr/preview/'.$ipcr_ID);
		}

		// Generate PDF to publish/submit
		elseif ($purpose == 'submit')
		{
			$filename = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to'])).'.pdf';
			
			if ($type == 'ipcr')
			{
				$filepath = DOCROOT.'files/document_ipcr/'.$filename;
				$this->pdf_save($template, $filepath, 25, NULL);

				$details['status'] = ($this->session->get('identifier') == 'faculty' ? 'Pending' : 'Saved');
				$details['document'] = $filename;
				$details['date_submitted'] = date_format(date_create(), 'Y-m-d');
				$submit_success = $ipcr->update($ipcr_ID, $details);

				$this->session->set('submit', $submit_success);
				$this->redirect('faculty/ipcr', 303);
			}
			else
			{
				$filepath = DOCROOT.'files/document_opcr/'.$filename;
				$this->pdf_save($template, $filepath, 25, NULL);

				$details['status'] = 'Pending';
				$details['document'] = $filename;
				$details['date_submitted'] = date_format(date_create(), 'Y-m-d');
				$submit_success = $opcr->update($ipcr_ID, $details);

				$this->session->set('submit', 'The OPCR was successfully submitted.');
				$this->redirect('faculty/opcr', 303);
			}
		}
	}

	/**
	 * OPCR Forms
	 */
	private function opcr_pdf($opcr_ID, $type, $purpose, $header)
	{
		$ipcr = new Model_Ipcr;
		$opcr = new Model_Opcr;
		$univ = new Model_Univ;
		$user = new Model_User;

		if ($this->session->get('identifier') == 'dean')
		{
			$college_details = $univ->get_college_details(NULL, $this->session->get('program_ID'));
			$title = $college_details['short'];
			$programIDs = $univ->get_college_programIDs($college_details['college_ID']);
			$users = $user->get_user_group($programIDs, NULL);
		}
		else
		{
			$department_details = $univ->get_department_details(NULL, $this->session->get('program_ID'));
			$title = $department_details['short'];
			$programIDs = $univ->get_department_programIDs($department_details['department_ID']);
			$users = $user->get_user_group($programIDs, 'dean');
		}

		$opcr_details = $opcr->get_details($opcr_ID);
		$date_published = ($opcr_details['date_published'] ? date('F d, Y', strtotime($opcr_details['date_published'])) : date('F d, Y'));
		$outputs = $opcr->get_outputs($opcr_ID);
		$targets = $ipcr->get_output_targets(NULL, $outputs);
		$ipcr_forms = $ipcr->get_opcr_ipcr($opcr_ID);
		$categories = $this->oams->get_categories();
		$fullname = $this->session->get('fullname');

		ob_start();
		echo View::factory('mpdf/opcr/header')
			->bind('fullname', $fullname)
			->bind('department_details', $department_details)
			->bind('opcr_details', $opcr_details)
			->bind('title', $title)
			->bind('date_published', $date_published);
		
			// OPCR - template for faculty
			// if ($type == 'opcr')
				echo View::factory('mpdf/opcr/basic')
					->bind('categories', $categories)
					->bind('outputs', $outputs)
					->bind('ipcr_forms', $ipcr_forms)
					->bind('targets', $targets)
					->bind('users', $users);

			// OPCR - consolidated for dean
			// elseif ($type == 'opcr-consolidated')
			// 	include_once(APPPATH.'views/mpdf/opcr/consolidated.php');

		echo View::factory('mpdf/opcr/legend');
		$template = ob_get_contents();
		ob_get_clean();	
		
		// Generate PDF to download
		if ($purpose == 'download')
		{
			$period = date('F Y', strtotime($opcr_details['period_from'])).' - '.date('F Y', strtotime($opcr_details['period_to']));
			$filename = $period.'.pdf';
			$this->pdf_download($template, $filename, 25, NULL);
		}
		
		// Generate PDF for preview
		if ($purpose == 'preview')
		{
			$period = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to']));
			$filename = $this->session->get('employee_code').$period.'.pdf';
			$filepath = DOCROOT.'files/tmp/'.$filename;
			$this->pdf_save($template, $filepath, 25, NULL);
			$this->session->set('pdf_draft', $filename);
			$this->redirect('faculty/opcr/preview/'.$opcr_ID);
		}

		// Generate PDF to publish/submit
		elseif ($purpose == 'submit')
		{
			$period = date('my', strtotime($opcr_details['period_from'])).date('my', strtotime($opcr_details['period_to']));
			$filename = $this->session->get('employee_code').$period.'.pdf';
			$filepath = DOCROOT.'files/document_opcr/'.$filename;
			$this->pdf_save($template, $filepath, 25, NULL);

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
