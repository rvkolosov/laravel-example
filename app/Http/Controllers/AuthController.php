<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangeAuthRequest;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Models\Role;
use App\User;
use Auth;
use DB;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('auth:api')
            ->only('logout');
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

        return response()->json(['token' => $token], 200);
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

        $role = Role::whereName('user')->get();

        $user->roles()->attach($role->first->id);

        return response()->json(['user' => $user], 201);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function logout()
    {
        $accessToken = Auth::user()->token();

        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();

        return response()->json(null, 204);
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
        }
        else
        {
            abort(401, 'Unauthenticated!');
        }

        return response()->json(['user' => $user], 201);
    }
}
