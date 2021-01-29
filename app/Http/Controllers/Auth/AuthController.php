<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        if(!$token = JWTAuth::attempt($request->only(['email', 'password'])))
        {
            return abort(401);
        }
        return (new UserResource($user))
        ->additional([
           'meta' => [
                'token' => $token
            ]
        ]);
    }
    public function login(Request $req)
    {
        $this->validate($req,[
            'email'=>'required',
            'password' => 'required'
        ]);
        if(!$token = JWTAuth::attempt($req->only(['email','password'])))
        {
            return response()->json([
                'error'=>[
                    'email'=>['Kiem tra lai email']
                ]],442);
        }
        return (new UserResource($req->user()))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);
    }
    public function user()
    {
        return[
            'data' => JWTAuth::parseToken()->authenticate()
        ];
    }
}