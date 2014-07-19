<?php namespace Dude\Repositories;

use Post;
use Genre;
use Illuminate\Support\ServiceProvider;
use Dude\Repositories\Post\PostCreateValidator;
use Dude\Repositories\Post\EloquentPostRepository;
use Dude\Repositories\Genre\GenreCreateValidator;
use Dude\Repositories\Genre\EloquentGenreRepository;

class RepositoryServiceProvider extends ServiceProvider {

  /**
   * Register
   */
  public function register()
  {
    $this->registerPostRepository();
    $this->registerGenreRepository();
  }


  public function registerGenreRepository()
  {
    $this->app->bind('Dude\Repositories\Genre\GenreRepository', function($app)
    {
      $repository = new EloquentGenreRepository( new Genre );
      $repository->registerValidator('create', new GenreCreateValidator($app['validator']));

      return $repository;
    });
  }

  public function registerPostRepository()
  {
    $this->app->bind('Dude\Repositories\Post\PostRepository', function($app)
    {
      $repository = new EloquentPostRepository( new Post );
      $repository->registerValidator('create', new PostCreateValidator($app['validator']));

      return $repository;
    });
  }



}