<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MarketingActivity;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarketingActivityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the marketingActivity can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list marketingactivities');
    }

    /**
     * Determine whether the marketingActivity can view the model.
     */
    public function view(User $user, MarketingActivity $model): bool
    {
        return $user->hasPermissionTo('view marketingactivities');
    }

    /**
     * Determine whether the marketingActivity can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create marketingactivities');
    }

    /**
     * Determine whether the marketingActivity can update the model.
     */
    public function update(User $user, MarketingActivity $model): bool
    {
        return $user->hasPermissionTo('update marketingactivities');
    }

    /**
     * Determine whether the marketingActivity can delete the model.
     */
    public function delete(User $user, MarketingActivity $model): bool
    {
        return $user->hasPermissionTo('delete marketingactivities');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete marketingactivities');
    }

    /**
     * Determine whether the marketingActivity can restore the model.
     */
    public function restore(User $user, MarketingActivity $model): bool
    {
        return false;
    }

    /**
     * Determine whether the marketingActivity can permanently delete the model.
     */
    public function forceDelete(User $user, MarketingActivity $model): bool
    {
        return false;
    }
}
