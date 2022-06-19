<?php

namespace App\ModuleAs;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Users\User;

class ModuleAPolicy
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
     * @param  \{{ namespacedModel }}  $modulea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ModuleA $modulea)
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
     * @param  \{{ namespacedModel }}  $modulea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ModuleA $modulea)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $modulea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ModuleA $modulea)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $modulea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ModuleA $modulea)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Users\User  $user
     * @param  \{{ namespacedModel }}  $modulea
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ModuleA $modulea)
    {
        //
    }
}
