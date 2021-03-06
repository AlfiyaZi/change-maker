<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
  public function list(Request $request)
  {
    return Organization::all();
  }

  public function show(Organization $organization){
    return $organization->load('projects','followers');
  }
  public function create(Request $request){
    $this->authorize('create',Organization::class);
    
    $data = array_map('trim',$request->all());
    $organization = new Organization($data);
    $organization->sanitize();
    if($organization->validate($organization->toArray())){
      return auth()->user()->organizations()->save($organization);
    } else {
      return $organization->errors();
    }
    return false;
  }
  public function update(Organization $organization, Request $request){
      $this->authorize('update',$organization);
      if($organization->validate($request->all(), $organization->updateRules())){
        $organization->update($request->all());
        return $organization;
      } else {
        return $organization->errors();
      }
  }

  public function delete(Organization $organization, Request $request){
    $this->authorize('delete',$organization);
    $organization->delete();
    return 'success';
  }

  public function follow(Organization $organization){
    if(auth()->user()->follows($organization)){
      return $organization->load('followers');
    }

    $organization->followers()->attach(auth()->user()->id);

    return $organization->load('followers');
  }
  public function unfollow(Organization $organization){
    $organization->followers()->detach(auth()->user()->id);
    return $organization->load('followers');
  }
  public function recommend(Request $request){
    
  }

  public function featured(Request $request){
    
  }

}
