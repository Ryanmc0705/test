<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = User::create([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return response([
            "user" => $user,
            "message" => "success"
        ],200);
    }

    public function login(Request $request)
    {
        $user = User::where("email",$request->email)->first();
        if($user && Hash::check($request->password,$user->password)){
            $jwt = $user->createToken($request->email)->plainTextToken;
            $cookie = cookie("jwt",$jwt,60*24);
            return response([
               "message" => "success" ,
               "jwt" => $jwt
            ],200)->withCookie($cookie);
        }else{
            return response([
                "message" => "Bad Login"
            ],401);
        }
    }
    public function logout(){
        $cookie = \Cookie::forget("jwt");
        
        return \response([
            'message' => 'success'
        ])->withCookie($cookie);
    }
}
