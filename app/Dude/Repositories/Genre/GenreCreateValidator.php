<?php namespace Dude\Repositories\Genre;

use Dude\Validators\Validable;
use Dude\Validators\LaravelValidator;

class GenreCreateValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'name' => 'required',
    'status' => 'integer'
  ];

}