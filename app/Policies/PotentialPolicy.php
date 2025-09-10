<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Potential;
use Illuminate\Auth\Access\HandlesAuthorization;

class PotentialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the potential can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list potentials');
    }

    /**
     * Determine whether the potential can view the model.
     */
    public function view(User $user, Potential $model): bool
    {
        return $user->hasPermissionTo('view potentials');
    }

    /**
     * Determine whether the potential can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create potentials');
    }

    /**
     * Determine whether the potential can update the model.
     */
    public function update(User $user, Potential $model): bool
    {
        return $user->hasPermissionTo('update potentials');
    }

    /**
     * Determine whether the potential can delete the model.
     */
    public function delete(User $user, Potential $model): bool
    {
        return $user->hasPermissionTo('delete potentials');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete potentials');
    }

    /**
     * Determine whether the potential can restore the model.
     */
    public function restore(User $user, Potential $model): bool
    {
        return false;
    }

    /**
     * Determine whether the potential can permanently delete the model.
     */
    public function forceDelete(User $user, Potential $model): bool
    {
        return false;
    }
}
