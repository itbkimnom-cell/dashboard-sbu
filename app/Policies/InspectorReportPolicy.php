<?php

namespace App\Policies;

use App\Models\User;
use App\Models\InspectorReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class InspectorReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the inspectorReport can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list inspectorreports');
    }

    /**
     * Determine whether the inspectorReport can view the model.
     */
    public function view(User $user, InspectorReport $model): bool
    {
        return $user->hasPermissionTo('view inspectorreports');
    }

    /**
     * Determine whether the inspectorReport can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create inspectorreports');
    }

    /**
     * Determine whether the inspectorReport can update the model.
     */
    public function update(User $user, InspectorReport $model): bool
    {
        return $user->hasPermissionTo('update inspectorreports');
    }

    /**
     * Determine whether the inspectorReport can delete the model.
     */
    public function delete(User $user, InspectorReport $model): bool
    {
        return $user->hasPermissionTo('delete inspectorreports');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete inspectorreports');
    }

    /**
     * Determine whether the inspectorReport can restore the model.
     */
    public function restore(User $user, InspectorReport $model): bool
    {
        return false;
    }

    /**
     * Determine whether the inspectorReport can permanently delete the model.
     */
    public function forceDelete(User $user, InspectorReport $model): bool
    {
        return false;
    }
}
