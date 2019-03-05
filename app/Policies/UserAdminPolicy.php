<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Privilege;

class UserAdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }

    public function index(User $user)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }

    public function create(User $user)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        $privileges = array('create user');
        if($user->match_privileges($privileges))
            return true;
        return false;
    }
}
