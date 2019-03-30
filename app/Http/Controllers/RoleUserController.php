<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * The constructor function
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Role $role
     * @param User $user
     * @return Role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Role $role, User $user)
    {
        $this->authorize('create', $role);
        $this->authorize('create', $user);

        $role->users()->attach($user->id);

        return $role->load('users');
    }

    /**
     * @param Role $role
     * @param User $user
     * @return Role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete(Role $role, User $user)
    {
        $this->authorize('delete', $role);
        $this->authorize('delete', $user);

        $role->users()->detach($user->id);

        return $role->load('users');
    }
}
