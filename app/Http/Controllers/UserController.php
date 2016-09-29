<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id, Request $request){
      return User::with('actions')->find($id);
    }
    
    public function update(User $user, Request $request){
      $this->authorize($user);
      $user->update($request->all());
      return $user;
    }
    
    public function action(User $user, Request $request){
      $user->actions()->create($request->all());
      return $user->actions;
    }

    public function actions(User $user){
      return $user->actions;
    }
    public function addHours(){
      $user->hours()->create($request->all());
    }
    public function hours(){
      return $user->hours();
    }

    public function award(){
      return $user->awards();
    }
}
