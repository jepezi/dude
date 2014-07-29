<?php namespace Dude\Uploader;

use Illuminate\Support\Str;
use Response;
use Image;
use File;

class ImageUploader extends AbstractUploader implements Uploader {

  /**
   * An array of Validable classes
   *
   * @param array
   */
  protected $validators;


  public function __construct(array $validators)
  {
    parent::__construct();

    $this->validators = $validators;
  }

  public function uploadFromUrl($url, $path)
  {
    // $uploadPath = public_path($path);
    
    // $_url_arr = explode ('/', $url);
    // $_filename = array_pop($_url_arr);
    // $_filename_arr = explode ('.', $_filename);
    // $extension = $_filename_arr[ count($_filename_arr)-1 ];

    // $_path_to_file = implode("/", $_url_arr);
    
    // $filename = Str::random(20).'.'.$extension;
    
    // $destination = $uploadPath . '/' . $filename;
    // $name = $path . '/' . $filename;

    // file_put_contents($destination, file_get_contents($url));

    $uploadPath = public_path($path);
    
    $_url_arr = explode ('/', $url);
    $_filename = array_pop($_url_arr);
    $_filename_arr = explode ('.', $_filename);
    $extension = array_pop($_filename_arr);
    
    $filename = Str::random(20).'.'.$extension;
    
    $destination = $uploadPath . '/' . $filename;
    $image = Image::make($url)->fit(240)->save($destination, 80);

    // $name = $image->dirname . '/' . $image->basename;
    // not working: dirname returns absolute path (/home/vagrant/...)
    $name = $path . '/' . $image->basename;

    return $name;
  }

  public function upload(array $data, $path)
  {
    foreach($data as $file) {

      if($this->runValidationChecks(array('file'=> $file)))
      {
        $uploadPath = public_path($path);
        $result = array();

        $filename = Str::random(20).'.'.$file->getClientOriginalExtension();
        
        while(File::exists($uploadPath . '/' . $filename)) 
        {
          $filename = Str::random(20).'.'.$file->getClientOriginalExtension();
        }
        
        $file->move($uploadPath, $filename);
        $name = $path . '/' . $filename;
        $result[] = compact('name');

        return $result;
      } else {
        return Response::json(array('error' => 'Something went wrong','success' => false), 500);
      }
      
    }

    // $res = array();
    // $res[] = ["name" => "picture1.jpg",
    // "size" => 902604,
    // "url" => "http:\/\/example.org\/files\/picture1.jpg",
    // "thumbnailUrl" => "http:\/\/example.org\/files\/thumbnail\/picture1.jpg",
    // "deleteUrl" => "http:\/\/example.org\/files\/picture1.jpg",
    // "deleteType" => "DELETE"];
    // $res[] = ["name" => "picture2.jpg",
    // "size" => 424704,
    // "url" => "http:\/\/example.org\/files\/picture2.jpg",
    // "thumbnailUrl" => "http:\/\/example.org\/files\/thumbnail\/picture2.jpg",
    // "deleteUrl" => "http:\/\/example.org\/files\/picture2.jpg",
    // "deleteType" => "DELETE"];
    // return $res;

  }

}