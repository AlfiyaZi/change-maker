<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user){
      if($user->id == auth()->user()->id){
        return true;
      }
      return false;
    }
}
