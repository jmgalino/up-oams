<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Faculty_AccomSpec extends Controller_Faculty {

	/**
	 * New Accomplishment
	 */
	public function action_add()
	{
		$accom = new Model_Accom;

		switch ($this->request->param('key'))
		{
			case 'pub':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'pub',
					'publication_ID'
				);
				break;
			
			case 'awd':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'awd',
					'award_ID'
				);
				break;
			
			case 'rch':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'rch',
					'research_ID'
				);
				break;
			
			case 'ppr':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'ppr',
					'paper_ID'
				);
				break;
			
			case 'ctv':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'ctv',
					'creative_ID'
				);
				break;
			
			case 'par':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'par',
					'participation_ID'
				);
				break;
			
			case 'mat':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'mat',
					'material_ID'
				);
				break;
			
			case 'oth':
				$accom->add_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->post(),
					'oth',
					'other_ID'
				);
				break;
		}

		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID']);
	}

	/**
	 * Edit Accomplishment
	 */
	public function action_edit()
	{
		switch ($this->request->param('key'))
		{
			case 'pub':
				# code...
				break;
			
			case 'awd':
				# code...
				break;
			
			case 'rch':
				# code...
				break;
			
			case 'ppr':
				# code...
				break;
			
			case 'ctv':
				# code...
				break;
			
			case 'par':
				# code...
				break;
			
			case 'mat':
				# code...
				break;
			
			case 'oth':
				# code...
				break;
		}
	}

	/**
	 * Delete Accomplishment
	 */
	public function action_remove()
	{
		$accom = new Model_Accom;
		switch ($this->request->param('key'))
		{
			case 'pub':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'pub',
					'publication_ID'
				);
				break;
			
			case 'awd':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'awd',
					'award_ID'
				);
				break;
			
			case 'rch':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'rch',
					'research_ID'
				);
				break;
			
			case 'ppr':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'ppr',
					'paper_ID'
				);
				break;
			
			case 'ctv':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'ctv',
					'creative_ID'
				);
				break;
			
			case 'par':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'par',
					'participation_ID'
				);
				break;
			
			case 'mat':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'mat',
					'material_ID'
				);
				break;
			
			case 'oth':
				$accom->delete_accom(
					$this->session->get('user_ID'),
					$this->session->get('accom_details')['accom_ID'],
					$this->request->param('id'),
					'oth',
					'other_ID'
				);
				break;
		}

		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID']);
	}

} // End AccomSpec