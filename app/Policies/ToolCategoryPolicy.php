<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ToolCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToolCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the toolCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list toolcategories');
    }

    /**
     * Determine whether the toolCategory can view the model.
     */
    public function view(User $user, ToolCategory $model): bool
    {
        return $user->hasPermissionTo('view toolcategories');
    }

    /**
     * Determine whether the toolCategory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create toolcategories');
    }

    /**
     * Determine whether the toolCategory can update the model.
     */
    public function update(User $user, ToolCategory $model): bool
    {
        return $user->hasPermissionTo('update toolcategories');
    }

    /**
     * Determine whether the toolCategory can delete the model.
     */
    public function delete(User $user, ToolCategory $model): bool
    {
        return $user->hasPermissionTo('delete toolcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete toolcategories');
    }

    /**
     * Determine whether the toolCategory can restore the model.
     */
    public function restore(User $user, ToolCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the toolCategory can permanently delete the model.
     */
    public function forceDelete(User $user, ToolCategory $model): bool
    {
        return false;
    }
}
