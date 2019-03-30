<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    /**
     * The constructor function
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Permission $permission
     * @param Role $role
     * @return Permission
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Permission $permission, Role $role)
    {
        $this->authorize('create', $permission);
        $this->authorize('create', $role);

        $permission->roles()->attach($role->id);

        return $permission->load('roles');
    }

    /**
     * @param Permission $permission
     * @param Role $role
     * @return Permission
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete(Permission $permission, Role $role)
    {
        $this->authorize('delete', $permission);
        $this->authorize('delete', $role);

        $permission->roles()->detach($role->id);

        return $permission->load('roles');
    }
}
