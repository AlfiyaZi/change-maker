<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
  public function list(){
    return Story::all();
  }
  public function create(Request $request){
    $this->authorize('create',Story::class);
    $story = new Story();
    if($story->validate($request->all())){
      return auth()->user()->stories()->firstOrCreate($request->all());
    } else {
      return $story->errors();
    }
  }
  public function update(Story $story){
    $this->authorize('update',$story);
    if($story->validate($request->all())){
      return auth()->user()->stories()->create($request->all());
    } else {
      return $story->errors();
    }
  }
  public function delete(Story $story)
  {
    $this->authorize('delete',$story);
    return 'success';
  }
  public function show(Story $story){
    return $story;
  }
  public function recommend(){
    
  }
  public function featured(){
    
  }

  public function like(){
    
  }
  public function unlike(){
    
  }
}
