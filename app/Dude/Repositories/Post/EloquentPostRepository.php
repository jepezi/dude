<?php namespace Dude\Repositories\Post;

use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;

use Dude\Repositories\Repository;
use Dude\Repositories\AbstractRepository;
use Dude\Repositories\Post\PostRepository;

class EloquentPostRepository extends AbstractRepository implements Repository, PostRepository {

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
      // return $this->model->create($data);
      $newpost = $this->model->create($data);
      return $newpost;
    }
  }

  public function incrementAndReturnUrl($id, $column)
  {
    $model = $this->find($id);
    $model->increment($column);

    return $model->url;
  }



}