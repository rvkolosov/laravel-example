<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
