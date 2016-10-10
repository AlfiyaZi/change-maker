<?php

namespace App\Http\Controllers;

use App\Duration;
use App\Location;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
  private $request;
  public function __construct(Request $request){
    $this->request = $request;
    
  }
  public function list(Request $request){
    return Project::all();
  }

  public function create(Request $request){
    $this->authorize('create', Project::class);
    $data = array_map('trim',$request->all());
    $project = new Project($data);
    if($project->validate($data)){
      return auth()->user()->projects()->save($project);
    } else {
      return $project->errors();
    }
    return false;
  }

  public function update(Project $project){
    $this->authorize('update',$project);
    if(!$project->validate($this->request->all())){
      return $project->errors();
    }
    $project->update($this->request->all());
    return $project;
  } 

  public function delete(Project $project){
    $this->authorize('delete', $project);
    $project->delete();
    return 'success';
  }

  public function rsvp(Project $project){
    if(auth()->user()->is_attending($project)){
      $project->rsvps()->detach(auth()->user()->id);
    }
    $project->rsvps()->attach(auth()->user()->id);
    $project->rsvpCount = $project->rsvps->count();
    $project->save();
    return 'success';
    
  }
  public function unrsvp(Project $project){
    if(auth()->user()->is_attending($project)){
      $project->rsvps()->detach(auth()->user()->id);
    }
    $project->rsvpCount = $project->rsvps->count();
    $project->save();
    return success;
  }

  public function emote(Project $project){
    auth()->user()->emote($project, $this->request->input('emotion'));
    return 'success';
  }


  public function unemote(Project $project){
    $project->emotions()->detach(auth()->user());
    return 'success';
  }
  public function show(Project $project){
    $project->load('durations','locations');
    return $project;
  }

  public function addDuration(Project $project, Request $request)
  {
    $this->authorize('update',$project);
    $duration = new Duration($this->request->all());
    if(!$duration->validate($this->request->all())){
      return $duration->errors();
    }
    $project->durations()->firstOrCreate($this->request->all());
    return $project->load('durations');
  }
  public function addLocation(Project $project){
    $this->authorize('update',$project);
    $location = new Location($this->request->all());
    if(!$location->validate($this->request->all())){
      return $location->errors();
    }
    $project->locations()->firstOrCreate($this->request->all());
    return $project->load('locations','durations');
  }
}
