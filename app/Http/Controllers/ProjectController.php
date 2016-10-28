<?php

namespace App\Http\Controllers;

use App\Duration;
use App\Location;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function list(Request $request){
      return Project::with('durations', 'locations')->where('user_id', auth()->user()->id)->get();; //only showing admin's events for now
      // return auth()->user()->projects //returning only projects that user created for now, need to have user's future events return
      //eventually want all projects a user is rsvped for
    }

    public function create(Request $request){
        $this->authorize('create', Project::class);
        $data = $request->input('project');
        $project = new Project($data);
        if ($project->validate($data)){
          auth()->user()->projects()->save($project);
          //need to add admin and validate duration and locations
          $project->durations()->create($request->input('durations'));
          $project->locations()->create($request->input('location'));
          return $project;
        } else {
          return $project->errors();
        }
        return false;
    }

    public function update(Project $project, Request $request){
        $this->authorize('update', $project);
        // if (!$project->validate($this->request->all())){
          // return $project->errors();
        // }
        if ($request->input('project')){
          $project->update($request->input('project'));
        }
        if ($request->input('durations')){
          $project->durations[0]->update($request->input('durations'));
        }
        if ($request->input('location')){
          $project->locations[0]->update($request->input('location'));
        }
        return $project;
    }

    public function destroy(Project $project){
        $this->authorize('delete', $project);
        $project->delete();
        return $project;
    }

    public function rsvp(Project $project){
        if (auth()->user()->is_attending($project)){
            $project->rsvps()->detach(auth()->user()->id);
        }
        $project->rsvps()->attach(auth()->user()->id);
        $project->rsvpCount = $project->rsvps->count();
        $project->save();
        return $project;

    }

    public function unrsvp(Project $project){
        if (auth()->user()->is_attending($project)){
          $project->rsvps()->detach(auth()->user()->id);
        }
        $project->rsvpCount = $project->rsvps->count();
        $project->save();
        return $project;
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

    public function addDuration(Project $project, Request $request){
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
