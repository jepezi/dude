<?php

/*
Todo

Post
- upload image from kapook, fix 403
- [done] <PostPresenter> decorate simpler preview url (only domain)
- [done] manual post link
- [done] edit post link
- [done] show post link 
- social share
- [done] add open graph and twitter meta in header for post show page
- comments
- post note
    blog-like post, with title, caption, p image or p vdo and body with wsyiwyg, wrap link with hased id for tracking but show page instead of redirecting


Email
- RSS with image
- Design html RSS mail
- Send weekly email, instead of daily



*/

Route::get('auth/{provider}',           ['uses' => 'AuthenticateController@authorise',  'as' => 'authenticate.authorise']);
Route::get('auth/{provider}/callback',  ['uses' => 'AuthenticateController@callback',   'as' => 'authenticate.callback']);

// login
Route::get('comeonin',      ['as' => 'comeonin', 'uses' => 'HomeController@comeonin']);
Route::post('login',        ['as' => 'session.store', 'uses' => 'SessionController@store']);
Route::delete('logout',     ['as' => 'session.destroy', 'uses' => 'SessionController@destroy']);

// gossip
Route::get('tell', array('as' => 'tell', 'uses' => 'ContactController@tell'));
Route::post('tell', array('uses' => 'ContactController@storeTell'));

// rss atom
Route::get('feed', array('as' => 'feed', 'uses' => 'FeedController@index'));

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

// post click (track clicks)
Route::get('link/{hash_id}', ['as' => 'click.to', 'uses' => 'ClickController@to']);

// post show
Route::get('p/{hash_id}', ['as' => 'post.show', 'uses' => 'PostController@show']);
Route::get('post/{id}', ['as' => 'post.showOriginal', 'uses' => 'PostController@showOriginal']);



Route::group(array('prefix' => 'ajax'), function()
{
    Route::post('uploadAndSaveIcon', 'Controllers\Ajax\AjaxUploadController@uploadAndSaveIcon');
    Route::post('uploadAndSaveBookmarkImage', 'Controllers\Ajax\AjaxUploadController@uploadAndSaveBookmarkImage');
    Route::post('uploadAndSaveImagePostLink', 'Controllers\Ajax\AjaxUploadController@uploadAndSaveImagePostLink');
});



Route::group(array('prefix' => 'admin'), function()
{
    Route::get('/', ['as' => 'admin.home', 'uses' => 'Controllers\Admin\HomeController@index']);
    # Post
	Route::group(array('prefix' => 'post'), function()
	{
        Route::get('createLinkFromBookmarklet', ['as' => 'admin.post.createLinkFromBookmarklet', 'uses' => 'Controllers\Admin\PostController@createLinkFromBookmarklet']);
        Route::get('createLink', ['as' => 'admin.post.createLink', 'uses' => 'Controllers\Admin\PostController@createLink']);
        Route::post('storeLink', ['as' => 'admin.post.storeLink', 'uses' => 'Controllers\Admin\PostController@storeLink']);
        Route::get('editLink/{id}', ['as' => 'admin.post.editLink', 'uses' => 'Controllers\Admin\PostController@editLink']);
        Route::post('updateLink/{id}', ['as' => 'admin.post.updateLink', 'uses' => 'Controllers\Admin\PostController@updateLink']);
    });

    # Genre
	Route::group(array('prefix' => 'genre'), function()
	{
        Route::get('create', ['as' => 'admin.genre.create', 'uses' => 'Controllers\Admin\GenreController@create']);
        Route::post('store', ['as' => 'admin.genre.store', 'uses' => 'Controllers\Admin\GenreController@store']);
    });

});