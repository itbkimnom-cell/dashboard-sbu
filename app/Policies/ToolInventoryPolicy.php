<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ToolInventory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToolInventoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the toolInventory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list toolinventories');
    }

    /**
     * Determine whether the toolInventory can view the model.
     */
    public function view(User $user, ToolInventory $model): bool
    {
        return $user->hasPermissionTo('view toolinventories');
    }

    /**
     * Determine whether the toolInventory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create toolinventories');
    }

    /**
     * Determine whether the toolInventory can update the model.
     */
    public function update(User $user, ToolInventory $model): bool
    {
        return $user->hasPermissionTo('update toolinventories');
    }

    /**
     * Determine whether the toolInventory can delete the model.
     */
    public function delete(User $user, ToolInventory $model): bool
    {
        return $user->hasPermissionTo('delete toolinventories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete toolinventories');
    }

    /**
     * Determine whether the toolInventory can restore the model.
     */
    public function restore(User $user, ToolInventory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the toolInventory can permanently delete the model.
     */
    public function forceDelete(User $user, ToolInventory $model): bool
    {
        return false;
    }
}
