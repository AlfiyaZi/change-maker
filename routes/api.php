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
      return $request->user()->load('actions','orgFollows');
  })->middleware('auth:api');

# User Routes
  // Route::get('/user/{id}', 'UserController@show')->middleware('auth:api');

  Route::post('/user/{user}','UserController@update')->middleware('auth:api');
  Route::post('/user/{user}/action','UserController@action')->middleware('auth:api');
  Route::delete('/user/{user}/{action_id}')->middleware('auth:api');
  Route::get('/user/{user}/actions',
             'UserController@actions')->middleware('auth:api');


# Organization Routes
  Route::get('/organization','OrganizationController@list');
  Route::get('/organization/{organization}','OrganizationController@show');
  Route::post('/organization','OrganizationController@create')->middleware('auth:api');
  Route::post('/organization/{organization}','OrganizationController@update')
         ->middleware('auth:api');
  Route::delete('/organization/{organization}','OrganizationController@delete')
         ->middleware('auth:api');

  Route::get('/organization/{organization}/follow','OrganizationController@follow')
       ->middleware('auth:api');
  Route::get('/organization/{organization}/unfollow','OrganizationController@unfollow')
       ->middleware('auth:api');

  Route::get('/story/recommend','StoryController@recommended');
  Route::get('/story/featured','StoryController@featured');

# Story Routes
  Route::get('/stories','StoryController@list');
  Route::post('/story','StoryController@create')->middleware('auth:api');
  Route::post('/story/{story}','StoryController@update')->middleware('auth:api');
  Route::delete('/story/{story}','StoryController@delete')->middleware('auth:api');
  Route::get('/story/{story}','StoryController@show');


  Route::get('/story/recommend','StoryController@recommended');
  Route::get('/story/featured','StoryController@featured');
