<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UpdateUserDataPolicy
{
    use HandlesAuthorization;

    protected $team;
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function allows(){

    }
}

