<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class TmpController extends Controller
{

    public function index(Request $request)
    {
        $test = [];

        $tmp = collect();

        $roles = Role::all();

        foreach ($roles as $role) {
            $role->load('');
        }

        $user = User::find(1);

        $tmp->where('');

        Role::whereName('admin')->get();



        $this->validate($user, [
            '' => '',
        ]);

        return $roles;
    }
}
