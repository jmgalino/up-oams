<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_AccomSpec extends Controller_Faculty {

	/**
	 * New Accomplishment
	 */
	public function action_add()
	{
		$accom = new Model_Accom;
		
		$accom_ID = $this->session->get('accom_details')['accom_ID'];
		$details = $this->request->post();
		$type = $this->request->param('key');
		
		if (($type !== 'pub') AND ($type !== 'mat'))
		{
			$details = $this->request->post();
			$details['start'] = date_format(date_create($details['start']), 'Y-m-d');
			$details['end'] = date_format(date_create($details['end']), 'Y-m-d');
		}

		switch ($type)
		{
			case 'pub':
				$name_ID = 'publication_ID';
				break;
			
			case 'awd':
				$name_ID = 'award_ID';
				break;
			
			case 'rch':
				$name_ID = 'research_ID';
				break;
			
			case 'ppr':
				$name_ID = 'paper_ID';
				break;
			
			case 'ctv':
				$name_ID = 'creative_ID';
				break;
			
			case 'par':
				$name_ID = 'participation_ID';
				break;
			
			case 'mat':
				$name_ID = 'material_ID';
				break;
			
			case 'oth':
				$name_ID = 'other_ID';
				break;
		}

		$accom->add_accom($accom_ID, $details, $type, $name_ID);
		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID']);
	}

	/**
	 * Edit Accomplishment
	 */
	public function action_edit()
	{
		$accom = new Model_Accom;

		$accom_ID = $this->session->get('accom_details')['accom_ID'];
		$accom_specID = $this->request->param('id');
		$details = $this->request->post();
		$type = $this->request->param('key');
		
		if (($type !== 'pub') AND ($type !== 'mat'))
		{
			$details = $this->request->post();
			$details['start'] = date_format(date_create($details['start']), 'Y-m-d');
			$details['end'] = date_format(date_create($details['end']), 'Y-m-d');
		}

		switch ($type)
		{
			case 'pub':
				$name_ID = 'publication_ID';
				break;
			
			case 'awd':
				$name_ID = 'award_ID';
				break;
			
			case 'rch':
				$name_ID = 'research_ID';
				break;
			
			case 'ppr':
				$name_ID = 'paper_ID';
				break;
			
			case 'ctv':
				$name_ID = 'creative_ID';
				break;
			
			case 'par':
				$name_ID = 'participation_ID';
				break;
			
			case 'mat':
				$name_ID = 'material_ID';
				break;
			
			case 'oth':
				$name_ID = 'other_ID';
				break;
		}

		$accom->edit_accom($accom_ID, $accom_specID, $details, $type, $name_ID);
		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID']);
	}

	/**
	 * Delete Accomplishment
	 */
	public function action_remove()
	{
		$accom = new Model_Accom;

		$user_ID = $this->session->get('user_ID');
		$accom_ID = $this->session->get('accom_details')['accom_ID'];
		$accom_specID = $this->request->param('id');
		$type = $this->request->param('key');

		switch ($type)
		{
			case 'pub':
				$name_ID = 'publication_ID';
				break;
			
			case 'awd':
				$name_ID = 'award_ID';
				break;
			
			case 'rch':
				$name_ID = 'research_ID';
				break;
			
			case 'ppr':
				$name_ID = 'paper_ID';
				break;
			
			case 'ctv':
				$name_ID = 'creative_ID';
				break;
			
			case 'par':
				$name_ID = 'participation_ID';
				break;
			
			case 'mat':
				$name_ID = 'material_ID';
				break;
			
			case 'oth':
				$name_ID = 'other_ID';
				break;
		}

		$accom->delete_accom($user_ID, $accom_ID, $accom_specID, $type, $name_ID);
		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID']);
	}

} // End AccomSpec