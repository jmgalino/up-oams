<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Extras_Upload extends Controller {
	
	/**
     * Upload attachment
     */
    public function action_attachment()
    {
        $id = $this->request->post('id');
        $attachments = $this->request->post('attachments');

    	$attachment = '';
    	$filenames = array();
    	$date = strtotime("now");
    	$file_array = $this->rearray_files($attachments);

	    foreach ($file_array as $file)
	    {
	        $filename = $this->save_image($file, $id.$date);
 
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
	    $this->response->body = $attachment;
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
            // append file ext

 
            Image::factory($file)
                ->save($directory.$filename);

            // Delete the temporarray file
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }

} // End Upload
