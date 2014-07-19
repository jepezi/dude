<?php namespace Controllers\Ajax;

use Input;
use Response;
use Dude\Uploader\ImageUploader;

class AjaxUploadController extends \AjaxBaseController
{
	public function __construct(ImageUploader $uploader)
    {
        parent::__construct();
        $this->uploader = $uploader;
    }

    public function uploadAndSaveIcon()
    {
        if(Input::hasFile('files')){

            $result = $this->uploader->upload(Input::file('files'), '/uploads/genres');

            if(!empty($result))
            {
            	return [
                    'files' => $result
                ];
            } else {
                return Response::json(array('error' => 'Something went wrong'), 500);
            }
        }
    }

    
    public function uploadAndSaveBookmarkImage()
    {
        if(Input::has('file')){

            $result = $this->uploader->uploadFromUrl(Input::get('file'), '/uploads/post_links');

            if(!empty($result))
            {
                return Response::json(
                    ['files' => $result]
                    );
            } else {
                return Response::json(array('error' => 'Something went wrong'), 500);
            }
        }
    }
}