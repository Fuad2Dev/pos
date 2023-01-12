<?php

namespace App\Policies;

use App\Models\User;
use App\Models\attribute;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributePolicy
{
    use HandlesAuthorization;

    public function method(User $user)
    {
        return $user->isAdmin ? true : null;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, attribute $attribute)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, attribute $attribute)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, attribute $attribute)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, attribute $attribute)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\attribute  $attribute
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, attribute $attribute)
    {
        return false;
    }
}
