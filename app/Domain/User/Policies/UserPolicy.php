<?php

namespace App\Domain\User\Policies;

use App\Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Domain\User\Models\User  $user
     * @param  \App\Domain\User\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Domain\User\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Domain\User\Models\User  $user
     * @param  \App\Domain\User\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Domain\User\Models\User  $user
     * @param  \App\Domain\User\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Domain\User\Models\User  $user
     * @param  \App\Domain\User\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Domain\User\Models\User  $user
     * @param  \App\Domain\User\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return false;
    }
}
