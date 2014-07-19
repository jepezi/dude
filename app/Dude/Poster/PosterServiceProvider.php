<?php namespace Dude\Poster;

use Illuminate\Support\ServiceProvider;
use Dude\Poster\Validators\UrlValidator;
use Dude\Poster\Validators\PreviewImageValidator;

class PosterServiceProvider extends ServiceProvider {

  /**
   * Boot the Registrator Events
   *
   * @return void
   */
  public function boot()
  {
    
  }

  /**
   * Register the binding
   *
   * @return void
   */
  public function register()
  {
    $this->registerLinkPoster();
    // $this->registerNotePoster();
  }


  public function registerLinkPoster()
  {
    $this->app->bind('Dude\Poster\LinkPoster', function($app)
    {
      return new LinkPoster(
        $app->make('Dude\Repositories\Post\PostRepository'),
        [ new UrlValidator($app['validator']), new PreviewImageValidator($app['validator']) ]
      );
    });
  }


}