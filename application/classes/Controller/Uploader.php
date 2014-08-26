<?php defined('SYSPATH') or die('No direct script access.');
 
class Controller_Uploader extends Controller {
 
    /**
     * Upload user photo
     */
    public function action_photo()
    {
        $session = Session::instance();
        $filename = NULL;
 
        if ($this->request->method() == Request::POST)
        {
            if (isset($_FILES['photo']))
            {
                $filename = $this->save_image($_FILES['photo']);
            }
        }
 
        if (!$filename)
        {
            $session->set('error', 'There was a problem while uploading the image.');
        }
        else
        {
            $user = new Model_User;
            $employee_code = $this->request->param('id');
            $user_details = $user->get_details(NULL, $employee_code)[0];

            if($user_details['pic'])
                unlink(DOCROOT.'files/upload_photos/'.$user_details['pic']);

            $update_success = $user->update_details($employee_code, array('pic' => $filename));
            $session->set('upload', $update_success);
            $this->redirect('admin/profile/view/'.$employee_code, 303);
        }
        
    }
 
    /**
     * Save photo in local disk
     */
    private function save_image($image)
    {
        if (
            ! Upload::valid($image) OR
            ! Upload::not_empty($image) OR
            ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'files/upload_photos/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).'.jpg';
 
            $img = Image::factory($file);
            $height = $img->height;
            $width = $img->width;

            if ($height > $width)
                $img->crop($width, $width);
            else
                $img->crop($height, $height);
    
            $img->resize(200, 200, Image::AUTO)
                ->save($directory.$filename);

            // Delete the temporary file
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }
 
} // End Uploader