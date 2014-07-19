<?php namespace Dude\Hasher;

use Config;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class HasherServiceProvider extends ServiceProvider {

  /**
   * Boot the Registrator Events
   *
   * @return void
   */
  public function boot()
  {
    AliasLoader::getInstance()->alias('Hasher', 'Dude\Hasher\Facade'); 
  }

  /**
   * Register the binding
   *
   * @return void
   */
  public function register()
  {
    $this->registerHashids();
  }


  public function registerHashids()
  {
    $this->app->singleton('hasher', function($app)
    {
      return new Hashids(Config::get('hash.salt'), Config::get('hash.length'), Config::get('hash.alphabet'));
    });
  }


}