<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::get('link/{hash_id}', array('as' => 'click.to', 'uses' => 'ClickController@to'));



Route::group(array('prefix' => 'ajax'), function()
{
    Route::post('uploadAndSaveIcon', 'Controllers\Ajax\AjaxUploadController@uploadAndSaveIcon');
    Route::post('uploadAndSaveBookmarkImage', 'Controllers\Ajax\AjaxUploadController@uploadAndSaveBookmarkImage');
});



Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/', ['as' => 'admin.home', 'uses' => 'Controllers\Admin\HomeController@index']);
    # Post
	Route::group(array('prefix' => 'post'), function()
	{
        Route::get('createLinkFromBookmarklet', ['as' => 'admin.post.createLinkFromBookmarklet', 'uses' => 'Controllers\Admin\PostController@createLinkFromBookmarklet']);
        Route::post('storeLink', ['as' => 'admin.post.storeLink', 'uses' => 'Controllers\Admin\PostController@storeLink']);
    });

    # Genre
	Route::group(array('prefix' => 'genre'), function()
	{
        Route::get('create', ['as' => 'admin.genre.create', 'uses' => 'Controllers\Admin\GenreController@create']);
        Route::post('store', ['as' => 'admin.genre.store', 'uses' => 'Controllers\Admin\GenreController@store']);
    });

});