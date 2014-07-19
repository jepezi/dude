<?php namespace Dude\Repositories\Post;

use Dude\Validators\Validable;
use Dude\Validators\LaravelValidator;

class PostCreateValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'title' => 'required',
    'slug' => 'required',
    'caption'  => 'required'
  ];

}