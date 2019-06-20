<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class TmpController extends Controller
{
    public function index()
    {
        $user = User::find(10);

        $role = Role::whereName('user')->first();

        $user->roles()->attach($role->id);

        return $user->roles;
    }
}
