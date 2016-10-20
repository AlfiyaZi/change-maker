<?php

namespace App\Policies;

use App\User;
use App\Story;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the story.
     *
     * @param  App\User  $user
     * @param  App\Story  $story
     * @return mixed
     */
    public function view(User $user, Story $story)
    {
        //
    }

    /**
     * Determine whether the user can create stories.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_authorized;
    }

    /**
     * Determine whether the user can update the story.
     *
     * @param  App\User  $user
     * @param  App\Story  $story
     * @return mixed
     */
    public function update(User $user, Story $story)
    {
        return $user->owns($story);
    }

    /**
     * Determine whether the user can delete the story.
     *
     * @param  App\User  $user
     * @param  App\Story  $story
     * @return mixed
     */
    public function delete(User $user, Story $story)
    {
        return $user->owns($story);
    }
    public function approve(User $user, Story $story)
    {
        return in_array($user->role,['admin','leader','content']);
    }
}
