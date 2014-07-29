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

  public function update(array $data)
  {
    if($this->isValid('update', $data))
    {
      $post = $this->find($data['id']);
      $post->title = $data['title'];
      $post->slug = $data['slug'];
      $post->caption = $data['caption'];
      $post->type = $data['type'];
      $post->url = $data['url'];
      $post->p_title = $data['p_title'];
      $post->p_description = $data['p_description'];
      $post->p_images = $data['p_images'];

      if(count($post->getDirty()) > 0)
      {
        $post->save();
      }
      
      $genres = isset($data['genres'])?$data['genres']:false;
      if($genres) $post->genres()->sync($genres);
      
      return $post;
    }
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

  public function getFeed()
  {
    $posts = $this->model->orderBy('created_at', 'desc')->take(10)->get();
    return $posts;
  }


}