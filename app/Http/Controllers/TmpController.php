<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class TmpController extends Controller
{
    public function index()
    {
        return Role::whereName('user')->first();
    }
}
