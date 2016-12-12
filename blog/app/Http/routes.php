<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){ return redirect('/home'); });

Route::resource('/image', 'ImageController');

Route::resource('/blogs', 'BlogController');

Route::post('blogs/{blog}/comment', 'CommentsController@store');
Route::get('comment/{comment}/edit', 'CommentsController@edit');
Route::put('comment/{comment}', 'CommentsController@update');
Route::delete('comment/{comment}', 'CommentsController@destroy');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
Route::get('/redirect/google', 'SocialAuthController@redirectGoogle');
Route::get('/callback/google', 'SocialAuthController@callbackGoogle');

Route::get('admin', function () {
    return view('admin.home');
});

Route::get('geolocation','GeoController@index');
Route::get('reverse', function() {
  $geolocation = new Geolocation('40.714224,-73.961452', 'reverse');
  dd($geolocation->getReverseCoordinates());
});

Route::resource('admin/posts', 'Admin\\PostsController');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('/test', function(){ 
    
    return view('client');
    
    });