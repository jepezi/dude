<?php namespace Dude\Repositories;

use Post;
use Genre;
use Gossip;
use Illuminate\Support\ServiceProvider;
use Dude\Repositories\Post\PostCreateValidator;
use Dude\Repositories\Post\PostUpdateValidator;
use Dude\Repositories\Post\EloquentPostRepository;
use Dude\Repositories\Genre\GenreCreateValidator;
use Dude\Repositories\Genre\EloquentGenreRepository;
use Dude\Repositories\Gossip\GossipCreateValidator;
use Dude\Repositories\Gossip\EloquentGossipRepository;

class RepositoryServiceProvider extends ServiceProvider {

  /**
   * Register
   */
  public function register()
  {
    $this->registerPostRepository();
    $this->registerGenreRepository();
    $this->registerGossipRepository();
  }

  public function registerGossipRepository()
  {
    $this->app->bind('Dude\Repositories\Gossip\GossipRepository', function($app)
    {
      $repository = new EloquentGossipRepository( new Gossip );
      $repository->registerValidator('create', new GossipCreateValidator($app['validator']));

      return $repository;
    });
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
      $repository->registerValidator('update', new PostUpdateValidator($app['validator']));

      return $repository;
    });
  }



}