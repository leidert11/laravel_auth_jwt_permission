<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials= $request->only(['email','password']);

        if (!$token=auth()->attempt($credentials)) {
            return response()->json(['error'=>'Unauthorized'],401);
        }
        return response()->json(['access_token'=> $token]);
    }
    public function me()
    {
        return response()->json(auth()->user());
    }
}
