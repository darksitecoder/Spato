<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class apiAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('YourTokenName')->accessToken;

            return response()->json(['token' => $token, 'user' => $user]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
