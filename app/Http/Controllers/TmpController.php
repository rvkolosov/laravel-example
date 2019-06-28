<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Todo;

class TmpController extends Controller
{

    public function index(Request $request)
    {
        dump($request->input('test'));

        $tmp = collect($request->input('test'))->forget('lang');

        dump($tmp);
    }
}
