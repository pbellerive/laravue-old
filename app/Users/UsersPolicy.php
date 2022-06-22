<?php

namespace App\Users;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Users\User;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Users\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Users $users)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Users\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Users $users)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Users $users)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Users $users)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Users $users)
    {
        //
    }
}
