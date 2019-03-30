<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangeAuthRequest;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param LoginAuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginAuthRequest $request)
    {
        $attempt = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($attempt)
        {
            $user = Auth::user();

            $token = $user->createToken(config('app.name'))->accessToken;
        }
        else
        {
            abort(401, 'Unauthenticated!');
        }

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    /**
     * @param RegisterAuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterAuthRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $token = $user->createToken(config('app.name'))->accessToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }

    /**
     * @param ChangeAuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function change(ChangeAuthRequest $request)
    {
        $attempt = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($attempt)
        {
            $user = Auth::user();

            $user->update(['password' => bcrypt($request->input('new_password'))]);

            $token = $user->createToken(config('app.name'))->accessToken;
        }
        else
        {
            abort(401, 'Unauthenticated!');
        }

        return response()->json(['user' => $user, 'token' => $token], 201);
    }
}
