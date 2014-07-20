<?php namespace Dude\Repositories\Gossip;

use Dude\Validators\Validable;
use Dude\Validators\LaravelValidator;

class GossipCreateValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'url' => 'required'
  ];

}