<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
     * Determine whether the user can view list of roles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return false;
    }
}
