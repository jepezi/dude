<?php namespace Dude\Uploader;

use Illuminate\Support\ServiceProvider;
use Dude\Uploader\Validators\ImageValidator;

class UploaderServiceProvider extends ServiceProvider {

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
    $this->registerImageUploader();
  }


  public function registerImageUploader()
  {
    $this->app->bind('Dude\Uploader\ImageUploader', function($app)
    {
      return new ImageUploader(
        [ new ImageValidator($app['validator']) ]
      );
    });
  }


}