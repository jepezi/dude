<?php namespace Dude\Repositories\Gossip;

use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;

use Dude\Repositories\Repository;
use Dude\Repositories\AbstractRepository;
use Dude\Repositories\Gossip\GossipRepository;

class EloquentGossipRepository extends AbstractRepository implements Repository, GossipRepository {

  /**
   * @var Model
   */
  protected $model;

  /**
   * Construct
   *
   * @param Illuminate\Database\Eloquent\Model $model
   */
  public function __construct(Model $model)
  {
    parent::__construct(new MessageBag);

    $this->model = $model;
  }

  /**
   * Create
   *
   * @param array $data
   * @return Illuminate\Database\Eloquent\Model
   */
  public function create(array $data)
  {
    if($this->isValid('create', $data))
    {
      return $this->model->create($data);
    }
  }


}