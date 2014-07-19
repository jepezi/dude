<?php namespace Dude\Poster\Validators;

use Dude\Validators\Validable;
use Dude\Validators\LaravelValidator;

class PreviewImageValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'p_images' => 'required'
  ];

}