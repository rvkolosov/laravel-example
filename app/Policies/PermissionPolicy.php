<?php

namespace App\Policies;

use App\User;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * @param $user
     * @param $ability
     * @return bool|null
     */
    public function before($user, $ability)
    {
        if ($user->isRole('admin')) return true;
    }

    /**
     * Determine whether the user can view list of permissions.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Permission  $permission
     * @return mixed
     */
    public function view(User $user, Permission $permission)
    {
        return false;
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Permission  $permission
     * @return mixed
     */
    public function update(User $user, Permission $permission)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Permission  $permission
     * @return mixed
     */
    public function delete(User $user, Permission $permission)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Permission  $permission
     * @return mixed
     */
    public function restore(User $user, Permission $permission)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Permission  $permission
     * @return mixed
     */
    public function forceDelete(User $user, Permission $permission)
    {
        return false;
    }
}
