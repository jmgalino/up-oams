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
		$attachment = NULL;
		
		if (is_uploaded_file($_FILES['attachment']['tmp_name'][0]))
        	$attachment = $this->set_attachment($_FILES['attachment'], $accom_ID, $type);
        
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
				if ($details['fund_external'])
				{
					$tmp = str_replace(',', '', $details['fund_amount']);

					if(is_numeric($tmp)) {
					    $details['fund_amount'] = $tmp;
					}
				}
				else
				{
					unset($details['fund_external']);
					unset($details['fund_amount']);
				}
				if ($details['fund_up'])
				{
					$tmp = str_replace(',', '', $details['fund_up']);

					if(is_numeric($tmp)) {
					    $details['fund_up'] = $tmp;
					}
				}
				else
				{
					unset($details['fund_up']);
				}
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
		
		$add_success = $accom->add_accom($accom_ID, $name_ID, $type, $details, $attachment);
		$this->session->set('success', $add_success);
		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID'], 303);
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

		$update_success = $accom->update_accom($accom_ID, $accom_specID, $details, $type, $name_ID);
		$this->session->set('success', $update_success);
		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID'], 303);
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

		$accom->delete_accom($accom_ID, $accom_specID, $type, $name_ID);
		$this->redirect('faculty/accom/update/'.$this->session->get('accom_details')['accom_ID'], 303);
	}

	/**
     * Upload attachment
     */
    private function set_attachment($attachments, $accom_ID, $type)
    {
    	$attachment = '';
    	$filenames = array();
    	$date = strtotime("now");
    	$file_array = $this->rearray_files($attachments);

	    foreach ($file_array as $file)
	    {
	        $filename = $this->save_image($file, $accom_ID.$type.$date);
 
	        if (!$filename)
	        {
	            $this->session->set('error', 'There was a problem while uploading the attachment(s).');
	        }
	        else
	        {
	            $filenames[] = $filename;
	        }
	    }

	    $attachment = implode(' ', $filenames);
	    return $attachment;
    }

    /**
     * Rearrange multiple file array
     */
    private function rearray_files(&$file_post)
    {

	    $file_array = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);

	    for ($i = 0; $i < $file_count; $i++)
	    {
	        foreach ($file_keys as $key)
	        {
	            $file_array[$i][$key] = $file_post[$key][$i];
	        }
	    }

	    return $file_array;
	}
 
    /**
     * Save attachment(s) in local disk
     */
    private function save_image($image, $postfix)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'files/upload_attachments/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).$postfix.'.jpg';
 
            Image::factory($file)
                ->save($directory.$filename);

            // Delete the temporarray file
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }

} // End AccomSpec