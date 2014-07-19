<?php namespace Dude\Uploader\Validators;

use Dude\Validators\Validable;
use Dude\Validators\LaravelValidator;

class ImageValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'file' => 'image'
  ];

}