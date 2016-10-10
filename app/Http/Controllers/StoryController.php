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
  public function update(Story $story, Request $request){
    $this->authorize('update',$story);
    if($story->validate($request->all())){
      $story->update($request->all());
      return $story;
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

  public function emote(Story $story, Request $request){
    auth()->user()->emote($story, 
      ['emotion' => $this->request->input('emotion')]);
      
    
    return 'success';
  }

  public function unemote(Story $story){
    $story->emotes()->detach(auth()->user()->id);
    return 'success';
  }
}
