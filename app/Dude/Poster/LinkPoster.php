<?php namespace Dude\Poster;

use Illuminate\Support\Str;
use Dude\Repositories\Post\PostRepository;

class LinkPoster extends AbstractPoster implements Poster {

  protected $postRepository;

  /**
   * An array of Validable classes
   *
   * @param array
   */
  protected $validators;


  public function __construct(PostRepository $postRepository, array $validators)
  {
    parent::__construct();

    $this->postRepository = $postRepository;
    $this->validators = $validators;
  }

  /**
   * Create a new user entity
   *
   * @param array $data
   * @return Illuminate\Database\Eloquent\Model
   */
  public function create(array $data)
  {
    $data['status'] = 1;
    $data['is_link'] = true;

    if($this->runValidationChecks($data))
    {
      $post = $this->postRepository->create($data);

      if($post)
      {
        $genres = isset($data['genres'])?$data['genres']:false;
        if($genres) $post->genres()->sync($genres);
        return $post;
      }

      $this->errors->merge($this->postRepository->errors());
    }
  }

}