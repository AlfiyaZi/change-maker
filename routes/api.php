<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
  Route::get('/user', function (Request $request) {
      return $request->user()->load('actions');
  })->middleware('auth:api');

# User Routes
  //Route::get('/user/{id}', 'UserController@show')->middleware('auth:api');
  Route::post('/user/{user}','UserController@update')->middleware('auth:api');
  Route::post('/user/{user}/action','UserController@action')->middleware('auth:api');
  Route::delete('/user/{user}/{action_id}')->middleware('auth:api');
  Route::get('/user/{user}/actions',
             'UserController@actions')->middleware('auth:api');


# Organization Routes
  Route::get('/organization','OrganizationController@list');
  Route::get('/organization/{id}','OrganizationController@show');
  Route::post('/organization','OrganizationController@create');
  Route::put('/organization/{id}','OrganizationController@update');
  Route::delete('/organization/{id}','OrganizationController@delete');
  Route::get('/story/recommend','StoryController@recommended');
  Route::get('/story/featured','StoryController@featured');

# Story Routes
  Route::get('/stories','StoryController@list');
  Route::post('/story','StoryController@create');
  Route::put('/story/{id}','StoryController@update');
  Route::delete('/story/{id}','StoryController@delete');
  Route::get('/story/{id}','StoryController@show');
  Route::get('/story/recommend','StoryController@recommended');
  Route::get('/story/featured','StoryController@featured');

