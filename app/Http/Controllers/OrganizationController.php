<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrganizationController extends Controller
{
    //
  /*
  *
  * Route::get('/organization','OrganizationController@list');
  * Route::get('/organization/{id}','OrganizationController@show');
  * Route::post('/organization','OrganizationController@create');
  * Route::put('/organization/{id}','OrganizationController@update');
  * Route::delete('/organization/{id}','OrganizationController@delete');
  * Route::get('/story/recommend','StoryController@recommended');
  * Route::get('/story/featured','StoryController@featured');
  *
  */
  public function list(Request $request){
    
  }

  public function show(Organization $organization){
    return $organization;
  }
  public function create(Request $request){
    
  }
  public function update(Request $request){
    
  }

  public function delete(Request $request){
    
  }

  public function recommend(Request $request){
    
  }

  public function featured(Request $request){
    
  }

}
