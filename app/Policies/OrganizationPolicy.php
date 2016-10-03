<?php

namespace App\Policies;

use App\User;
use App\Organization;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the organization.
     *
     * @param  App\User  $user
     * @param  App\Organization  $organization
     * @return mixed
     */
    public function view(User $user, Organization $organization)
    {
        return true;
    }

    /**
     * Determine whether the user can create organizations.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      if(auth()->user()->is_authorized){
        return true;
      }
      return false;
    }

    /**
     * Determine whether the user can update the organization.
     *
     * @param  App\User  $user
     * @param  App\Organization  $organization
     * @return mixed
     */
    public function update(User $user, Organization $organization)
    {
        return $user->owns($organization);
    }

    /**
     * Determine whether the user can delete the organization.
     *
     * @param  App\User  $user
     * @param  App\Organization  $organization
     * @return mixed
     */
    public function delete(User $user, Organization $organization)
    {
        return $user->owns($organization);
    }
}
