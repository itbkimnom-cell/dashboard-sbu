<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ToolLoan;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToolLoanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the toolLoan can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list toolloans');
    }

    /**
     * Determine whether the toolLoan can view the model.
     */
    public function view(User $user, ToolLoan $model): bool
    {
        return $user->hasPermissionTo('view toolloans');
    }

    /**
     * Determine whether the toolLoan can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create toolloans');
    }

    /**
     * Determine whether the toolLoan can update the model.
     */
    public function update(User $user, ToolLoan $model): bool
    {
        return $user->hasPermissionTo('update toolloans');
    }

    /**
     * Determine whether the toolLoan can delete the model.
     */
    public function delete(User $user, ToolLoan $model): bool
    {
        return $user->hasPermissionTo('delete toolloans');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete toolloans');
    }

    /**
     * Determine whether the toolLoan can restore the model.
     */
    public function restore(User $user, ToolLoan $model): bool
    {
        return false;
    }

    /**
     * Determine whether the toolLoan can permanently delete the model.
     */
    public function forceDelete(User $user, ToolLoan $model): bool
    {
        return false;
    }
}
